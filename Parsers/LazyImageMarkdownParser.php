<?php

namespace App\Parsers;

use TightenCo\Jigsaw\Parsers\JigsawMarkdownParser;

class LazyImageMarkdownParser extends JigsawMarkdownParser
{
    public function __construct(private string $sourcePath)
    {
        parent::__construct();
    }

    public function parse($text)
    {
        return $this->decorateImages(parent::parse($text));
    }

    private function decorateImages(string $html): string
    {
        $decorated = preg_replace_callback(
            '/<img\s([^>]*?)(\s*\/?)>/i',
            function (array $match): string {
                $attrs = $match[1];

                if (preg_match('/\b(?:loading|decoding)\s*=/i', $attrs)) {
                    return $match[0];
                }

                if (! preg_match('/\bsrc\s*=\s*(["\'])([^"\']*)\1/i', $attrs, $src)) {
                    return $match[0];
                }

                $url = html_entity_decode($src[2], ENT_QUOTES | ENT_HTML5, 'UTF-8');

                if ($url === '') {
                    return $match[0];
                }

                $extra = ' loading="lazy" decoding="async"';

                if (! preg_match('/\b(?:width|height)\s*=/i', $attrs)) {
                    $size = $this->dimensions($url);

                    if ($size !== null) {
                        $extra .= ' width="'.$size[0].'" height="'.$size[1].'"';
                    }
                }

                return '<img '.trim($attrs).$extra.$match[2].'>';
            },
            $html,
        );

        return $decorated ?? $html;
    }

    /**
     * @return array{0: int, 1: int}|null
     */
    private function dimensions(string $url): ?array
    {
        if (preg_match('#^(https?:)?//#i', $url) || str_starts_with($url, 'data:')) {
            return null;
        }

        $path = parse_url($url, PHP_URL_PATH);

        if (! is_string($path) || $path === '') {
            return null;
        }

        $file = $this->sourcePath.'/'.ltrim(rawurldecode($path), '/');

        if (! is_file($file)) {
            return null;
        }

        $info = @getimagesize($file);

        if ($info === false || ($info[0] ?? 0) < 1 || ($info[1] ?? 0) < 1) {
            return null;
        }

        return [(int) $info[0], (int) $info[1]];
    }
}

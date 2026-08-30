<?php

namespace App\Parsers;

use DomainException;
use Highlight\Highlighter;
use TightenCo\Jigsaw\Parsers\JigsawMarkdownParser;

class LazyImageMarkdownParser extends JigsawMarkdownParser
{
    /** @var array<string, string> */
    private const LANGUAGE_ALIASES = [
        'blade' => 'php',
    ];

    public function __construct(
        private string $sourcePath,
        private Highlighter $highlighter = new Highlighter(),
    ) {
        parent::__construct();
    }

    public function parse($text)
    {
        return $this->decorateImages($this->highlightCode(parent::parse($text)));
    }

    private function highlightCode(string $html): string
    {
        $highlighted = preg_replace_callback(
            '/<pre><code class="([^"]*)">(.*?)<\/code><\/pre>/s',
            function (array $match): string {
                $classes = preg_split('/\s+/', trim($match[1])) ?: [];

                if (in_array('hljs', $classes, true)) {
                    return $match[0];
                }

                $language = null;

                foreach ($classes as $class) {
                    if (str_starts_with($class, 'language-')) {
                        $language = substr($class, 9);
                        break;
                    }
                }

                if ($language === null || $language === '' || $language === 'mermaid') {
                    return $match[0];
                }

                $language = self::LANGUAGE_ALIASES[$language] ?? $language;
                $code = $this->unescapeForHighlight(html_entity_decode($match[2], ENT_QUOTES | ENT_HTML5, 'UTF-8'));

                try {
                    $result = $this->highlighter->highlight($language, $code);
                } catch (DomainException) {
                    return $match[0];
                }

                $classList = htmlspecialchars(
                    implode(' ', array_unique([...$classes, 'hljs', $result->language])),
                    ENT_QUOTES,
                    'UTF-8',
                );

                return $this->escapeForBlade(
                    '<pre><code class="'.$classList.'">'.$result->value.'</code></pre>',
                );
            },
            $html,
        );

        return $highlighted ?? $html;
    }

    /**
     * Jigsaw Blade-escapes markdown before it reaches this parser. Undo that
     * so highlight.php sees the original source, then re-apply the same
     * escapes to the highlighted HTML so Blade can compile the page.
     */
    private function unescapeForHighlight(string $code): string
    {
        return strtr($code, [
            "<{{'?php'}}" => '<?php',
            "{{'@'}}" => '@',
            '@{{' => '{{',
            '@{!!' => '{!!',
        ]);
    }

    private function escapeForBlade(string $html): string
    {
        return strtr($html, [
            '<?php' => "<{{'?php'}}",
            '{@' => '{@',
            '{{' => '@{{',
            '{!!' => '@{!!',
            '@' => "{{'@'}}",
        ]);
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

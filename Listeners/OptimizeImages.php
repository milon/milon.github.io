<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class OptimizeImages
{
    public function handle(Jigsaw $jigsaw): void
    {
        $script = dirname(__DIR__).'/scripts/optimize-images.js';
        $destination = $jigsaw->getDestinationPath();
        $command = 'bun '.escapeshellarg($script).' '.escapeshellarg($destination);

        passthru($command, $status);

        if ($status !== 0) {
            throw new \RuntimeException('Image optimization failed.');
        }
    }
}

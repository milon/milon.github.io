<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateUrlRedirect 
{
    public function handle(Jigsaw $jigsaw)
    {
        $redirects = $jigsaw->getConfig()->urlRedirects;

        foreach($redirects as $redirect) {            
            $stub = $jigsaw->getSourcePath() . '/' . '_layouts/redirect_stub.blade.php';
            $renderedTemplate = app('view')->file($stub, ['url' => $redirect->url])->render();

            $jigsaw->writeOutputFile($redirect->filename. '/index.html', $renderedTemplate);
        }
    }
}
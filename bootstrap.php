<?php

/** @var $container \Illuminate\Container\Container */
/** @var $jigsaw \TightenCo\Jigsaw\Jigsaw */

$events->afterBuild(App\Listeners\GenerateSitemap::class);
$events->afterBuild(App\Listeners\GenerateIndex::class);
$events->afterBuild(Milon\JigsawUrlShortener\GenerateUrlRedirect::class);

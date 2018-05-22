<?php

/** @var $container \Illuminate\Container\Container */
/** @var $jigsaw \TightenCo\Jigsaw\Jigsaw */

$events->afterBuild(App\Listeners\GenerateSitemap::class);

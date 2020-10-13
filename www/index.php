<?php

declare(strict_types=1);


use Contributte\Middlewares\Application\IApplication as ApiApplication;


require __DIR__ . '/../vendor/autoload.php';

$configurator = App\Bootstrap::boot();
$container = $configurator->createContainer();
$application = $container->getByType(ApiApplication::class);
$application->run();



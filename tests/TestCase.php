<?php

declare(strict_types=1);

namespace LaravelFlexSettings\LaravelFlexSettings\Tests;

use LaravelFlexSettings\LaravelFlexSettings\LaravelFlexSettingsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelFlexSettingsServiceProvider::class,
        ];
    }
}

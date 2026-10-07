<?php

declare(strict_types=1);

namespace LaravelFlexSettings\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LaravelFlexSettings\LaravelFlexSettings\LaravelFlexSettings
 */
class LaravelFlexSettings extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \LaravelFlexSettings\LaravelFlexSettings::class;
    }
}

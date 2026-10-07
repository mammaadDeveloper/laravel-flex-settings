<?php

declare(strict_types=1);

namespace LaravelFlexSettings\Facades;

use Illuminate\Support\Facades\Facade;
use LaravelFlexSettings\LaravelFlexSettings;

/**
 * @see LaravelFlexSettings
 */
class Setting extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return LaravelFlexSettings::class;
    }
}

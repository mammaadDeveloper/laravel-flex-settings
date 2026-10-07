<?php

declare(strict_types=1);

use LaravelFlexSettings\LaravelFlexSettings;

it('resolves the singleton', function () {
    expect(app(LaravelFlexSettings::class))->toBeInstanceOf(LaravelFlexSettings::class);
});

it('returns the same instance from the container', function () {
    expect(app(LaravelFlexSettings::class))->toBe(app(LaravelFlexSettings::class));
});

it('merges the package config', function () {
    expect(config('laravel-flex-settings.placeholder'))->toBe('default');
});

it('loads the package translations', function () {
    expect(trans('laravel-flex-settings::messages.placeholder'))->toBe('LaravelFlexSettings placeholder translation.');
});

it('loads the package views', function () {
    expect(view()->exists('laravel-flex-settings::placeholder'))->toBeTrue();
});

it('registers the artisan command', function () {
    $this->artisan('laravel-flex-settings:placeholder')
        ->expectsOutputToContain('LaravelFlexSettings placeholder command executed.')
        ->assertSuccessful();
});

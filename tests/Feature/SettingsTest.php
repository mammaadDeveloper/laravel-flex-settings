<?php

declare(strict_types=1);

use LaravelFlexSettings\LaravelFlexSettings;

it('stores settings in the default group and retrieves them', function () {
    $settings = app(LaravelFlexSettings::class);

    $settings->set('site_name', 'Laravel Flex Settings');

    expect($settings->get('site_name'))->toBe('Laravel Flex Settings')
        ->and($settings->all()->all())->toMatchArray([
            'site_name' => 'Laravel Flex Settings',
        ]);
});

it('supports scoped groups and array values', function () {
    $settings = app(LaravelFlexSettings::class);

    $settings->group('admin')->set('theme', ['primary' => 'blue']);

    expect($settings->group('admin')->get('theme'))->toBe(['primary' => 'blue'])
        ->and($settings->group('admin')->has('theme'))->toBeTrue();
});

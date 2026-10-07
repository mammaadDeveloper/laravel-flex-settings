<?php

declare(strict_types=1);

namespace LaravelFlexSettings\LaravelFlexSettings\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LaravelFlexSettings\LaravelFlexSettingsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $table = config('laravel-flex-settings.database.table', 'settings');

        if (Schema::hasTable($table)) {
            Schema::drop($table);
        }

        Schema::create($table, function (Blueprint $table) {
            $table->id();
            $table->string('group')->default('default');
            $table->string('key');
            $table->string('type')->default('string');
            $table->text('value')->nullable();
            $table->timestamps();
            $table->unique(['group', 'key']);
        });
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelFlexSettingsServiceProvider::class,
        ];
    }
}

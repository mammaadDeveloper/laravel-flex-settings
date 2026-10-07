<?php

declare(strict_types=1);

namespace LaravelFlexSettings;

use Illuminate\Support\ServiceProvider;
use LaravelFlexSettings\Console\Commands\LaravelFlexSettingsCommand;

class LaravelFlexSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-flex-settings.php', 'laravel-flex-settings');

        $this->app->singleton(LaravelFlexSettings::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/laravel-flex-settings.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-flex-settings');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laravel-flex-settings');

        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/laravel-flex-settings.php' => config_path('laravel-flex-settings.php'),
        ], ['laravel-flex-settings', 'laravel-flex-settings-config']);

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-flex-settings'),
        ], ['laravel-flex-settings', 'laravel-flex-settings-views']);

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/laravel-flex-settings'),
        ], ['laravel-flex-settings', 'laravel-flex-settings-lang']);

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/laravel-flex-settings'),
        ], ['laravel-flex-settings', 'laravel-flex-settings-assets']);

        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], ['laravel-flex-settings', 'laravel-flex-settings-migrations']);

        $this->commands([
            LaravelFlexSettingsCommand::class,
        ]);
    }
}

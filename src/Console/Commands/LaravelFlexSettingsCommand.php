<?php

declare(strict_types=1);

namespace LaravelFlexSettings\Console\Commands;

use Illuminate\Console\Command;

class LaravelFlexSettingsCommand extends Command
{
    /**
     * The command signature.
     */
    protected $signature = 'laravel-flex-settings:placeholder';

    /**
     * The command description.
     */
    protected $description = 'Placeholder Artisan command shipped by the package laravel-flex-settings.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->line('LaravelFlexSettings placeholder command executed.');

        return self::SUCCESS;
    }
}

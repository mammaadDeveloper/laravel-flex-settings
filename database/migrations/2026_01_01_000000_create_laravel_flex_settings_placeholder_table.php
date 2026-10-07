<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(config('laravel-flex-settings.database.table', 'settings'), function (Blueprint $table) {
            $table->id();
            $table->string('group')->default('general')->index();
            $table->string('type')->default('string');
            $table->string('key');
            $table->json('value');
            $table->boolean('is_active')->default(true);

            $table->unique(['group', 'key']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('laravel-flex-settings.database.table', 'settings'));
    }
};

<?php

declare(strict_types=1);

namespace LaravelFlexSettings\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelFlexSettings\Enums\SettingType;

class Setting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'type' => SettingType::class,
    ];

    public function getTable(): string
    {
        return config('laravel-flex-settings.database.table', 'settings');
    }

    public function getCastedValueAttribute(): mixed
    {
        $type = $this->getAttribute('type');
        $raw = $this->getAttribute('value');

        if (! $type instanceof SettingType) {
            return $raw;
        }

        return $type->cast(is_string($raw) ? $raw : null);
    }
}

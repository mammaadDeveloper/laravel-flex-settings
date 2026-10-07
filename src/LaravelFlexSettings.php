<?php

declare(strict_types=1);

namespace LaravelFlexSettings;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use LaravelFlexSettings\Enums\SettingType;
use LaravelFlexSettings\Models\Setting;

class LaravelFlexSettings
{
    protected string $group;

    public function __construct()
    {
        $this->group = config('laravel-flex-settings.default_group', 'default');
    }

    public function group(string $group): static
    {
        $clone = clone $this;
        $clone->group = $group;

        return $clone;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $setting = $this->query($key)->first();

        return $setting ? $setting->getAttribute('casted_value') : $default;
    }

    public function set(string $key, mixed $value, ?SettingType $type = null): Setting
    {
        $resolvedType = $type ?? SettingType::detect($value);

        return Setting::updateOrCreate(
            ['group' => $this->group, 'key' => $key],
            ['type' => $resolvedType->value, 'value' => $resolvedType->serialize($value)],
        );
    }

    public function has(string $key): bool
    {
        return $this->query($key)->exists();
    }

    public function forget(string $key): bool
    {
        return (bool) $this->query($key)->delete();
    }

    /** @return Collection<string, mixed> */
    public function all(): Collection
    {
        return Setting::where('group', $this->group)
            ->get()
            ->mapWithKeys(fn (Setting $setting) => [$setting->getAttribute('key') => $setting->getAttribute('casted_value')]);
    }

    /** @return Collection<int, string> */
    public function groups(): Collection
    {
        return Setting::query()->distinct()->pluck('group');
    }

    /** @return Builder<Setting> */
    protected function query(string $key): Builder
    {
        return Setting::query()->where('group', $this->group)->where('key', $key);
    }
}

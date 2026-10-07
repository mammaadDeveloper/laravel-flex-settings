<?php

declare(strict_types=1);

namespace LaravelFlexSettings\Enums;

use DateTimeInterface;

enum SettingType: string
{
    case BOOLEAN = 'boolean';
    case STRING = 'string';
    case INTEGER = 'integer';
    case FLOAT = 'float';
    case JSON = 'json';
    case DATE = 'date';

    public static function detect(mixed $value): self
    {
        if ($value instanceof DateTimeInterface) {
            return self::DATE;
        }

        return match (true) {
            is_bool($value) => self::BOOLEAN,
            is_int($value) => self::INTEGER,
            is_float($value) => self::FLOAT,
            is_array($value) => self::JSON,
            default => self::STRING,
        };
    }

    public function serialize(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return match ($this) {
            self::BOOLEAN => $value ? '1' : '0',
            self::JSON => json_encode($value, JSON_THROW_ON_ERROR),
            self::DATE => $value instanceof DateTimeInterface ? $value->format('Y-m-d H:i:s') : (string) $value,
            default => (string) $value,
        };
    }

    public function cast(?string $raw): mixed
    {
        if ($raw === null) {
            return null;
        }

        return match ($this) {
            self::STRING => $raw,
            self::INTEGER => (int) $raw,
            self::FLOAT => (float) $raw,
            self::BOOLEAN => $raw === '1',
            self::JSON => json_decode($raw, true, 512, JSON_THROW_ON_ERROR),
            self::DATE => $raw,
        };
    }
}

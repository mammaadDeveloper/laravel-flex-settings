<div align="center">
    <h1>Laravel Flex Settings</h1>
</div>

<p align="center">
    <a href="https://packagist.org/packages/mammaaddeveloper/laravel-flex-settings"><img src="https://img.shields.io/packagist/v/mammaaddeveloper/laravel-flex-settings.svg?style=flat-square" alt="Packagist"></a>
    <a href="https://packagist.org/packages/mammaaddeveloper/laravel-flex-settings"><img src="https://img.shields.io/packagist/php-v/mammaaddeveloper/laravel-flex-settings.svg?style=flat-square" alt="PHP from Packagist"></a>
    <a href="https://packagist.org/packages/mammaaddeveloper/laravel-flex-settings"><img src="https://badge.laravel.cloud/badge/mammaaddeveloper/laravel-flex-settings?style=flat" alt="Laravel versions"></a>
    <a href="https://github.com/mammaaddeveloper/laravel-flex-settings/actions"><img alt="GitHub Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/mammaaddeveloper/laravel-flex-settings/tests.yml?branch=main&label=Tests&style=flat-square"></a>
    <a href="https://packagist.org/packages/mammaaddeveloper/laravel-flex-settings"><img src="https://img.shields.io/packagist/dt/mammaaddeveloper/laravel-flex-settings.svg?style=flat-square" alt="Total Downloads"></a>
</p>

A lovely package for managing Laravel settings.

## Installation

You can install the package via Composer:

```bash
composer require mammaaddeveloper/laravel-flex-settings
```

You may publish all of the package's resources at once:

```bash
php artisan vendor:publish --tag="laravel-flex-settings"
```

Or, you may publish each resource individually:

### Publishing the Configuration File

```bash
php artisan vendor:publish --tag="laravel-flex-settings-config"
```

### Publishing and Running the Migrations

```bash
php artisan vendor:publish --tag="laravel-flex-settings-migrations"
php artisan migrate
```

### Publishing the Views

```bash
php artisan vendor:publish --tag="laravel-flex-settings-views"
```

### Publishing the Translations

```bash
php artisan vendor:publish --tag="laravel-flex-settings-lang"
```

### Publishing the Public Assets

```bash
php artisan vendor:publish --tag="laravel-flex-settings-assets"
```

## Usage

<!-- Add a basic usage example here. -->

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Contributions are welcome. Please open an issue to discuss proposed changes before submitting a pull request.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [mammaadDeveloper](https://github.com/mammaaddeveloper)
- [All Contributors](../../contributors)

## License

Laravel Flex Settings is open-sourced software licensed under the [MIT license](LICENSE).

# Character Solver laravel package

[![Laravel](https://img.shields.io/badge/Laravel-5.1-orange.svg?style=flat-square)](http://laravel.com) [![Laravel](https://img.shields.io/badge/Laravel-5.2-orange.svg?style=flat-square)](http://laravel.com)

> Character Solver is global middleware solution (convert back html encoding) for some characters.

```
&ccedil;    ç
&Ccedil;    Ç
&ouml;      ö
&Ouml;      Ö
&uuml;      ü
&Uuml;      Ü
```

----------

## Installation

### Composer package

Add this package to your `composer.json` file and run `composer update` once.

```json
"juy/character-solver": "1.*"
```

### Service provider

Append this line to your **service providers** array in `config/app.php`.

```php
Juy\CharacterSolver\ServiceProvider::class,
```

### Publish config

If you need change or add different character, you can publish a config file.

```
php artisan vendor:publish --provider="Juy\Providers\ServiceProvider" --tag="config" --force
```

## Usage

No any usage instructions, package run automatically. You can enable/disable it on config file, after publish config.

----------

### License

This project is open-sourced software licensed under the [MIT License](LICENSE.txt).
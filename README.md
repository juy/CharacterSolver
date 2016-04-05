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
php artisan vendor:publish --provider="Juy\CharacterSolver\ServiceProvider" --tag="config" --force
```

## Usage

Package run automatically with a global middleware. You can enable/disable it on `config/charactersolver.php` config file, after publish package config.

### Advanced usage

If you want to use middleware at Kernel file:

1. Publish package config and disable it on `config/charactersolver.php` config file (`'enabled' => false,`).
2. Add the following code to `app/Http/Kernel.php` file, in web middleware groups.

```
\Juy\CharacterSolver\Middleware\CharacterSolver::class,
```

----------

### License

This project is open-sourced software licensed under the [MIT License](LICENSE.txt).
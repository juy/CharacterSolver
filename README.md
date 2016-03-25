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

You'll need to install the [Composer package](https://packagist.org/packages/juy/character-solver) from Packagist.

Add this package to your `composer.json` file and run `composer update` once.

```json
"juy/character-solver": "1.*",
```

Append this line to your **service providers** array in `config/app.php`.

```php
Juy\CharacterSolver\CharacterSolverServiceProvider::class,
```

## Usage

No any usage instructions, package run automatically.

----------

### License
This project is open-sourced software licensed under the [MIT License](LICENSE.txt).
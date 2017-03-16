# Character Solver Laravel Package

[![Latest Version on Packagist][ico-version]][link-packagist] [![Software License][ico-license]](LICENSE.txt)

> Character Solver is global middleware solution (convert back HTML Entity encoding) for some characters.

Default character replacement list *(Can be changed through the configuration file)*:

```
&ccedil; ->  ç
&Ccedil; ->  Ç
&ouml;   ->  ö
&Ouml;   ->  Ö
&uuml;   ->  ü
&Uuml;   ->  Ü
```

----------

### Supported/Tested Laravel versions

- Laravel **5.1** | **5.2** | **5.3**

### Requirements

- Laravel >= 5.1 : Laravel 5.1 or above.
- PHP >= 5.5.9 : PHP 5.5.9 or above on your machine.

## Installation

### Step:1 Install through composer

#### Install

```
➜ composer require juy/character-solver
```


> #### Manual install (alternative)

> Simply add the following to the "require" section of your composer.json file, and run `composer update` command.

> ```json
>"juy/character-solver": "^1.0"
>```

#### Remove

```
➜ composer remove juy/character-solver
```

### Step 2: Add the service provider

Append this line to your **service providers** array in `config/app.php`.

```php
Juy\CharacterSolver\ServiceProvider::class,
```

### Step 3: Publish config

If you need change or add different character, you can publish a config file.

```
➜ php artisan vendor:publish --provider="Juy\CharacterSolver\ServiceProvider" --tag="config" --force
```

### Config overview

You can modify config as you wish.

```
return [

    'enabled' => true,

    // Default character replacement
    'translate' => [
        '&ccedil;' => 'ç',
        '&Ccedil;' => 'Ç',
        '&ouml;'   => 'ö',
        '&Ouml;'   => 'Ö',
        '&uuml;'   => 'ü',
        '&Uuml;'   => 'Ü',
    ]
];
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


[ico-version]: https://img.shields.io/packagist/v/juy/character-solver.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/juy/character-solver

[ico-license]: https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square
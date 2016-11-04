# Character Solver laravel package

[![Laravel](https://img.shields.io/badge/Laravel-5.3.*-orange.svg?style=flat-square)](http://laravel.com) [![Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.txt) [![Latest Version](https://img.shields.io/github/release/juy/CharacterSolver.svg?style=flat-square&label=latest version)](https://github.com/juy/CharacterSolver/tags)

> Character Solver is global middleware solution (convert back HTML Entity encoding) for some characters.

Default character replacement list *(Changed through the configuration file)*:

```
&ccedil; ->  ç
&Ccedil; ->  Ç
&ouml;   ->  ö
&Ouml;   ->  Ö
&uuml;   ->  ü
&Uuml;   ->  Ü
```

----------

### Supported Laravel Versions

- Laravel **5.1** | **5.2** | **5.3**

## Installation

### Step:1 Install Through Composer

#### Install

```
➜ composer require juy/character-solver:1.*
```


> #### Manual install (Alternative)

> Simply add the following to the "require" section of your composer.json file, and run `composer update` command.

> ```json
>"juy/character-solver": "1.*"
>```

#### Remove

```
➜ composer remove juy/character-solver
```

### Step 2: Add the Service Provider

Append this line to your **service providers** array in `config/app.php`.

```php
Juy\CharacterSolver\ServiceProvider::class,
```

### Step 3: Publish Config

If you need change or add different character, you can publish a config file.

```
➜ php artisan vendor:publish --provider="Juy\CharacterSolver\ServiceProvider" --tag="config" --force
```

### Config Overview

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
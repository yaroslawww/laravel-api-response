# Submitting structured responses is easy

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/yaroslawww/laravel-api-response.svg?branch=master)](https://travis-ci.org/yaroslawww/laravel-api-response) 
[![StyleCI](https://github.styleci.io/repos/216011310/shield?branch=master&style=flat-square)](https://github.styleci.io/repos/216011310)
[![Quality Score](https://img.shields.io/scrutinizer/g/yaroslawww/laravel-api-response.svg?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-api-response/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/yaroslawww/laravel-api-response/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-api-response/?branch=master)
[![PHP Version](https://img.shields.io/travis/php-v/yaroslawww/laravel-api-response.svg?style=flat-square)](https://packagist.org/packages/yaroslawww/laravel-api-response)
[![Packagist Version](https://img.shields.io/packagist/v/yaroslawww/laravel-api-response.svg)](https://packagist.org/packages/yaroslawww/laravel-api-response)

## Installation

You can install the package via composer:

```bash
composer require yaroslawww/laravel-api-response
```
## Usage

```php
Route::get('/', function () {
    return ApiResponse::ok();
});
```
```php
Route::get('/', function (Request $request) {
    $note = Note::create(['text' => $request->text]);
    return ApiResponse::created($note, 'New note created!');
});

### Testing

``` bash
composer test
```

### Security

If you discover any security related issues, please email yaroslav.georgitsa@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

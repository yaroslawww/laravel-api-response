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
```env
# .env
API_VERSION="1.1"
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Gcsc\LaravelApiResponse\ApiResponseProvider" --tag="config"
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
```
verssion >= 2.0 support laravel Resource object
```php
Route::get('/api/profile', function (Request $request) {
    return ApiResponse::created(new \App\Http\Resources\User\Profile($request->user()));
});
```

```bash
>>> (string)ApiResponse::setMessage('Page expired')->send([], 419);
=> """
   HTTP/1.0 419 unknown status\r\n
   Cache-Control: no-cache, private\r\n
   Content-Type:  application/json\r\n
   Date:          Wed, 29 Jan 2020 14:06:07 GMT\r\n
   \r\n
   {"data":[],"meta":{"version":"1.1","environment":"development"},"message":"Page expired"}
   """
```

### Testing

``` bash
composer test
```

### Security

If you discover any security related issues, please email yaroslav.georgitsa@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

# Submitting structured responses is easy

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

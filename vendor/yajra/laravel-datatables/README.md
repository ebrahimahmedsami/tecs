# Laravel DataTables Complete Package

[![Laravel 5.4+](https://img.shields.io/badge/Laravel-5.4+-orange.svg)](http://laravel.com)
[![Latest Stable Version](https://img.shields.io/packagist/v/yajra/laravel-datatables.svg)](https://packagist.org/packages/yajra/laravel-datatables)
[![Build Status](https://travis-ci.org/yajra/laravel-datatables.svg?branch=master)](https://travis-ci.org/yajra/laravel-datatables)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yajra/laravel-datatables/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yajra/laravel-datatables/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/yajra/laravel-datatables.svg)](https://packagist.org/packages/yajra/laravel-datatables)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/yajra/laravel-datatables)

This package is a complete installer of [Laravel DataTables](https://github.com/yajra/laravel-datatables) core & plugins.

## Requirements
- [PHP >=7.0](http://php.net/)
- [Laravel 5.4+](https://github.com/laravel/framework)
- [jQuery DataTables v1.10.x](http://datatables.net/)
- [jQuery DataTables Buttons Extension](https://datatables.net/reference/button/)

## Documentations
- [Laravel DataTables Documentation](http://yajrabox.com/docs/laravel-datatables)

## Installation
`composer require yajra/laravel-datatables:^1.5`

#### Service Providers
Update `config/app.php` and register the following providers.
> This step is optional if you are using Laravel 5.5.

```php
Yajra\DataTables\DataTablesServiceProvider::class,
Yajra\DataTables\ButtonsServiceProvider::class,
Yajra\DataTables\FractalServiceProvider::class
```

#### Configuration and Assets (Optional)
`$ php artisan vendor:publish`

And that's it! Start building out some awesome DataTables!

## Contributing

Please see [CONTRIBUTING](https://github.com/yajra/laravel-datatables/blob/master/.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [aqangeles@gmail.com](mailto:aqangeles@gmail.com) instead of using the issue tracker.

## Credits

- [Arjay Angeles](https://github.com/yajra)
- [All Contributors](https://github.com/yajra/laravel-datatables/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/yajra/laravel-datatables/blob/master/LICENSE.md) for more information.

## Buy me a beer
[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.me/yajra)
<a href='https://www.patreon.com/bePatron?u=4521203'><img alt='Become a Patron' src='https://s3.amazonaws.com/patreon_public_assets/toolbox/patreon.png' border='0' width='200px' ></a>

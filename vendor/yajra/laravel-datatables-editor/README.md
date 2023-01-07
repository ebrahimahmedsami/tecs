# Laravel DataTables Editor Plugin.

[![Laravel 5.5+](https://img.shields.io/badge/Laravel-5.5+-orange.svg)](http://laravel.com)
[![Latest Stable Version](https://img.shields.io/packagist/v/yajra/laravel-datatables-editor.svg)](https://packagist.org/packages/yajra/laravel-datatables-editor)
[![Build Status](https://travis-ci.org/yajra/laravel-datatables-editor.svg?branch=master)](https://travis-ci.org/yajra/laravel-datatables-editor)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yajra/laravel-datatables-editor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yajra/laravel-datatables-editor/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/yajra/laravel-datatables-editor.svg)](https://packagist.org/packages/yajra/laravel-datatables-editor)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/yajra/laravel-datatables-editor)

This package is a plugin of [Laravel DataTables](https://github.com/yajra/laravel-datatables) for processing [DataTables Editor](https://editor.datatables.net/) library.

> Special thanks to [@bellwood](https://github.com/bellwood) and [@DataTables](https://github.com/datatables) for being [generous](https://github.com/yajra/laravel-datatables/issues/1548) for providing a license to support the development of this package.

**NOTE:** A [premium license](https://editor.datatables.net/purchase/index) is required to be able to use [DataTables Editor](https://editor.datatables.net/) library.

## Requirements

- [Laravel 5.5+](https://github.com/laravel/framework)
- [Laravel DataTables 9.x](https://github.com/yajra/laravel-datatables)

## Documentations

- [Laravel DataTables Editor Manual](https://yajrabox.com/docs/laravel-datatables/master/editor-installation)
- [jQuery DataTables Editor Manual](https://editor.datatables.net/manual/index)

## Features

- DataTables Editor CRUD actions supported.
- Inline editing.
- Bulk edit & delete function.
- CRUD validation.
- CRUD pre / post events hooks.
- Artisan command for DataTables Editor generation.

## ROAD MAP
- [x] Add artisan command to generate DataTablesEditor stub.
- [x] Fix issue with edit action where unmodified column are being added on the request.

    > This only happens when the field is [password](http://luik.datatables.net/forums/discussion/34151/how-do-i-prevent-password-field-from-changing-every-time-a-row-is-edited).
    The solution is to add an empty password on response.

    ```php
    datatables(User::query())->setRowId('id')->addColumn('password', '')->toJson()
    ```
- [x] Add CRUD pre / post event hooks.
- [x] Add tests.
- [x] Docs, docs, docs...
- [ ] Create demo site.

## Quick Installation

`composer require yajra/laravel-datatables-editor:^1.25`

And that's it! Start building out some awesome DataTables Editor!

## Contributing

Please see [CONTRIBUTING](https://github.com/yajra/laravel-datatables-editor/blob/master/.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [aqangeles@gmail.com](mailto:aqangeles@gmail.com) instead of using the issue tracker.

## Credits

- [Arjay Angeles](https://github.com/yajra)
- [All Contributors](https://github.com/yajra/laravel-datatables-editor/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/yajra/laravel-datatables-editor/blob/master/LICENSE.md) for more information.

## Built with Love :heart:

Using this package requires you a license that costs more than a coffee.
If this helps you in any way, don't be shy and pour some coffee for me. :heart:

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.me/yajra)
<a href='https://www.patreon.com/bePatron?u=4521203'><img alt='Become a Patron' src='https://s3.amazonaws.com/patreon_public_assets/toolbox/patreon.png' border='0' width='200px' ></a>

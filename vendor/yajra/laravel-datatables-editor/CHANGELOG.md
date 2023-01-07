# Laravel DataTables Editor CHANGELOG

## [Unreleased]

## [v1.25.1] - 2022-05-05

- Fix doc blocks.
- Update readme.

## [v1.25.0] - 2021-11-08

- Add methods for custom handling of uploaded files.

## [v1.24.2] - 2021-08-13

- Remove buttons package in dependency. #62

## [v1.24.1] - 2021-07-30

- Fix setting of validation rules when using dot in field name. 
- Ex: settings.image, settings.logo, etc.
  
## [v1.24.0] - 2021-05-17

- Remove abstract on create, edit and remove rules.

## [v1.23.0] - 2021-04-28

- Add customActions property. #58
- Fix HTTP code (422) when an error occurs.

## [v1.22.0] - 2020-09-09

- Add support for Laravel 8.

## [v1.21.0] - 2020-04-02

- Include the action performed by the editor on json response.

## [v1.20.0] - 2020-03-04

- Allow Laravel 7.

## [v1.19.0] - 2020-02-23

- Fix & use original client name when uploading file.
- Add timestamp prefix on filename to possibly avoid duplicate files.
- Add method to compute field uploaded filename. `getUploadedFilename($field, UploadedFile $uploadedFile)`

## [v1.18.0] - 2020-02-01

- Include file original name on upload response.

## [v1.17.1] - 2019-09-21

- Log exception for further debugging and error tracking.

## [v1.17.0] - 2019-09-21

- Add server error handler for all actions.
- Change toJson method signature to: `toJson(array $data, array $errors = [], $error = '')`.
- Remove unused method `displayValidationErrors`.

## [v1.16.0] - 2019-09-20

- Add tracker for current data that is being processed by editor.
- Useful when validation requires value from another data.

```php
Rule::unique($model->getTable())
    ->where('employee_id', $this->currentData['employee_id'])
    ->ignore($model->getKey()),
```

## [v1.15.0] - 2019-09-17

- Add support for `restore` action.
- Requires https://github.com/yajra/laravel-datatables-assets/blob/master/js/buttons/restore.js.

## [v1.14.1] - 2019-09-14

- Fix unknown column DT_RowId error when doing batch insert.

## [v1.14.0] - 2019-09-13

- Add support for `forceDelete` action.
- Requires https://github.com/yajra/laravel-datatables-assets/blob/master/js/buttons/forceDelete.js.

## [v1.13.1] - 2019-09-12

- Fix stub for getting table name.

## [v1.13.0] - 2019-09-12

- Allow setting of custom stub path from buttons package config.
- Update stub to resolve table name from model for create rules.

## [v1.12.2] - 2019-09-10

- Fix response to match the demo json structure.

## [v1.12.1] - 2019-09-10

- Fix upload messages.

## [v1.12.0] - 2019-09-10

- Add support for handling field type upload and uploadMany. [#38]
- Fix [#17].
- Deprecated the following methods: createMessages(), editMessages(), removeMessages() and refactor it to one method messages().

## [v1.11.1] - 2019-09-06

- Change type to `DataTableEditor` from `DataTablesEditor` to match core library naming convention.
- ex: `UsersDataTable`, `UsersDataTableEditor`.

## [v1.11.0] - 2019-09-04

- Add support for Laravel 6.

## [v1.10.1] - 2019-08-31

- Fix creating and saving hooks are not saving the $data changes. [#36], credits to @karmendra.

## [v1.10.0] - 2019-08-27

- Add unguarded property to allow mass assignment on model.

## [v1.9.1] - 2019-08-24

- Fix bulk edit and remove.

## [v1.9.0] - 2019-08-24

- Add initial support for SoftDeletes.
- Fill model before firing updating event.
- Clone model before deleting to record affected models.

## [v1.8.1] - 2019-08-24

- Fill model before triggering the creating event.

## [v1.8.0] - 2019-06-06

- Get some new attributes when calling hooks [#27], credits to @aminprox
- Add model fluent getter and setter. [#29], fix [#24].
- Fix and added tests [#31].

## [v1.7.0] - 2019-02-27

- Add support for Laravel 5.8.

## [v1.6.1] - 2018-11-03

- Fix model instance.

## [v1.6.0] - 2018-11-03

- Add saving & saved event hook.

## [v1.5.0] - 2018-09-05

- Add support for Laravel 5.7.

## [v1.4.0] - 2018-08-15

- Add support for dataTables buttons package v4.

## [v1.3.0] - 2018-08-01

- Get custom attributes for validator errors [#14], credits to @karmendra
- Fix [#13]

## [v1.2.0] - 2018-06-27

- Add functions to override validation messages.

## [v1.1.4] - 2018-06-17

- Fix displaying of remove validation errors.

## [v1.1.3] - 2018-06-17

- Refactor remove query exception message.
- Allow remove error message customization.

## [v1.1.2] - 2018-06-13

- Fix displaying of remove validation error. [#9]
- Add remove error handler for constraint / query exception.

## [v1.1.1] - 2018-05-28

- Add missing key when remove validation failed.

## [v1.1.0] - 2018-02-11

- Add support for Laravel 5.6.
- Update license to 2018.

## [v1.0.0] - 2017-12-17

- First stable release.

### Features

- DataTables Editor CRUD actions supported.
- Inline editing.
- Bulk edit & delete function.
- CRUD validation.
- CRUD pre / post events hooks.
- Artisan command for DataTables Editor generation.

[Unreleased]: https://github.com/yajra/laravel-datatables-editor/compare/v1.25.1...master
[v1.25.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.25.0...v1.25.1
[v1.25.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.24.2...v1.25.0
[v1.24.2]: https://github.com/yajra/laravel-datatables-editor/compare/v1.24.1...v1.24.2
[v1.24.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.24.0...v1.24.1
[v1.24.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.23.0...v1.24.0
[v1.23.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.22.0...v1.23.0
[v1.22.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.21.0...v1.22.0
[v1.21.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.20.0...v1.21.0
[v1.20.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.19.0...v1.20.0
[v1.19.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.18.0...v1.19.0
[v1.18.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.17.1...v1.18.0
[v1.17.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.17.0...v1.17.1
[v1.17.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.16.0...v1.17.0
[v1.16.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.15.0...v1.16.0
[v1.15.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.14.1...v1.15.0
[v1.14.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.14.0...v1.14.1
[v1.14.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.13.1...v1.14.0
[v1.13.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.13.0...v1.13.1
[v1.13.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.12.1...v1.13.0
[v1.12.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.12.0...v1.12.1
[v1.12.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.11.1...v1.12.0
[v1.11.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.11.0...v1.11.1
[v1.11.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.10.1...v1.11.0
[v1.10.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.10.0...v1.10.1
[v1.10.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.9.1...v1.10.0
[v1.9.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.9.0...v1.9.1
[v1.9.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.8.0...v1.9.0
[v1.8.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.7.0...v1.8.0
[v1.7.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.6.1...v1.7.0
[v1.6.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.6.0...v1.6.1
[v1.6.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.5.0...v1.6.0
[v1.5.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.4.0...v1.5.0
[v1.4.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.3.0...v1.4.0
[v1.3.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.2.0...v1.3.0
[v1.2.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.1.4...v1.2.0
[v1.1.4]: https://github.com/yajra/laravel-datatables-editor/compare/v1.1.3...v1.1.4
[v1.1.3]: https://github.com/yajra/laravel-datatables-editor/compare/v1.1.2...v1.1.3
[v1.1.2]: https://github.com/yajra/laravel-datatables-editor/compare/v1.1.1...v1.1.2
[v1.1.1]: https://github.com/yajra/laravel-datatables-editor/compare/v1.1.0...v1.1.1
[v1.1.0]: https://github.com/yajra/laravel-datatables-editor/compare/v1.0.0...v1.1.0
[v1.0.0]: https://github.com/yajra/laravel-datatables-editor/compare/master...v1.0.0

[#9]: https://github.com/yajra/laravel-datatables-editor/pull/9
[#14]: https://github.com/yajra/laravel-datatables-editor/pull/14
[#27]: https://github.com/yajra/laravel-datatables-editor/pull/27
[#29]: https://github.com/yajra/laravel-datatables-editor/pull/29
[#31]: https://github.com/yajra/laravel-datatables-editor/pull/31
[#38]: https://github.com/yajra/laravel-datatables-editor/pull/38

[#13]: https://github.com/yajra/laravel-datatables-editor/issues/13
[#24]: https://github.com/yajra/laravel-datatables-editor/issues/24
[#17]: https://github.com/yajra/laravel-datatables-editor/issues/17

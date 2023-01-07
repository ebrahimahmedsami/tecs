<?php

namespace Yajra\DataTables;

use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\Generators\DataTablesEditorCommand;

class EditorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(DataTablesEditorCommand::class);
    }
}

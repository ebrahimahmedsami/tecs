<?php

namespace Yajra\DataTables\Generators;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class DataTablesEditorCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'datatables:editor
                            {name : The name of the dataTable editor.}
                            {--model : The name given will be used as the model is singular form.}
                            {--model-namespace= : The namespace of the model to be used.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new DataTables Editor class.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'DataTableEditor';

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        return $this->replaceModelImport($stub)->replaceModel($stub);
    }

    /**
     * Replace model name.
     *
     * @param  string  $stub
     * @return string
     */
    protected function replaceModel(&$stub)
    {
        $model = explode('\\', $this->getModel());
        $model = array_pop($model);
        $stub  = str_replace('ModelName', $model, $stub);

        return $stub;
    }

    /**
     * Get model name to use.
     */
    protected function getModel()
    {
        $name           = $this->getNameInput();
        $rootNamespace  = $this->laravel->getNamespace();
        $model          = $this->option('model') || $this->option('model-namespace');
        $modelNamespace = $this->option('model-namespace') ? $this->option('model-namespace') : $this->laravel['config']->get('datatables-buttons.namespace.model');

        return $model
            ? $rootNamespace . '\\' . ($modelNamespace ? $modelNamespace . '\\' : '') . Str::singular($name)
            : $rootNamespace . '\\User';
    }

    /**
     * Replace model import.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceModelImport(&$stub)
    {
        $stub = str_replace(
            'DummyModel', str_replace('\\\\', '\\', $this->getModel()), $stub
        );

        return $this;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $path = $this->laravel['config']->get('datatables-buttons.stub');

        return $path ? base_path($path) . '/editor.stub' : __DIR__ . '/stubs/editor.stub';
    }

    /**
     * Replace the filename.
     *
     * @param  string  $stub
     * @return string
     */
    protected function replaceFilename(&$stub)
    {
        $stub = str_replace(
            'DummyFilename', Str::slug($this->getNameInput()), $stub
        );

        return $stub;
    }

    /**
     * Parse the name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function qualifyClass($name)
    {
        $rootNamespace = $this->laravel->getNamespace();

        if (Str::startsWith($name, $rootNamespace)) {
            return $name;
        }

        if (Str::contains($name, '/')) {
            $name = str_replace('/', '\\', $name);
        }

        if (! Str::contains(Str::lower($name), 'datatable')) {
            $name .= $this->type;
        }

        return $this->getDefaultNamespace(trim($rootNamespace, '\\')) . '\\' . $name;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\' . $this->laravel['config']->get('datatables-buttons.namespace.base', 'DataTables');
    }
}

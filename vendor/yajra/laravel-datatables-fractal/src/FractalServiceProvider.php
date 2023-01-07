<?php

namespace Yajra\DataTables;

use League\Fractal\Manager;
use Illuminate\Support\ServiceProvider;
use League\Fractal\Serializer\DataArraySerializer;
use Yajra\DataTables\Commands\TransformerMakeCommand;
use Yajra\DataTables\Transformers\FractalTransformer;

class FractalServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/datatables-fractal.php', 'datatables-fractal');
        $this->publishAssets();

        $this->registerMacro();
    }

    /**
     * Publish datatables assets.
     *
     * @return void
     */
    protected function publishAssets()
    {
        $this->publishes(
            [
            __DIR__ . '/../config/datatables-fractal.php' => config_path('datatables-fractal.php'),
            ], 'datatables-fractal'
        );
    }

    /**
     * Register DataTables macro methods.
     *
     * @return void
     */
    protected function registerMacro()
    {
        DataTableAbstract::macro(
            'setTransformer', function ($transformer) {
                $this->transformer = [$transformer];

                return $this;
            }
        );

        DataTableAbstract::macro(
            'addTransformer', function ($transformer) {
                $this->transformer[] = $transformer;

                return $this;
            }
        );

        DataTableAbstract::macro(
            'setSerializer', function ($serializer) {
                $this->serializer = $serializer;

                return $this;
            }
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'datatables.fractal', function () {
                $fractal = new Manager;
                $config  = $this->app['config'];
                $request = $this->app['request'];

                $includesKey = $config->get('datatables-fractal.includes', 'include');
                if ($request->get($includesKey)) {
                    $fractal->parseIncludes($request->get($includesKey));
                }

                $serializer = $config->get('datatables-fractal.serializer', DataArraySerializer::class);
                $fractal->setSerializer(new $serializer);

                return $fractal;
            }
        );

        $this->app->singleton(
            'datatables.transformer', function () {
                return new FractalTransformer($this->app->make('datatables.fractal'));
            }
        );

        $this->commands(
            [
                TransformerMakeCommand::class,
            ]
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'datatables.fractal',
            'datatables.transformer',
        ];
    }
}

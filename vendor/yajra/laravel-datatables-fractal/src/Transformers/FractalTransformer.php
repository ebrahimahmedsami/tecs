<?php

namespace Yajra\DataTables\Transformers;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;
use League\Fractal\Serializer\SerializerAbstract;

class FractalTransformer
{
    /**
     * @var \League\Fractal\Manager
     */
    protected $fractal;

    /**
     * FractalTransformer constructor.
     *
     * @param \League\Fractal\Manager $fractal
     */
    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
     * Transform output using the given transformer and serializer.
     *
     * @param  mixed $output
     * @param  mixed $transformer
     * @param  mixed $serializer
     * @return array
     */
    public function transform($output, $transformer, $serializer = null)
    {
        if ($serializer !== null) {
            $this->fractal->setSerializer($this->createSerializer($serializer));
        }

        $collector = [];
        foreach ($transformer as $transform) {
            if ($transform != null) {
                $resource       = new Collection($output, $this->createTransformer($transform));
                $collection     = $this->fractal->createData($resource)->toArray();
                $transformed    = $collection['data'] ?? $collection;
                $collector      = array_map(
                    function ($item_collector, $item_transformed) {
                        if ($item_collector === null) {
                            $item_collector = [];
                        }

                        return array_merge($item_collector, $item_transformed);
                    }, $collector, $transformed
                );
            }
        }

        return $collector;
    }

    /**
     * Get or create transformer serializer instance.
     *
     * @param  mixed $serializer
     * @return \League\Fractal\Serializer\SerializerAbstract
     */
    protected function createSerializer($serializer)
    {
        if ($serializer instanceof SerializerAbstract) {
            return $serializer;
        }

        return new $serializer();
    }

    /**
     * Get or create transformer instance.
     *
     * @param  mixed $transformer
     * @return \League\Fractal\TransformerAbstract
     */
    protected function createTransformer($transformer)
    {
        if ($transformer instanceof TransformerAbstract || $transformer instanceof \Closure) {
            return $transformer;
        }

        return new $transformer();
    }
}

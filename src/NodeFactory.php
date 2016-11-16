<?php

namespace Greabock\NodeBuilder\Doctrine\Laravel;

use Illuminate\Contracts\Container\Container;

class NodeFactory
{
    /**
     * @var Container
     */
    protected $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function make($type)
    {
        return $this->app->build($type);
    }
}
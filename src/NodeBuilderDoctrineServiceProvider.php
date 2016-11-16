<?php

namespace Greabock\NodeBuilder\Doctrine\Laravel;

use Greabock\NodeBuilder\Support\Contracts\NodeFillerInterface;
use Greabock\NodeBuilder\Support\Contracts\NodeKnowledgeInterface;
use Greabock\NodeBuilder\Support\Contracts\NodeMapBuilderInterface;
use Greabock\NodeBuilder\Support\Contracts\NodeResolverInterface;
use Greabock\RestMapper\Contracts\IdentityInterface;
use Illuminate\Support\ServiceProvider;
use Ramsey\Uuid\Uuid;

class NodeBuilderDoctrineServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/node-doctrine.php', 'node-doctrine'
        );

        $config = $this->app['config']['node-doctrine']['implementations'];

        $this->app->singleton(NodeMapBuilderInterface::class, $config[NodeMapBuilderInterface::class]);
        $this->app->singleton(NodeFillerInterface::class, $config[NodeFillerInterface::class]);
        $this->app->singleton(NodeKnowledgeInterface::class, $config[NodeKnowledgeInterface::class]);
        $this->app->singleton(NodeResolverInterface::class, function ($app) use ($config) {
            $factory = $this->app->make($config['factory']);

            return $app->build($config[NodeResolverInterface::class], [
                'factory' => [$factory, 'make'],
            ]);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '../config/node-doctrine.php' => config_path('node-doctrine.php'),
        ]);
    }
}
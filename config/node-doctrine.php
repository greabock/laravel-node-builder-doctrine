<?php

return [
    'implementations' => [
        Greabock\NodeBuilder\Support\Contracts\NodeMapBuilderInterface::class =>
            Greabock\NodeBuilder\Builder::class,
        Greabock\NodeBuilder\Support\Contracts\NodeFillerInterface::class     =>
            Greabock\NodeBuilder\Filler::class,
        Greabock\NodeBuilder\Support\Contracts\NodeKnowledgeInterface::class  =>
            Greabock\NodeBuilder\Doctrine\Knowledge::class,
        Greabock\NodeBuilder\Support\Contracts\NodeResolverInterface::class   =>
            Greabock\NodeBuilder\Doctrine\Resolver::class,
        'factory' => \Greabock\NodeBuilder\Doctrine\Laravel\NodeFactory::class,
    ],
];
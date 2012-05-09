<?php

namespace O2W\O2WBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration
{
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder
            ->root('o2w_base')
            ->children()
              ->scalarNode('title')->isRequired()->cannotBeEmpty()->end()
            ->end()
            ->end()
            ->buildTree()
            ;

        return $rootNode;
    }
}
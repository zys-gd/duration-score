<?php


namespace ZYS\DurationScoreBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('duration_score');

        // $treeBuilder->getRootNode()
        //     ->children()
        //     ->scalarNode('google_api_key')
        //     ->isRequired()
        //     ->end()
        //     ->end();

        return $treeBuilder;
    }
}
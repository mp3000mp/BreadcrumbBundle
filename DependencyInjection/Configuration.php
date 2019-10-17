<?php

namespace MP3000MP\BreadcrumbBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('mp3000mp_breadcrumb');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('twig_template')
                ->defaultValue('@Breadcrumb/default.html.twig')
            ->end()
                ->scalarNode('translation_domain')
                ->defaultValue('messages')
            ->end()
        ->end();

        return $treeBuilder;
    }
}

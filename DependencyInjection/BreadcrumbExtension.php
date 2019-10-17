<?php

namespace MP3000MP\BreadcrumbBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class BreadcrumbExtension.
 */
class BreadcrumbExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // load services
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');

        // load config
        $configuration = new Configuration();
        $configs = $this->processConfiguration($configuration, $configs);
        $container->setParameter('mp3000mp_breadcrumb.options', $configs);
    }
}

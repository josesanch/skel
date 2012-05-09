<?php
namespace O2W\O2WBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Processor;

class O2WBaseExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        //        $config = $processor->processConfiguration($configuration, $configs);
        $config = $processor->process($configuration->getConfigTree(), $configs);
        //        var_dump($config);


        /*       $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        */
    }

    public function getAlias()
    {
        return 'o2w_base';
    }

}
<?php

namespace O2W\O2WBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Resource\ResourceInterface;
class O2WBundle extends Bundle
{
    /*
    public function ____build(ContainerBuilder $container)
    {
        //        var_dump($container->getResources());
        //        $container->addResource("@BaseBandle/Resources/config/routing.yml");

        $container->loadFromExtension(
            'framework', array(
                'router'        => array('resource' => '@O2WBundle/Resources/config/routing.yml'),
            ));
        //        $container->get("loader")->load("@BaseBandle/Resources/config/routing.yml");
    }
    */

}

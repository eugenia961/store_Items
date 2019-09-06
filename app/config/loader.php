<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
        [
            $config->application->controllersDir,

        ]
)->register();

$loader->registerNamespaces(
        [
            'App\Controller' => $config->application->controllersDir,
            'App\Items' => $config->application->itemsDir,
            'App\Users'=>$config->application->usersDir,
            'App\Carts'=>$config->application->cartsDir,

            'App\DataFixtures' => $config->application->dataFixturesDir,
            
            
        ]
)->register();

<?php

use Phalcon\Di\FactoryDefault\Cli as CliDI;
use Phalcon\Cli\Console as ConsoleApp;
use Phalcon\Loader;

// Using the CLI factory default services container
$di = new CliDI();

/**
 * Register the autoloader and tell it to register the tasks directory
 */
$loader = new Loader();



$loader->registerDirs(
        [
            __DIR__ . '/tasks',
        ]
);

$loader->register();

// Load the configuration file (if any)
$configFile = __DIR__ . '/config/config.php';

if (is_readable($configFile)) {
    $config = include $configFile;

    $di->set('config', $config);
}


$loader->registerNamespaces(
        [
           
            'App\Items' => $config->application->itemsDir,
            'App\Users' => $config->application->usersDir,

            'App\DataFixtures' => $config->application->dataFixturesDir,
            
            
        ]
)->register();

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
    ];

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }

    $connection = new $class($params);

    return $connection;
});


$di->set(
    'security',
    function () {
        $security = new Phalcon\Security();

        // Set the password hashing factor to 12 rounds
        $security->setWorkFactor(12);

        return $security;
    },
    true
);

/**
 * Dependency injection
 */
$di->set(\App\Items\Interfaces\ItemRepositoryInterface::class, function() {
    return new \App\Items\Repository\ItemRepository();
});

$di->set(\App\Users\Interfaces\UserRepositoryInterface::class, function() {
    return new App\Users\Repository\UserRepository();
});

// Create a console application
$console = new ConsoleApp();

$console->setDI($di);

/**
 * Process the console arguments
 */
$arguments = [];

foreach ($argv as $k => $arg) {
    if ($k === 1) {
        $arguments['task'] = $arg;
    } elseif ($k === 2) {
        $arguments['action'] = $arg;
    } elseif ($k >= 3) {
        $arguments['params'][] = $arg;
    }
}

try {
    // Handle incoming arguments
    $console->handle($arguments);
} catch (\Phalcon\Exception $e) {
    // Do Phalcon related stuff here
    // ..
    fwrite(STDERR, $e->getMessage() . PHP_EOL);
    exit(1);
} catch (\Throwable $throwable) {
    fwrite(STDERR, $throwable->getMessage() . PHP_EOL);
    exit(1);
} catch (\Exception $exception) {
    fwrite(STDERR, $exception->getMessage() . PHP_EOL);
    exit(1);
}
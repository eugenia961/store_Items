<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;


/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ]);

            $compiler = $volt->getCompiler();

            $compiler->addFunction('number_format', function ($resolvedArgs, $exprArgs) use ($compiler) {
                        $firstArgument = $compiler->expression($exprArgs[0]['expr']);
                        return 'number_format(' . $firstArgument . ", 2, ',', '.')";
                    });


            $compiler->addFunction('quantity_format', function ($resolvedArgs, $exprArgs) use ($compiler) {
                        $firstArgument = $compiler->expression($exprArgs[0]['expr']);
                        return 'number_format(' . $firstArgument . ", 0,',','')";
                    });
                    
                    
                   $compiler->addFunction('json_encode', function ($resolvedArgs, $exprArgs) use ($compiler) {
                        $firstArgument = $compiler->expression($exprArgs[0]['expr']);
                        return 'json_encode(' . $firstArgument . ", true)";
                    });
   
                    


            return $volt;
        },
        '.phtml' => PhpEngine::class
    ]);

    return $view;
});

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


/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});


/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

$di->set('dispatcher', function() {
    $dispatcher = new \Phalcon\Mvc\Dispatcher();
    $dispatcher->setDefaultNamespace('App\Controller');
    return $dispatcher;
});

$di->set(
        'security', function () {
    $security = new Phalcon\Security();

    // Set the password hashing factor to 12 rounds
    $security->setWorkFactor(12);

    return $security;
}, true
);

/**
 * Register the flash service with custom CSS classes
 */
$alerts = [
    'error' => 'alert alert-danger',
    'success' => 'alert alert-success',
    'notice' => 'alert alert-info',
    'warning' => 'alert alert-warning'
];

$di->set('flash', function() use ($alerts) {
    return new \Phalcon\Flash\Direct($alerts);
});

$di->set('flashSession', function() use ($alerts) {
    return new Phalcon\Flash\Session($alerts);
});


/*
 * Dependency injection
 */
$di->set(\App\Items\Interfaces\ItemRepositoryInterface::class, function() {
    return new \App\Items\Repository\ItemRepository();
});


$di->set(\App\Users\Interfaces\UserRepositoryInterface::class, function() {
    return new App\Users\Repository\UserRepository();
});

$di->set(\App\Carts\Interfaces\CartRepositoryInterface ::class, function() {
    return new \App\Carts\Repository\CartRepository();
});



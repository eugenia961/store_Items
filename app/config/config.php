<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter' => 'Postgresql',
        'host' => '127.0.0.1',
        'username' => 'postgres',
        'password' => 'hola123',
        'dbname' => 'store',
    ],
    'application' => [
        'appDir' => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/Controller/',
        'itemsDir' => APP_PATH . '/Items/',
        'usersDir' => APP_PATH . '/Users/',
        'cartsDir' => APP_PATH . '/Carts/',
        
        'migrationsDir' => APP_PATH . '/migrations/',
        'viewsDir' => APP_PATH . '/views/',
        'pluginsDir' => APP_PATH . '/plugins/',
        'libraryDir' => APP_PATH . '/library/',
        'cacheDir' => BASE_PATH . '/cache/',
   
        'dataFixturesDir' => APP_PATH . '/DataFixtures/',
        //
        //
        //
        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        'baseUri' => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
    ]
        ]);

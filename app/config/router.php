<?php

$router = $di->getRouter();

$router->add("/cart/add/{id}/{page}", "App\Carts\Controller\CartAdd::index");

$router->add("/cart/show", "App\Carts\Controller\CartShow::index");

$router->add("/cart/delete/{id}", "App\Carts\Controller\CartDelete::index");

$router->add("/cart/user", "App\Carts\Controller\CartUser::index");

$router->add("/user/register", "App\Users\Controller\UserRegister::index");

$router->add("/user/info/{id}", "App\Users\Controller\UserInfo::index");

$router->add("/user/login", "App\Users\Controller\Login::index");

$router->add("/user/logout", "App\Users\Controller\Logout::index");

$router->add("/index/{page}", "Index::index");


$router->handle();

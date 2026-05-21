<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Controller1::index');
$routes->get('controller1/misto/(:num)', 'Controller1::misto/$1');

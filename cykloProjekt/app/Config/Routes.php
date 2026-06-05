<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Controller1::index');
$routes->get('controller1/misto/(:num)', 'Controller1::misto/$1');
$routes->get('controller1/vsechny', 'Controller1::vsechny');
$routes->get('controller1/editovat/(:num)', 'Controller1::editovat/$1');
$routes->post('controller1/aktualizovat/(:num)', 'Controller1::aktualizovat/$1');
$routes->get('controller1/smazat/(:num)', 'Controller1::smazat/$1');
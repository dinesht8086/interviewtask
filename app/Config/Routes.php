<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



$routes->get('/records', 'Records::index');
$routes->post('/records/create', 'Records::create');
$routes->get('/records/edit/(:num)', 'Records::edit/$1');
$routes->post('/records/update/(:num)', 'Records::update/$1');
$routes->get('/records/delete/(:num)', 'Records::delete/$1');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

$routes->get('/dosen', 'Dosen::index');
$routes->get('/dosen/create', 'Dosen::create');
$routes->post('/dosen/store', 'Dosen::store');
$routes->get('/dosen/edit/(:num)', 'Dosen::edit/$1');
$routes->put('/dosen/update/(:num)', 'Dosen::update/$1');
$routes->delete('/dosen/delete/(:num)', 'Dosen::destroy/$1');
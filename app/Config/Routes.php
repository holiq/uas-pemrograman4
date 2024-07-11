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

$routes->get('/matkul', 'Matkul::index');
$routes->get('/matkul/create', 'Matkul::create');
$routes->post('/matkul/store', 'Matkul::store');
$routes->get('/matkul/edit/(:num)', 'Matkul::edit/$1');
$routes->put('/matkul/update/(:num)', 'Matkul::update/$1');
$routes->delete('/matkul/delete/(:num)', 'Matkul::destroy/$1');
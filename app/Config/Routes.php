<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('publication', 'Publication::index');

$routes->post('publication/add', 'Publication::add');

$routes->post('user/login', 'User::login');

$routes->get('user/logout', 'User::logout');

$routes->match(['get','post'], 'publication/edit/(:num)', 'Publication::edit/$1');

$routes->get('publication/delete/(:num)', 'Publication::delete/$1');


$routes->get('user', 'User::index');
$routes->get('user/delete/(:num)', 'User::delete/$1');
$routes->match(['get','post'], 'user/edit/(:num)', 'User::edit/$1');


$routes->get('gallery', 'ImageController::index');

$routes->post('image/upload', 'ImageController::upload');

$routes->get('image/delete/(:num)', 'ImageController::delete/$1');

$routes->match(['get','post'], 'user/register', 'User::register');

$routes->get('admin/gallery', 'ImageController::admin');
<?php

use App\Controllers\PagesController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'PagesController::index');
$routes->get('/about','PagesController::about');
$routes->get('/contact','PagesController::contact');
$routes->get('/comics','ComicsController::index');
$routes->get('/comics/create','ComicsController::create');
$routes->get('/comics/edit/(:segment)','ComicsController::edit/$1');
$routes->post('/comics/update/(:num)','ComicsController::update/$1');
$routes->post('/comics/save','ComicsController::save');
$routes->delete('/comics/(:num)','ComicsController::delete/$1');
$routes->get('/comics/(:any)','ComicsController::detail/$1');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/login', 'adminController::index');
$routes->get('/admin/register', 'adminController::signup');

//php tech life 
$routes->get('/user/create', 'user::create');
$routes->post('user/create', 'User::create');
$routes->get('/user/success', 'User::success');   
$routes->get('/user/index', 'User::index');    
$routes->get('/user/edit/(:num)', 'User::edit/$1', ['as' => 'userEdit']);
$routes->post('/user/update/(:num)', 'User::update/$1', ['as' => 'userUpdate']);
$routes->get('/user/delete/(:num)', 'User::delete/$1', ['as' => 'deleteUser']);












<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/db', 'Home::indexx');


$routes->get('/login', 'Login::index');
$routes->get('/login/process', 'Login::process');
$routes->get('/v_login', 'Admin::login');
$routes->get('/register', 'Admin::register');
$routes->get('/password', 'Admin::password');


// $routes->get('/', 'SignupController::index');
$routes->get('/signup', 'Signup::index');
$routes->match(['get', 'post'], 'store', 'Signup::store');
$routes->match(['get', 'post'], 'loginAuth', 'Signin::loginAuth');
$routes->get('/signin', 'Signin::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);


$routes->get('reg', 'RegulasiControllers::index');
$routes->get('reg/create', 'RegulasiControllers::create');
$routes->post('reg/store', 'RegulasiControllers::store');

$routes->get('reg/edit/(:num)', 'RegulasiControllers::edit/$1');
$routes->post('reg/update/(:num)', 'RegulasiControllers::update/$1');
$routes->get('reg/delete/(:num)', 'RegulasiControllers::delete/$1');
$routes->get('reg/download/(:num)', 'RegulasiControllers::download/$1');

// $routes->match(['get', 'post'], 'store', 'Signup::store');

// Rute Modul Statistik Baru
$routes->get('googleOrgChart', 'OrganisasiControllers::googleOrgChart');
$routes->get('balkanOrgChart', 'OrganisasiControllers::balkanOrgChart');

$routes->get('peserta', 'PesertaControllers::index');
$routes->get('peserta/create', 'PesertaControllers::create');
$routes->post('peserta/store', 'PesertaControllers::store');
$routes->get('peserta/edit/(:num)', 'PesertaControllers::edit/$1');
$routes->post('peserta/update/(:num)', 'PesertaControllers::updateData/$1');
$routes->get('peserta/delete/(:num)', 'PesertaControllers::delete/$1');
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

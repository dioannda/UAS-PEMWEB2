<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::prosesLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::prosesRegister');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/transaksi', 'Transaksi::index', ['filter' => 'auth']);
$routes->get('/transaksi/create', 'Transaksi::create', ['filter' => 'auth']);
$routes->post('/transaksi/store', 'Transaksi::store', ['filter' => 'auth']);
$routes->get('/transaksi/edit/(:num)', 'Transaksi::edit/$1', ['filter' => 'auth']);
$routes->post('/transaksi/update/(:num)', 'Transaksi::update/$1', ['filter' => 'auth']);
$routes->get('/transaksi/delete/(:num)', 'Transaksi::delete/$1', ['filter' => 'auth']);

$routes->get('/kategori', 'Kategori::index', ['filter' => 'auth']);
$routes->get('/kategori/create', 'Kategori::create', ['filter' => 'auth']);
$routes->post('/kategori/store', 'Kategori::store', ['filter' => 'auth']);
$routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1', ['filter' => 'auth']);
$routes->post('/kategori/update/(:num)', 'Kategori::update/$1', ['filter' => 'auth']);
$routes->get('/kategori/delete/(:num)', 'Kategori::delete/$1', ['filter' => 'auth']);


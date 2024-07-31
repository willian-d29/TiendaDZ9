<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/loginAuth', 'AuthController::loginAuth');
$routes->get('/register', 'AuthController::register');
$routes->post('/registerUser', 'AuthController::registerUser');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authGuard:admin']);
$routes->get('/user', 'UserDashboardController::index', ['filter' => 'authGuard:user']);

$routes->group('admin', ['filter' => 'authGuard:admin'], function($routes) {
    $routes->get('/', 'UserController::index');
    $routes->get('create', 'UserController::create');
    $routes->post('store', 'UserController::store');
    $routes->get('delete/(:num)', 'UserController::delete/$1');
});

$routes->group('products', ['filter' => 'authGuard:admin'], function($routes) {
    $routes->get('/', 'ProductController::index');
    $routes->get('create', 'ProductController::create');
    $routes->post('store', 'ProductController::store');
    $routes->get('edit/(:num)', 'ProductController::edit/$1');
    $routes->post('update/(:num)', 'ProductController::update/$1');
    $routes->get('delete/(:num)', 'ProductController::delete/$1');
});

$routes->group('clients', ['filter' => 'authGuard:admin'], function($routes) {
    $routes->get('/', 'ClientController::index');
    $routes->get('create', 'ClientController::create');
    $routes->post('store', 'ClientController::store');
    $routes->get('edit/(:num)', 'ClientController::edit/$1');
    $routes->post('update/(:num)', 'ClientController::update/$1');
    $routes->get('delete/(:num)', 'ClientController::delete/$1');
});

$routes->group('sales', ['filter' => 'authGuard:admin'], function($routes) {
    $routes->get('/', 'SaleController::index');
    $routes->get('create', 'SaleController::create');
    $routes->post('store', 'SaleController::store');
    $routes->get('delete/(:num)', 'SaleController::delete/$1');
});

// Rutas para los reportes
$routes->group('reports', ['filter' => 'authGuard:admin'], function($routes) {
    $routes->get('customers', 'ReportController::customers');
    $routes->get('products', 'ReportController::products');
    $routes->get('sales', 'ReportController::sales');
    $routes->get('export/(:any)/pdf', 'ReportController::exportPDF/$1');
    $routes->get('export/(:any)/xls', 'ReportController::exportXLS/$1');
    $routes->get('export/(:any)/html', 'ReportController::exportHTML/$1');
    $routes->get('dashboard', 'ReportController::index');
});

// Rutas para los clientes
$routes->group('client', ['filter' => 'authGuard:user'], function($routes) {
    $routes->get('/', 'ClientController::index');
    $routes->get('products', 'ClientController::products');
    $routes->get('view_product/(:num)', 'ClientController::viewProduct/$1');
    $routes->post('add_to_cart', 'ClientController::addToCart');
    $routes->post('remove_from_cart/(:num)', 'ClientController::removeFromCart/$1');
    $routes->get('cart', 'ClientController::cart');
    $routes->get('checkout', 'ClientController::checkout');
    $routes->post('complete_order', 'ClientController::completeOrder');
    $routes->get('order_history', 'ClientController::orderHistory');
});

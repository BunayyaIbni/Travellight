<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/signup/customer', 'SignUp::customer');
$routes->get('/signup/owner', 'SignUp::owner');
$routes->post('/signup/customer/save', 'SignUp::save_customer');
$routes->post('/signup/owner/save', 'SignUp::save_owner');

$routes->get('/login/customer', 'Login::customer');
$routes->post('/login/customer/customer_auth', 'Login::customer_auth');

$routes->get('/login/owner', 'Login::owner');
$routes->post('/login/owner/owner_auth', 'Login::owner_auth');

$routes->get('/login/admin', 'Login::admin');
$routes->post('/login/admin/admin_auth', 'Login::admin_auth');
$routes->get('/verifpembayaran', 'VerifPayment::index');
$routes->get('/verifpembayaran/(:num)', 'VerifPayment::verif/$1');
$routes->post('/verifpembayaran/save/(:num)', 'VerifPayment::save_verif/$1');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/customer/edit/(:num)', 'Profile::edit/$1');
$routes->post('customer/update/(:num)', 'Profile::update/$1');

$routes->get('/products', 'Product::index');
$routes->get('/products/add', 'Product::add');
$routes->post('/products/add/save', 'Product::save_product');
$routes->get('/products/edit/(:num)', 'Product::edit/$1');
$routes->post('products/update/(:num)', 'Product::update/$1');
$routes->get('products/delete/(:num)', 'Product::delete/$1');
$routes->get('/products/view/(:num)', 'Dashboard::view/$1');
$routes->get('/ownerorders', 'Product::get_orders');

$routes->get('/rooms/add/(:num)', 'Room::add/$1');
$routes->post('/rooms/add/save/(:num)', 'Room::save_room/$1');
$routes->get('/rooms/edit/(:num)', 'Room::edit/$1');
$routes->post('rooms/update/(:num)', 'Room::update_room/$1');
$routes->get('rooms/delete/(:num)', 'Room::delete/$1');

$routes->get('/book/(:num)', 'Booking::pesan/$1');
$routes->post('/book/save/(:num)', 'Booking::save_pesan/$1');

$routes->get('/orders', 'Payment::index');
$routes->get('/pay/(:num)', 'Payment::bayar/$1');
$routes->post('/pay/save/(:num)', 'Payment::save_bayar/$1');

$routes->get('/logout', 'Login::logout');

$routes->post('/dashboard/search', 'Searching::cari');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

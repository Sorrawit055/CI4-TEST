<?php

namespace Config;

$routes = Services::routes();


if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/signin', 'Login::index');
$routes->get('/index', 'Login::index');
$routes->post('/loginAuth', 'Login::loginAuth');
$routes->get('/logout', 'Login::logout');
$routes->get('/logout_message', 'Login::logout_message');

$routes->get('/home', 'User::index', ['filter' => 'authGuard']);
$routes->get('/workDetail/(:any)', 'User::workDetail/$1');

$routes->get('/dashboard', 'Admin::index', ['filter' => 'authGuard']);
$routes->post('/InsertWork', 'Admin::InsertWork', ['filter' => 'authGuard']);
$routes->get('/deleteWork/(:any)', 'Admin::deleteWork/$1');
$routes->get('/editWork/(:any)', 'Admin::editWork/$1');
$routes->post('/updateWork/(:any)', 'Admin::updateWork/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

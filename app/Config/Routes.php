<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login','User::login');
$routes->get('register', 'User::register');
$routes->post('guardar', 'User::guardar');
$routes->get('nuevaNoticia', 'NewsSource::NoticiaNueva');
$routes->get('crudNoticias', 'NewsSource::crudNoticias');
$routes->get('editarNoticia', 'NewsSource::editarNoticia');
$routes->get('crudCategorias', 'Admin::categorias');
$routes->post('acceso', 'User::acceso');
$routes->post('ingresarCategorias', 'Admin::ingresarCategorias');
$routes->get('admin/borrar/(:num)', 'Admin::borrar/$1');
$routes->get('admin/editar/(:num)', 'Admin::editar/$1');
$routes->post('actualizar', 'Admin::actualizar');
$routes->post('guardarNo', 'NewsSource::guardarNo');
$routes->post('actualiazNo', 'NewsSource::actualiazNo');
$routes->get('news/borrarNo/(:num)', 'NewsSource::borrarNo/$1');
$routes->get('news/editarNo/(:num)', 'NewsSource::editarNo/$1');
$routes->get('dashboard', 'NewsSource::dashboard');
$routes->get('dashboard', 'NewsSource::mostrar');
$routes->post('busqueda', 'NewsSource::busqueda');
$routes->post('filtrar', 'NewsSource::filtrar');
$routes->get('logout', 'User::logout');



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

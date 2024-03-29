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
$routes->get('about-us', 'Home::aboutUs');
$routes->get('contact-us', 'Home::contactUs');

$routes->post('api/form-submit', 'Home::contactFormSubmit');

if(FREE_EXCEL_PLAY){
    $routes->get('excel-play', 'ExcelPlay::freeExcelPlay');
}
if(PAID_EXCEL_PLAY){
    $routes->get('login', 'User::index');
    $routes->get('register', 'User::register');
    $routes->get('logout', 'User::logout');
    $routes->get('verification', 'User::verification');
    $routes->get('dashboard', 'User::dashboard');
    // $routes->get('dashboard/profile', 'User::profile');
    $routes->get('dashboard/excel-play', 'ExcelPlay::index');
    
    
    $routes->get('api/login', 'User::userLogin');
    $routes->post('api/regiser', 'User::userLogin');
    $routes->post('api/plan-register', 'User::register');
}
if(ADMIN_PANEL){
    $routes->get('admin', 'Admin::admin');
    $routes->get('api/search-name-email', 'Admin::searchNameEmail');

    $routes->get('api/fetch-add-edit-form', 'Admin::fetchAddEditForm');
    $routes->post('api/fetch-add-edit-form', 'Admin::fetchAddEditForm');
    
    $routes->post('api/add-edit-delete', 'Admin::addEditDeleteFormData');
}


// $routes->get('api/youtube/runyt', 'ExcelPlay::runyt');




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

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
$routes->setDefaultController('EmployeeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/','EmployeeController::index');
$routes->get('employee_view','EmployeeController::employee_view');
$routes->get('employee_list', 'EmployeeController::employee_list');
$routes->get('login','EmployeeController::login');
$routes->get('add_employee','EmployeeController::add_employee');
$routes->post('save_employee','EmployeeController::save_employee');
$routes->get('edit_employee', 'EmployeeController::edit_employee');
$routes->post('update_employee','EmployeeController::update_employee');
$routes->get('delete_employee', 'EmployeeController::delete_employee');
$routes->get('main_view', 'EmployeeController::main_view');
$routes->post('checkuserphone', 'EmployeeController::checkuserphone');
$routes->get('delete_employee/(:num)', 'EmployeeController::delete_employee/$1');
$routes->get('edit_employee/(:num)', 'EmployeeController::edit_employee/$1');
$routes->post('update_employee/(:num)', 'EmployeeController::update_employee/$1');
//department routes
$routes->get('department_view', 'DepartmentController::index');
$routes->get('add_department', 'DepartmentController::add_department');
$routes->get('edit_department/(:num)', 'DepartmentController::edit_department/$1');
$routes->post('save_department', 'DepartmentController::save_department');
$routes->post('update_department/(:num)', 'DepartmentController::update_department/$1');
$routes->get('delete_department/(:num)', 'DepartmentController::delete_department/$1');
$routes->post('checkdepart','DepartmentController::checkdepart');
//user'
$routes->post('checkuser', 'UserController::checkuser');
$routes->post('checkusername', 'UserController::checkusername');
$routes->post('checkuserlog', 'UserController::checkuserlog');
$routes->post('checkuserpass', 'UserController::checkuserpass');
$routes->post('save_register','UserController::save_register');
$routes->get('register', 'UserController::index');
$routes->post('check','UserController::check');
$routes->get('logout','UserController::logout');
$routes->get('employee_detail/(:num)', 'EmployeeController::employee_detail/$1');
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

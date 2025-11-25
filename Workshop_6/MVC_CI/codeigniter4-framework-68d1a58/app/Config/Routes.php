<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('ControllerWorkshop6');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// ---------- INICIO (Workshop 6) ----------
$routes->get('/', 'ControllerWorkshop6::index');      // ahora / es tu inicio
$routes->get('workshop6', 'ControllerWorkshop6::index'); // opcional, por si lo sigues usando

// ---------------------- CARRERAS ---------------------- //
$routes->get('register_careers', 'ControllerWorkshop6::register_careers');
$routes->post('save_career',     'ControllerWorkshop6::save_career');

$routes->get('edit_careers',                'ControllerWorkshop6::edit_careers');
$routes->get('edit_career/(:num)',          'ControllerWorkshop6::edit_career/$1');
$routes->post('update_career/(:num)',       'ControllerWorkshop6::update_career/$1');
$routes->get('delete_career/(:num)',        'ControllerWorkshop6::delete_career/$1');

// ---------------------- ESTUDIANTES ---------------------- //
$routes->get('register_students',           'ControllerWorkshop6::register_students');
$routes->post('save_student',               'ControllerWorkshop6::save_student');

$routes->get('edit_students',               'ControllerWorkshop6::edit_students');
$routes->get('edit_student/(:num)',         'ControllerWorkshop6::edit_student/$1');
$routes->post('update_student/(:num)',      'ControllerWorkshop6::update_student/$1');
$routes->get('delete_student/(:num)',       'ControllerWorkshop6::delete_student/$1');

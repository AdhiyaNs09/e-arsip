<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\DashboardController;
use App\Controllers\TeacherController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/dashboard', [DashboardController::class, 'index']);

//route for teacher
$routes->group('teacher', function ($routes) {
  $routes->get('/', 'TeacherController::index');
  $routes->get('create', 'TeacherController::create');
  $routes->post('store', 'TeacherController::store');
  $routes->get('edit/(:num)', 'TeacherController::edit/$1');
  $routes->put('update/(:num)', 'TeacherController::update/$1');
  $routes->delete('delete/(:num)', 'TeacherController::delete/$1');
});

//route for student
$routes->group('student', function ($routes) {
  $routes->get('/', 'StudentController::index');
  $routes->get('create', 'StudentController::create');
  $routes->post('store', 'StudentController::store');
  $routes->get('edit/(:num)', 'StudentController::edit/$1');
  $routes->put('update/(:num)', 'StudentController::update/$1');
  $routes->delete('delete/(:num)', 'StudentController::delete/$1');
});

//route for classroom
$routes->group('classroom', function ($routes) {
  $routes->get('/', 'ClassroomController::index');
  $routes->get('create', 'ClassroomController::create');
  $routes->post('store', 'ClassroomController::store');
  $routes->get('edit/(:segment)', 'ClassroomController::edit/$1');
  $routes->put('update/(:segment)', 'ClassroomController::update/$1');
  $routes->delete('delete/(:segment)', 'ClassroomController::delete/$1');
});

//route for study
$routes->group('study', function ($routes) {
  $routes->get('/', 'StudyController::index');
  $routes->get('create', 'StudyController::create');
  $routes->post('store', 'StudyController::store');
  $routes->get('edit/(:num)', 'StudyController::edit/$1');
  $routes->put('update/(:num)', 'StudyController::update/$1');
  $routes->delete('delete/(:num)', 'StudyController::delete/$1');
});

//route for schedule
$routes->group('schedule', function ($routes) {
  $routes->get('/', 'ScheduleController::index');
  $routes->get('create', 'ScheduleController::create');
  $routes->post('store', 'ScheduleController::store');
  $routes->get('edit/(:num)', 'ScheduleController::edit/$1');
  $routes->put('update/(:num)', 'ScheduleController::update/$1');
  $routes->delete('delete/(:num)', 'ScheduleController::delete/$1');
});
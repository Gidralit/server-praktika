<?php

use Controllers\AdminController;
use Controllers\PatientController;
use Src\Route;
use Controllers\AuthController;
use Controllers\EmployeeController;
use Controllers\DoctorsController;
use Controllers\AppointmentsController;

#Route::add('GET', '/hello', [Controllers\Site::class, 'hello'])
#    ->middleware('auth');
#Route::add(['GET', 'POST'], '/signup', [Controllers\Site::class, 'signup']);
#Route::add(['GET', 'POST'], '/login', [Controllers\Site::class, 'login']);
#Route::add('GET', '/logout', [Controllers\Site::class, 'logout']);

Route::add(['GET', 'POST'], '/login', [AuthController::class, 'login']);
Route::add(['GET'], '/logout', [AuthController::class, 'logout']);
Route::add(['GET'], '/main', [AdminController::class, 'index'])->middleware('admin');
Route::add(['GET', 'POST'], '/employee/add', [AdminController::class, 'addEmployee'])->middleware('admin');

Route::add(['GET'], '/menu', [EmployeeController::class, 'index'])->middleware('auth');
Route::add(['GET'], '/doctors', [EmployeeController::class, 'doctors'])->middleware('auth');
Route::add(['GET', 'POST'], '/doctors/add', [DoctorsController::class, 'add'])->middleware('auth');
Route::add(['GET'], '/doctors/{id}/show/patients', [DoctorsController::class, 'showPatients'])->middleware('auth');
Route::add(['GET'], '/appointments', [EmployeeController::class, 'appointments'])->middleware('auth');
Route::add(['GET', 'POST'], '/appointments/add', [AppointmentsController::class, 'add'])->middleware('auth');
Route::add(['GET'], '/appointments/{id}/delete', [AppointmentsController::class, 'delete'])->middleware('auth');
Route::add(['GET'], '/patients', [EmployeeController::class, 'patients'])->middleware('auth');
Route::add(['GET', 'POST'], '/patients/add', [PatientController::class, 'add'])->middleware('auth');
Route::add(['GET'], '/patients/{id}/search/appointments', [PatientController::class, 'searchAppointments'])->middleware('auth');
Route::add(['GET'], '/patients/{id}/search/doctors', [PatientController::class, 'searchDoctors'])->middleware('auth');

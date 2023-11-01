<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', [EmployeeController::class, 'login']);
Route::get('/login', [EmployeeController::class, 'login'])->name('login');
Route::post('/login', [EmployeeController::class, 'submitLogin']);

Route::get('/form', [EmployeeController::class, 'getForm'])->name('form');
Route::post('/form', [EmployeeController::class, 'submitForm']);

Route::get('/request-list', [EmployeeController::class, 'getList'])->name('request_list');

Route::get('/manager-request-list', [EmployeeController::class, 'getManagerList'])->name('manager_request_list');
Route::post('/manager-request-list', [EmployeeController::class, 'postManagerForm']);



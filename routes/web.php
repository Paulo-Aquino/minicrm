<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', 'App\Http\Controllers\UserController');
Route::get('user/ajax/serverside', [App\Http\Controllers\UserController::class, 'indexServerSide'])->name('user.serverside');
Route::resource('company', 'App\Http\Controllers\CompanyController');
Route::get('company/ajax/serverside', [App\Http\Controllers\CompanyController::class, 'indexServerSide'])->name('company.serverside');
Route::resource('collaborator', 'App\Http\Controllers\CollaboratorController');
Route::get('collaborator/ajax/serverside', [App\Http\Controllers\CollaboratorController::class, 'indexServerSide'])->name('collaborator.serverside');

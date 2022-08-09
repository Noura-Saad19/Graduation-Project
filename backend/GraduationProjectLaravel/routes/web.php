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



Route::get('/', function () {
    return view('welcome');
});

//Route::post('/login',[App\Http\Controllers\Users\UserController::class,'login']); // lOGIN url
Route::post('/login',[App\Http\Controllers\Users\UserController::class,'login']); // lOGIN url
//Route::get('/getCourse',[App\Http\Controllers\Users\UserController::class,'getCourse']); // lOGIN url

//Route::get('/showProfile',[App\Http\Controllers\profiles\profileController::class,'showProfile']);
Route::get('/Reports/QaReport',[\App\Http\Controllers\Report\Reports::class,'QaReport']);
Route::get('/Reports/DeanReport',[\App\Http\Controllers\Report\Reports::class,'DeanReport']);
Route::get('/Dashboard/QADashboard',[\App\Http\Controllers\Dashboards\DashboardController::class,'studentPerformance']);
//Route::get('/showProfile',[\App\Http\Controllers\Users\UserController::class,'showProfile']);
Route::get('/Dashboard/doctorPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'doctorPerformance']);


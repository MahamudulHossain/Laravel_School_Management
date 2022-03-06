<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassNameController;

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
//Admin
Route::get('/admin',[AdminController::class,'admin_login_form']);
Route::post('/admin_login',[AdminController::class,'admin_login']);
Route::get('/admin/logout',[AdminController::class,'logout']);
//Admin Middleware
Route::group(['middleware'=>'admin_auth'],function () {
	Route::get('/dashboard',[DashboardController::class,'home']);
	//Class
	Route::get('/class_list',[ClassNameController::class,'list']);
	Route::get('/class_add_form',[ClassNameController::class,'show_form']);
	Route::post('/add_class',[ClassNameController::class,'add_form']);
	Route::get('/class_delete/{id}',[ClassNameController::class,'delete']);
	Route::get('/class_edit/{id}',[ClassNameController::class,'edit']);
	Route::post('/update_class',[ClassNameController::class,'update']);
});
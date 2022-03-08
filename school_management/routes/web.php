<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassNameController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeAmountController;

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
	//Year
	Route::get('/year_list',[YearController::class,'list']);
	Route::get('/year_add_form',[YearController::class,'show_form']);
	Route::post('/add_year',[YearController::class,'add_form']);
	Route::get('/year_edit/{id}',[YearController::class,'edit']);
	Route::post('/update_year',[YearController::class,'update']);
	//Group
	Route::get('/group_list',[GroupController::class,'list']);
	Route::get('/group_add_form',[GroupController::class,'show_form']);
	Route::post('/add_group',[GroupController::class,'add_form']);
	Route::get('/group_delete/{id}',[GroupController::class,'delete']);
	Route::get('/group_edit/{id}',[GroupController::class,'edit']);
	Route::post('/update_group',[GroupController::class,'update']);
	//Shift
	Route::get('/shift_list',[ShiftController::class,'list']);
	Route::get('/shift_add_form',[ShiftController::class,'show_form']);
	Route::post('/add_shift',[ShiftController::class,'add_form']);
	Route::get('/shift_delete/{id}',[ShiftController::class,'delete']);
	Route::get('/shift_edit/{id}',[ShiftController::class,'edit']);
	Route::post('/update_shift',[ShiftController::class,'update']);
	//Fee
	Route::get('/fee_list',[FeeController::class,'list']);
	Route::get('/fee_add_form',[FeeController::class,'show_form']);
	Route::post('/add_fee',[FeeController::class,'add_form']);
	Route::get('/fee_delete/{id}',[FeeController::class,'delete']);
	Route::get('/fee_edit/{id}',[FeeController::class,'edit']);
	Route::post('/update_fee',[FeeController::class,'update']);
	//Fee Amount
	Route::get('/fee_amount_list',[FeeAmountController::class,'list']);
	Route::get('/fee_amount_add_form',[FeeAmountController::class,'show_form']);
	Route::get('/get_class_name',[FeeAmountController::class,'class_name_ajax']);
	Route::post('/add_fee_amount',[FeeAmountController::class,'add_form']);
	Route::get('/fee_amount_edit/{fee_id}',[FeeAmountController::class,'edit']);
	Route::post('/update_fee_amount/{fee_id}',[FeeAmountController::class,'update']);
});
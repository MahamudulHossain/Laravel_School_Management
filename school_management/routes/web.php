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
use App\Http\Controllers\ExamtypeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AssignSubjectController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\student\StudentRegController;

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
	Route::get('/fee_amount_show/{fee_id}',[FeeAmountController::class,'show']);
	Route::get('/fee_amount_add_form',[FeeAmountController::class,'show_form']);
	Route::get('/get_class_name',[FeeAmountController::class,'class_name_ajax']);
	Route::post('/add_fee_amount',[FeeAmountController::class,'add_form']);
	Route::get('/fee_amount_edit/{fee_id}',[FeeAmountController::class,'edit']);
	Route::post('/update_fee_amount/{fee_id}',[FeeAmountController::class,'update']);
	//Exam Type
	Route::get('/exam_type_list',[ExamtypeController::class,'list']);
	Route::get('/exam_type_add_form',[ExamtypeController::class,'show_form']);
	Route::post('/add_exam_type',[ExamtypeController::class,'add_form']);
	Route::get('/exam_type_edit/{id}',[ExamtypeController::class,'edit']);
	Route::post('/update_exam_type',[ExamtypeController::class,'update']);
	//Subject
	Route::get('/subject_list',[SubjectController::class,'list']);
	Route::get('/subject_add_form',[SubjectController::class,'show_form']);
	Route::post('/add_subject',[SubjectController::class,'add_form']);
	Route::get('/subject_edit/{id}',[SubjectController::class,'edit']);
	Route::post('/update_subject',[SubjectController::class,'update']);
	//Assign Subject
	Route::get('/assign_subject_list',[AssignSubjectController::class,'list']);
	Route::get('/assign_subject_show/{class_id}/{grp_id}',[AssignSubjectController::class,'show']);
	Route::get('/assign_subject_add_form',[AssignSubjectController::class,'show_form']);
	Route::get('/get_subject',[AssignSubjectController::class,'subject_ajax']);
	Route::post('/add_assign_subject',[AssignSubjectController::class,'add_form']);
	Route::get('/assign_subject_edit/{class_id}/{grp_id}',[AssignSubjectController::class,'edit']);
	Route::post('/update_assign_subject/{class_id}/{grp_id}',[AssignSubjectController::class,'update']);
	//Designation
	Route::get('/designation_list',[DesignationController::class,'list']);
	Route::get('/designation_add_form',[DesignationController::class,'show_form']);
	Route::post('/add_designation',[DesignationController::class,'add_form']);
	Route::get('/designation_edit/{id}',[DesignationController::class,'edit']);
	Route::post('/update_designation',[DesignationController::class,'update']);
	//Manage User
	Route::get('/users_list',[UsersController::class,'list']);
	Route::get('/users_add_form',[UsersController::class,'show_form']);
	Route::post('/add_users',[UsersController::class,'add_form']);
	Route::get('/users_edit/{id}',[UsersController::class,'edit']);
	Route::post('/update_users',[UsersController::class,'update']);
	Route::get('/users_delete/{id}',[UsersController::class,'delete']);
	//Student Register
	Route::get('/students_list',[StudentRegController::class,'list']);
	Route::get('/student_reg_form',[StudentRegController::class,'show_form']);
	Route::post('/register_student',[UsersController::class,'add_form']);
	Route::get('/student_edit/{id}',[UsersController::class,'edit']);
	Route::post('/update_student',[UsersController::class,'update']);
	Route::get('/student_delete/{id}',[UsersController::class,'delete']);
});
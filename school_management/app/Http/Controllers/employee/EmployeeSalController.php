<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
use App\Models\EmployeeSalaryLog;
use DB;
class EmployeeSalController extends Controller
{
    public function view(){
    	$data = MultiUser::where('usertype','employee')->get();
    	return view('admin.users.employees.salary.employees_list',compact('data'));
    }
    public function show_form($id){
    	$data = MultiUser::find($id);
    	return view('admin.users.employees.salary.increment_form',compact('data'));
    }
    public function store(Request $req, $id){
    	$prev = MultiUser::where('usertype','employee')->get();
    	$previous_salary = $prev[0]->salary;
    	$new_sal = $req->increment_amount + $previous_salary;
    	$mulUser = MultiUser::find($id);
    	$mulUser->salary = $new_sal;
    	$mulUser->save();
    	$empLog = new EmployeeSalaryLog;
    	$empLog->employee_id = $id;
    	$empLog->prevoius_salary = $previous_salary;
    	$empLog->present_salary = $new_sal;
    	$empLog->increment_salary = $req->increment_amount;
    	$empLog->effected_date = date('Y-m-d',strtotime($req->effected_date));
    	$empLog->save();
    	$req->session()->flash('message','Salary Incremented Successfully');
        return redirect('/employee_salary_management');
    }
    public function details($id){
    	$data['allData'] =  MultiUser::find($id);
    	$data['salaryData'] =  EmployeeSalaryLog::where('employee_id',$id)->get();
    	return view('admin.users.employees.salary.employee_salary_details',$data);
    }
}

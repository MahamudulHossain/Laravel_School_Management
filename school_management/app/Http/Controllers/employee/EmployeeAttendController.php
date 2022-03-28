<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
use App\Models\EmployeeAttendance;
use DB;
class EmployeeAttendController extends Controller
{
    public function view(){
    	$data['allData'] = EmployeeAttendance::all();
    	return view('admin.users.employees.attendance.employees_attend_list',$data);
    }
    public function create_form(){
    	$data['emp_name'] = MultiUser::where('usertype','employee')->get();
    	return view('admin.users.employees.attendance.employees_attend_form',$data);
    }
    public function store(Request $req){
    	dd($req->all());
    }
}

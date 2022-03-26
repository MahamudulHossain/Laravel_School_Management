<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
class EmployeeLeaveController extends Controller
{
    public function view(){
    	$data['allData'] = EmployeeLeave::get();
    	return view('admin.users.employees.leave.employees_leave_list',$data);
    }
    public function create_form(){
    	$data['emp_name'] = MultiUser::where('usertype','employee')->get();
    	$data['leave_purpose'] = LeavePurpose::get();
    	return view('admin.users.employees.leave.employees_leave_form',$data);
    }
}

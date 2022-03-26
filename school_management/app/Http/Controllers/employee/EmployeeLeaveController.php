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
    public function store(Request $req){
    	if($req->leave_purpose_id == '0' && $req->new_purpose == null){
    		$req->session()->flash('message','Please insert your leave purpose');
        	return redirect()->back();
    	}else{
    		dd("NINTA");
    	}
    }
}

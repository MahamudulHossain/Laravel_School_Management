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
				$empLeave = new EmployeeLeave;
				$empLeave->employee_id = $req->employee_id; 
    		if($req->new_purpose != null){
    			$leavePur = new LeavePurpose;
    			$leavePur->name = $req->new_purpose;
    			$leavePur->save();
    			$empLeave->leave_purpose_id = $leavePur->id;
    		}else{
    			$empLeave->leave_purpose_id = $req->leave_purpose_id; 
    		}
				$empLeave->start_date = $req->start_date; 
				$empLeave->end_date = $req->end_date; 
				$empLeave->save(); 
		$req->session()->flash('message','Employee Leave Added Successfully');
    	return redirect('/employee_leave_management');	
    	}
    }
    public function edit($id){
    	$data['allData'] = EmployeeLeave::find($id);
    	$data['emp_name'] = MultiUser::where('usertype','employee')->get();
    	$data['leave_purpose'] = LeavePurpose::get();
    	return view('admin.users.employees.leave.employees_leave_edit',$data);
    }
    public function update(Request $req,$id){
    	if($req->leave_purpose_id == '0' && $req->new_purpose == null){
    		$req->session()->flash('message','Please insert your leave purpose');
        	return redirect()->back();
    	}else{
				$empLeave =EmployeeLeave::find($id);
    		if($req->new_purpose != null){
    			$leavePur = new LeavePurpose;
    			$leavePur->name = $req->new_purpose;
    			$leavePur->save();
    			$empLeave->leave_purpose_id = $leavePur->id;
    		}else{
    			$empLeave->leave_purpose_id = $req->leave_purpose_id; 
    		}
				$empLeave->start_date = $req->start_date; 
				$empLeave->end_date = $req->end_date; 
				$empLeave->save(); 
		$req->session()->flash('message','Employee Leave Updated Successfully');
    	return redirect('/employee_leave_management');	
    	}
    }
}

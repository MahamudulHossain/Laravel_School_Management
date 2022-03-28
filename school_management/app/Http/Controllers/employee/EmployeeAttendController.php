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
    	$count = count($req->employee_id);
    	for($i=0;$i<$count;$i++){
    		$attend_status = 'attend_status'.$i;
    		$attend = new EmployeeAttendance;
    		$attend->employee_id = $req->employee_id[$i];
    		$attend->date = $req->date;
    		$attend->attend_status = $req->$attend_status;
    		$attend->save();
    	}
    	$req->session()->flash('message','Employee Attendance Added Successfully');
    	return redirect('/employee_attend_management');	
    }
}

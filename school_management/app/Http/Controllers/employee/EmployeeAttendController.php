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
    	$data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->get();
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
    public function edit($date){
        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['emp_name'] = MultiUser::where('usertype','employee')->get();
        return view('admin.users.employees.attendance.employees_attend_edit',$data);
    }
    public function update(Request $req,$date){
        $delData = EmployeeAttendance::where('date',$date)->delete();
        $count = count($req->employee_id);
        for($i=0;$i<$count;$i++){
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance;
            $attend->employee_id = $req->employee_id[$i];
            $attend->date = $req->date;
            $attend->attend_status = $req->$attend_status;
            $attend->save();
        }
        $req->session()->flash('message','Employee Attendance Updated Successfully');
        return redirect('/employee_attend_management'); 
    }
}

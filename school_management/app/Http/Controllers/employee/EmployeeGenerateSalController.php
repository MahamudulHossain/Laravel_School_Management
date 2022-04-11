<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
use App\Models\EmployeeAttendance;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
class EmployeeGenerateSalController extends Controller
{
    public function view(){
    	return view('admin.users.employees.generate_salary.salary-view');
    }
    public function get_sal(Request $req){
    	$month = $req->month;
    	$res['userData'] = MultiUser::where('usertype','employee')->get(['id','salary']);
    	foreach($res['userData'] as $key=>$val){
    		$absentCount = EmployeeAttendance::where(['employee_id'=>$val->id,'attend_status'=>'absent'])->count();
    		$dailySal = ceil($val->salary/30); 
    		$res['finalSal'] = $val->salary - ($dailySal * $absentCount) . '<br>';
    	}
    	return response()->json(['data'=>$res]);		   
    }
}

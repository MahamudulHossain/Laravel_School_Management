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
        $format = strtotime($req->month);
        $month = date('m', $format);
    	$year = date('Y', $format);
    	$res = MultiUser::where('usertype','employee')->get(['id','salary','name','id_no']);
    	foreach($res as $key=>$val){
    		$absentCount = EmployeeAttendance::where(['employee_id'=>$val->id,'attend_status'=>'absent'])->whereMonth('date', $month)->whereYear('date', $year)->count();
    		$dailySal = ceil($val->salary/30); 
    		$result[] = $val->salary - ($dailySal * $absentCount);
    	}
    	return response()->json(['data'=>$res,'sal'=>$result]);		   
    }

    public function generatePDF(Request $req,$id,$date){
        $userData = MultiUser::where('id',$id)->get(['salary','name','id_no']);
        $format = strtotime($date);
        $month = date('m', $format);
        $monthInWord = date('F', $format);
        $year = date('Y', $format);
        $absentCount = EmployeeAttendance::where(['employee_id'=>$id,'attend_status'=>'absent'])->whereMonth('date', $month)->whereYear('date', $year)->count();
        $dailySal = ceil($userData['0']->salary/30); 
        $finalSal = $userData['0']->salary - ($dailySal * $absentCount);
        $pdf = PDF::loadView('admin.users.employees.generate_salary.salary_paySlip', ['userInfo'=>$userData,'month'=>$monthInWord,'year'=>$year,'absent'=>$absentCount,'sal'=>$finalSal]);
        return $pdf->stream('paySlip.pdf');
    }
}

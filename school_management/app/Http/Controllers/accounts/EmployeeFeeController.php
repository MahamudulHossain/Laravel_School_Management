<?php

namespace App\Http\Controllers\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
use App\Models\AccountEmployeeFee;
use App\Models\EmployeeAttendance;

class EmployeeFeeController extends Controller
{
    public function view(){
    	$data['allData'] = AccountEmployeeFee::all();
    	return view('admin.account.employee.show_list',$data);
    }
    public function pay_form(){
    	return view('admin.account.employee.pay_form');
    }
     public function get_employee_fee_info(Request $req){
        $format = strtotime($req->date);
        $month = date('m', $format);
    	$year = date('Y', $format);
    	$res = MultiUser::where('usertype','employee')->get(['id','salary','name','id_no']);
    	foreach($res as $key=>$val){
    		$absentCount = EmployeeAttendance::where(['employee_id'=>$val->id,'attend_status'=>'absent'])->whereMonth('date', $month)->whereYear('date', $year)->count();
    		$dailySal = ceil($val->salary/30); 
    		$result[] = $val->salary - ($dailySal * $absentCount);
    		$account = AccountEmployeeFee::whereMonth('date', $month)->whereYear('date', $year)->count();
            if($account){
            	$paid[] = 'checked';
            }else{
            	$paid[] = '';
            }
    	}
    	return response()->json(['data'=>$res,'sal'=>$result,'status'=>$paid]);	
    }
}

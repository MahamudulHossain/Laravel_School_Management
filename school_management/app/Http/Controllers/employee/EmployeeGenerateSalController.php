<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
class EmployeeGenerateSalController extends Controller
{
    public function view(){
    	return view('admin.users.employees.generate_salary.salary-view');
    }
    public function get_sal(Request $req){
    	$month = $req->month;
    	$allData = DB::table('employee_salary_logs')
    			   ->join('employee_attendances','employee_attendances.employee_id','=','employee_salary_logs.employee_id')
    			   ->where('employee_attendances.date','LIKE', '%' . $month . '%')
    			   ->select('employee_salary_logs.employee_id as Eid','employee_salary_logs.present_salary')
    			   ->get();
    	return response()->json(['data'=>$allData]);		   
    }
}

<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\ClassName;
use App\Models\AssignStudent;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
class StuMonthFeeController extends Controller
{
    public function show(){
    	$data['year']=Year::all();
    	$data['className']=ClassName::all();
    	return view('admin.users.students.MonthlyFee_form',$data);
    }
    public function fetch(Request $req){
    	$allData = DB::table('assign_students')
    			   ->join('multi_users','multi_users.id','=','assign_students.student_id')	
    			   ->join('discount_students','discount_students.assign_student_id','=','assign_students.student_id')	
    			   ->join('fee_amounts','fee_amounts.class_name_id','=','assign_students.class_id')	
    			   ->where(['assign_students.class_id'=>$req->cls_id,'assign_students.year_id'=>$req->year_id,'fee_amounts.fee_id'=>'2','discount_students.fee_category_id'=>'1'])
    			   ->select('assign_students.*','multi_users.name as stu_nm','multi_users.id_no as stu_id','fee_amounts.amount','discount_students.discount')
                   ->get();
    	return response()->json(['data'=>$allData]); 
    }
    public function pdf(Request $req,$cls_id,$yr_id,$mn,$roll_no){
    	$data['allData'] = DB::table('assign_students')
    			   ->join('multi_users','multi_users.id','=','assign_students.student_id')	
    			   ->join('discount_students','discount_students.assign_student_id','=','assign_students.student_id')	
    			   ->join('fee_amounts','fee_amounts.class_name_id','=','assign_students.class_id')	
    			   ->where(['assign_students.class_id'=>$cls_id,'assign_students.year_id'=>$yr_id,'assign_students.roll'=>$roll_no,'fee_amounts.fee_id'=>'1','discount_students.fee_category_id'=>'1'])
    			   ->select('assign_students.*','multi_users.name as stu_nm','multi_users.id_no as stu_id','fee_amounts.amount','discount_students.discount')
                   ->get();
        $data['month'] = $mn;          
    	$pdf = PDF::loadView('admin.users.students.student_monthSlip_pdf', $data);
        return $pdf->stream('monthSlip.pdf');
    }
}

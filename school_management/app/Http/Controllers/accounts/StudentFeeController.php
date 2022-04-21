<?php

namespace App\Http\Controllers\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountStudentFee;
use App\Models\Year;
use App\Models\ClassName;
use App\Models\Fee;
use App\Models\FeeAmount;
use App\Models\AssignStudent;
use App\Models\MultiUser;
use App\Models\DiscountStudent;

class StudentFeeController extends Controller
{
    public function view(){
    	$data['allData'] = AccountStudentFee::all();
    	return view('admin.account.student.show_list',$data);
    }
    public function pay_form(){
    	$data['year'] = Year::all();
    	$data['className'] = ClassName::all();
    	$data['feeCat'] = Fee::all();
    	return view('admin.account.student.pay_form',$data);
    }
    public function get_student_fee_info(Request $req){
    	$yr = $req->yr_id;
        $cls = $req->cls_id;
        $stu = AssignStudent::where(['year_id'=>$yr,'class_id'=>$cls])->get();
        foreach ($stu as $key => $st) {
            $stuInfo[] = MultiUser::where('id',$st->student_id)->get();
            $stuDis[] = DiscountStudent::where(['assign_student_id'=>$st->student_id,'fee_category_id'=>$req->fee_category_id])->get();
            $account = AccountStudentFee::where(['year_id'=>$yr,'class_id'=>$cls,'student_id'=>$st->student_id,'fee_category_id'=>$req->fee_category_id])->count();
            if($account){
            	$paid[] = 'checked';
            }else{
            	$paid[] = '';
            }
        }
        $feeAmount = FeeAmount::where(['class_name_id'=>$cls,'fee_id'=>$req->fee_category_id])->get();
        return response()->json(['stuInfo'=>$stuInfo,'stuDis'=>$stuDis,'feeAmount'=>$feeAmount,'status'=>$paid]);
    }
}

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
    public function pay(Request $req){
        $count = count($req->student_id);
        for($i=0; $i<$count; $i++){
            if($req->status.$i){
                $chk = AccountStudentFee::where(['year_id'=>$req->year_id,'class_id'=>$req->class_id,'student_id'=>$req->student_id[$i],'fee_category_id'=>$req->fee_category_id])->count();
                if(! $chk){
                    $store = new AccountStudentFee;
                    $store->year_id = $req->year_id;
                    $store->class_id = $req->class_id;
                    $store->student_id = $req->student_id[$i];
                    $store->fee_category_id = $req->fee_category_id;
                    $store->date = $req->date;
                    $store->amount = $req->amount;
                    $store->save();
                }
            }
        }
    }
}

<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\ClassName;
use App\Models\AssignStudent;
use DB;
class StuMngController extends Controller
{
    public function assign_roll_form(){
    	$data['year']=Year::all();
    	$data['className']=ClassName::all();
    	return view('admin.users.students.assign_roll',$data);
    }
    public function stu_info(Request $req){
    	$allData = DB::table('assign_students')
    			   ->join('multi_users','multi_users.id','=','assign_students.student_id')	
    			   ->where(['assign_students.class_id'=>$req->cls_id,'assign_students.year_id'=>$req->year_id])
    			   ->select('assign_students.*','multi_users.name as stu_nm','multi_users.fname as stu_fname','multi_users.id_no as stu_id')
                   ->get();
    	return response()->json(['data'=>$allData]); 
    }
}

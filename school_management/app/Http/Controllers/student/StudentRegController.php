<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
use App\Models\Group;
use App\Models\Year;
use App\Models\Shift;
use App\Models\ClassName;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
class StudentRegController extends Controller
{
    public function list(){
    	$data = MultiUser::with('get_student')->where('usertype','student')->get();
    	return view('admin.users.students.students_list',compact('data'));
    }
    public function show_form(){
    	$data['className'] = ClassName::all();
    	$data['group'] = Group::all();
    	$data['year'] = Year::all();
    	$data['shift'] = Shift::all();
    	return view('admin.users.students.register_form',$data);
    }
    public function add_form(Request $req){
    	DB::transaction(function() use($req){
    		$stuChk = MultiUser::where('usertype','student')->first('id');
    		$yr = Year::where('id',$req->year_id)->first('year');
    		if($stuChk == null){
    			$id_no = $yr->year.'1';
    		}else{
    			$id_chk = MultiUser::where('usertype','student')->orderBy('id','desc')->first('id_no');
    			$id_no = $id_chk->id_no + 1;
    		}
            $code = rand(111111,999999);
    		$multiUser = new MultiUser;
    		$multiUser->usertype = 'student'; 
    		$multiUser->name = $req->name; 
    		$multiUser->password = md5($code); 
    		$multiUser->mobile = $req->mobile; 
    		$multiUser->address = $req->address; 
    		$multiUser->gender = $req->gender; 
    		$multiUser->fname = $req->fname;  
    		$multiUser->mname = $req->mname;  
    		$multiUser->religion = $req->religion;  
    		$multiUser->id_no = $id_no;  
    		$multiUser->code = $code;  
    		$multiUser->dob = date('Y-m-d',strtotime($req->dob));  
    		if($req->hasfile('image')){
    		$file = $req->file('image');
    		$ext = $file->getClientOriginalExtension();
    		$filename = time(). '.' .$ext;
    		$file->move('uploads/images',$filename);
    		$multiUser->image= $filename;
    		}
    		$multiUser->save();
    		$aStu = new AssignStudent;
    		$aStu->student_id = $multiUser->id;
    		$aStu->class_id = $req->class_id;
    		$aStu->year_id = $req->year_id;
    		$aStu->group_id = $req->group_id;
    		$aStu->shift_id = $req->shift_id;
    		$aStu->save();
    		$disStu = new DiscountStudent;
    		$disStu->assign_student_id = $aStu->id;
    		$disStu->fee_category_id = '1';
    		$disStu->discount = $req->discount;
    		$disStu->save();
    	});
     	$req->session()->flash('message','Registration Successfull');
        return redirect('/students_list');
    }
    public function edit($id,$yearID){
        $result['editData'] = DB::table('multi_users')
                            ->join('assign_students','assign_students.student_id','=','multi_users.id')  
                            ->join('discount_students','discount_students.assign_student_id','=','assign_students.id')
                            ->where(['multi_users.id'=>$id,'assign_students.year_id'=>$yearID])
                            ->select('multi_users.*','assign_students.*','discount_students.discount','discount_students.assign_student_id')
                            ->get();             
        $result['className'] = ClassName::all();
        $result['group'] = Group::all();
        $result['year'] = Year::all();
        $result['shift'] = Shift::all();
        return view('admin.users.students.student_edit',$result);
    }
    public function update(Request $req){
        DB::transaction(function() use($req){
            $multiUser = MultiUser::find($req->stu_id);
            $multiUser->name = $req->name;
            $multiUser->mobile = $req->mobile; 
            $multiUser->address = $req->address; 
            $multiUser->gender = $req->gender; 
            $multiUser->fname = $req->fname;  
            $multiUser->mname = $req->mname;  
            $multiUser->religion = $req->religion; 
            $multiUser->dob = date('Y-m-d',strtotime($req->dob));  
            if($req->hasfile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('uploads/images',$filename);
            $multiUser->image= $filename;
            }
            $multiUser->save();
            $aStu =AssignStudent::where(['student_id'=>$req->stu_id,'year_id'=>$req->yr_id])->first();
            $aStu->class_id = $req->class_id;
            $aStu->year_id = $req->year_id;
            $aStu->group_id = $req->group_id;
            $aStu->shift_id = $req->shift_id;
            $aStu->save();
            $disStu = DiscountStudent::where('assign_student_id',$req->assign_stu_id)->first();
            $disStu->discount = $req->discount;
            $disStu->save();
        });
        $req->session()->flash('message','Student Info Updated Successfull');
        return redirect('/students_list');
    }
    public function promotion_form($id,$yearID){
        $result['editData'] = DB::table('multi_users')
                            ->join('assign_students','assign_students.student_id','=','multi_users.id')  
                            ->join('discount_students','discount_students.assign_student_id','=','assign_students.id')
                            ->where(['multi_users.id'=>$id,'assign_students.year_id'=>$yearID])
                            ->select('multi_users.*','assign_students.*','discount_students.discount','discount_students.assign_student_id')
                            ->get();             
        $result['className'] = ClassName::all();
        $result['group'] = Group::all();
        $result['year'] = Year::all();
        $result['shift'] = Shift::all();
        return view('admin.users.students.student_promotion',$result);
    }
    public function promote(Request $req){
        DB::transaction(function() use($req){
            $aStu = new AssignStudent;
            $aStu->student_id = $req->stu_id;
            $aStu->class_id = $req->class_id;
            $aStu->year_id = $req->year_id;
            $aStu->group_id = $req->group_id;
            $aStu->shift_id = $req->shift_id;
            $aStu->save();
            $disStu = new DiscountStudent;
            $disStu->assign_student_id = $aStu->id;
            $disStu->fee_category_id = '1';
            $disStu->discount = $req->discount;
            $disStu->save();
        });
        $req->session()->flash('message','Student Promoted Successfully');
        return redirect('/students_list');
    }
    public function generatePDF($id,$yearID){
        $result['editData'] = DB::table('multi_users')
                            ->join('assign_students','assign_students.student_id','=','multi_users.id')  
                            ->join('discount_students','discount_students.assign_student_id','=','assign_students.id')
                            ->where(['multi_users.id'=>$id,'assign_students.year_id'=>$yearID])
                            ->select('multi_users.*','assign_students.*','discount_students.discount','discount_students.assign_student_id')
                            ->get();
        $result['className'] = ClassName::all();
        $result['group'] = Group::all();
        $result['year'] = Year::all();
        $result['shift'] = Shift::all();                    
        $pdf = PDF::loadView('admin.users.students.student_detail_pdf', $result);
        return $pdf->stream('invoice.pdf');
    }
}

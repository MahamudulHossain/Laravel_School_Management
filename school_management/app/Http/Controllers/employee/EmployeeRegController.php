<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
class EmployeeRegController extends Controller
{
    public function list(){
    	$data = MultiUser::where('usertype','employee')->get();
    	return view('admin.users.employees.employees_list',compact('data'));
    }
    public function show_form(){
    	$data['designation'] = Designation::all();
    	return view('admin.users.employees.register_form',$data);
    }
    public function add_form(Request $req){
    	DB::transaction(function() use($req){
    		$empChk = MultiUser::where('usertype','employee')->first('id');
    		$yr = date('Ym',strtotime($req->join_date));
    		if($empChk == null){
    			$id_no = $yr.'1';
    		}else{
    			$id_chk = MultiUser::where('usertype','employee')->orderBy('id','desc')->first('id_no');
    			$id_no = $id_chk->id_no + 1;
    		}
    		$code = rand(111111,999999);
    		$multiUser = new MultiUser;
    		$multiUser->usertype = 'employee'; 
    		$multiUser->name = $req->name; 
    		$multiUser->code = $code;
    		$multiUser->password = md5($code); 
    		$multiUser->mobile = $req->mobile; 
    		$multiUser->address = $req->address; 
    		$multiUser->gender = $req->gender; 
    		$multiUser->fname = $req->fname;  
    		$multiUser->mname = $req->mname;  
    		$multiUser->religion = $req->religion;  
    		$multiUser->id_no = $id_no;  
    		$multiUser->salary = $req->salary;  
    		$multiUser->join_date = date('Y-m-d',strtotime($req->join_date));  
    		$multiUser->designation_id = $req->designation_id;    
    		$multiUser->dob = date('Y-m-d',strtotime($req->dob));  
    		if($req->hasfile('image')){
    		$file = $req->file('image');
    		$ext = $file->getClientOriginalExtension();
    		$filename = time(). '.' .$ext;
    		$file->move('uploads/images',$filename);
    		$multiUser->image= $filename;
    		}
    		$multiUser->save();
    		$empSaLog = new EmployeeSalaryLog;
    		$empSaLog->employee_id = $multiUser->id;
    		$empSaLog->prevoius_salary = $req->salary;
    		$empSaLog->present_salary = $req->salary;
    		$empSaLog->increment_salary = '0';
    		$empSaLog->effected_date = date('y-m-d',strtotime($req->join_date));
    		$empSaLog->save();
    	});
     	$req->session()->flash('message','Registration Successfull');
        return redirect('/employees_list');
    }
    public function edit($id){
        $result['editData'] = MultiUser::find($id);
        $result['designation'] = Designation::all();
        return view('admin.users.employees.employee_edit',$result);
    }
    public function update(Request $req,$id){
            $multiUser = MultiUser::find($id);
            $multiUser->name = $req->name; 
            $multiUser->mobile = $req->mobile; 
            $multiUser->address = $req->address; 
            $multiUser->gender = $req->gender; 
            $multiUser->fname = $req->fname;  
            $multiUser->mname = $req->mname;  
            $multiUser->religion = $req->religion;  
            $multiUser->designation_id = $req->designation_id;  
            $multiUser->dob = date('Y-m-d',strtotime($req->dob));  
            if($req->hasfile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('uploads/images',$filename);
            $multiUser->image= $filename;
            }
            $multiUser->save();
        $req->session()->flash('message','Employee Info Updated Successfull');
        return redirect('/employees_list');
    }
    public function generatePDF($id){
        $result['editData'] = MultiUser::find($id);   
        $result['designation'] = Designation::all();      
        $pdf = PDF::loadView('admin.users.employees.employee_detail_pdf', $result);
        return $pdf->stream('detail.pdf');
    }
}

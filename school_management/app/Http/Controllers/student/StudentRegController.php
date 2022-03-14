<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
use App\Models\Group;
use App\Models\Year;
use App\Models\Shift;
use App\Models\ClassName;
use DB;
class StudentRegController extends Controller
{
    public function list(){
    	$data = MultiUser::where('usertype','student')->get();
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
    			dd($id_no);
    		}
    	});
    }
}

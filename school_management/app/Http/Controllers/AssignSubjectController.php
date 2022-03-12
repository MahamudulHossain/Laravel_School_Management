<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassName;
use App\Models\Group;
use App\Models\Subject;
use App\Models\AssignSubject;
class AssignSubjectController extends Controller
{
    public function list(){
    	$data['assignSubject'] = AssignSubject::select('class_name_id','group_id')->groupBy('class_name_id','group_id')->get();
    	return view('admin.setup.assign_subject.assign_subject_list',$data);
    }
    public function show_form(){
    	$data['className'] = ClassName::all();
    	$data['group'] = Group::all();
    	$data['subject'] = Subject::all();
    	return view('admin.setup.assign_subject.assign_subject_add_form',$data);
    }
    public function subject_ajax(Request $req){
    	$subData = Subject::all();
    	return response()->json(['data'=>$subData]); 
    }
    public function add_form(Request $req){
    	if($req->class_name_id > 0){
    		for($i=0; $i< count($req->subject_id); $i++){
    			$data = new AssignSubject;
    			$data->class_name_id = $req->class_name_id;
    			if($req->group_id == null){
    				$data->group_id = 0;
    			}else{
    				$data->group_id = $req->group_id;
    			}
    			
    			$data->subject_id = $req->subject_id[$i];
    			$data->subjective = $req->subjective[$i];
    			$data->subjective_pass_mark = $req->subjective_pass_mark[$i];
    			if($req->objective[$i] == null || $req->objective_pass_mark[$i]){
    				$data->objective = 0;
    				$data->objective_pass_mark = 0;
    			}else{
    				$data->objective = $req->objective[$i];
    				$data->objective_pass_mark = $req->objective_pass_mark[$i];
    			}
    			if($req->subjective[$i] != null){
    				$data->full_mark = $req->subjective[$i] + $req->objective[$i];
    			}else{
    				$data->full_mark = $req->subjective[$i];
    			}
        		$data->save();
    		}
    	}
    	$req->session()->flash('message','Subject Assigned Successfully');
        return redirect('/assign_subject_list');
    }
    public function show(Request $req,$class_id,$group_id){
    	$data['showData'] = AssignSubject::where(['class_name_id'=>$class_id,'group_id'=>$group_id])->get();
    	return view('admin.setup.assign_subject.assign_subject_show',$data);
    }
    public function edit($class_id,$group_id){
        $data['editData'] = AssignSubject::where(['class_name_id'=>$class_id,'group_id'=>$group_id])->get();
        // dd($data['editData']->toarray());
        $data['className'] = ClassName::all();
        $data['subject'] = Subject::all();
        $data['group'] = Group::all();
        return view('admin.setup.assign_subject.assign_subject_edit',$data);
    }
    public function update(Request $req,$class_id,$group_id){
        //dd($req->all());
        AssignSubject::where(['class_name_id'=>$class_id,'group_id'=>$group_id])->delete();
        if($req->class_name_id > 0){
            for($i=0; $i< count($req->subject_id); $i++){
                $data = new AssignSubject;
                $data->class_name_id = $req->class_name_id;
                if($req->group_id == null){
                    $data->group_id = 0;
                }else{
                    $data->group_id = $req->group_id;
                }
                $data->subject_id = $req->subject_id[$i];
                $data->subjective = $req->subjective[$i];
                $data->subjective_pass_mark = $req->subjective_pass_mark[$i];
                if($req->objective[$i] == null || $req->objective_pass_mark[$i]){
                    $data->objective = 0;
                    $data->objective_pass_mark = 0;
                }else{
                    $data->objective = $req->objective[$i];
                    $data->objective_pass_mark = $req->objective_pass_mark[$i];
                }
                if($req->subjective[$i] != null){
                    $data->full_mark = $req->subjective[$i] + $req->objective[$i];
                }else{
                    $data->full_mark = $req->subjective[$i];
                }
                $data->save();
            }
        }
        $req->session()->flash('message','Assigned Subject Updated Successfully');
        return redirect('/assign_subject_list');
    }
}

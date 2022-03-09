<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examtype;
class ExamtypeController extends Controller
{
    public function list(){
    	$data = Examtype::all();
    	return view('admin.setup.examtype.examtype_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.setup.examtype.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:examtypes'
    	]);
    	$data = new Examtype;
        $data->name = $req->post('name');
        $data->save();
        $req->session()->flash('message','Exam Type Added Successfully');
        return redirect('/exam_type_list');
    }
    public function edit($id){
    	$result = Examtype::find($id);
    	return view('admin.setup.examtype.examtype_edit',compact('result'));
    }
    public function update(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:examtypes'
    	]);
    	$result = Examtype::find($req->post('exam_id'));
    	$result->name = $req->post('name');
    	$result->save();
    	$req->session()->flash('message','Exam Type Updated Successfully');
        return redirect('/exam_type_list');
    }
}

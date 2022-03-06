<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassName;
class ClassNameController extends Controller
{
    public function list(){
    	$data = ClassName::all();
    	return view('admin.setup.student_class.class_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.setup.student_class.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:class_names'
    	]);
    	$data = new ClassName;
        $data->name = $req->post('name');
        $data->save();
        $req->session()->flash('message','Class Added Successfully');
        return redirect('/class_list');
    }
    public function delete(Request $req,$id){
       $result = ClassName::find($id);
       $result->delete();
       $req->session()->flash('message','Class Deleted Successfully');
       return redirect('/class_list');
    }
    public function edit($id){
    	$result = ClassName::find($id);
    	return view('admin.setup.student_class.class_edit',compact('result'));
    }
    public function update(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:class_names'
    	]);
    	$result = ClassName::find($req->post('class_id'));
    	$result->name = $req->post('name');
    	$result->save();
    	$req->session()->flash('message','Class Updated Successfully');
        return redirect('/class_list');
    }
}

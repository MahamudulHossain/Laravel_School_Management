<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
class SubjectController extends Controller
{
    public function list(){
    	$data = Subject::all();
    	return view('admin.setup.subject.subject_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.setup.subject.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:subjects'
    	]);
    	$data = new Subject;
        $data->name = $req->post('name');
        $data->save();
        $req->session()->flash('message','Subject Added Successfully');
        return redirect('/subject_list');
    }
    public function edit($id){
    	$result = Subject::find($id);
    	return view('admin.setup.subject.subject_edit',compact('result'));
    }
    public function update(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:subjects'
    	]);
    	$result = Subject::find($req->post('subject_id'));
    	$result->name = $req->post('name');
    	$result->save();
    	$req->session()->flash('message','Subject Updated Successfully');
        return redirect('/subject_list');
    }
}

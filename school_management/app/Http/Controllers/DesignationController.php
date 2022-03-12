<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
class DesignationController extends Controller
{
    public function list(){
    	$data = Designation::all();
    	return view('admin.setup.designation.designation_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.setup.designation.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:designations'
    	]);
    	$data = new Designation;
        $data->name = $req->post('name');
        $data->save();
        $req->session()->flash('message','Designation Added Successfully');
        return redirect('/designation_list');
    }
    public function edit($id){
    	$result = Designation::find($id);
    	return view('admin.setup.designation.designation_edit',compact('result'));
    }
    public function update(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:designations'
    	]);
    	$result = Designation::find($req->post('designation_id'));
    	$result->name = $req->post('name');
    	$result->save();
    	$req->session()->flash('message','Designation Updated Successfully');
        return redirect('/designation_list');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
class GroupController extends Controller
{
    public function list(){
    	$data = Group::all();
    	return view('admin.setup.group.group_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.setup.group.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:groups'
    	]);
    	$data = new Group;
        $data->name = $req->post('name');
        $data->save();
        $req->session()->flash('message','Group Added Successfully');
        return redirect('/group_list');
    }
    public function delete(Request $req,$id){
       $result = Group::find($id);
       $result->delete();
       $req->session()->flash('message','Group Deleted Successfully');
       return redirect('/group_list');
    }
    public function edit($id){
    	$result = Group::find($id);
    	return view('admin.setup.group.group_edit',compact('result'));
    }
    public function update(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:groups'
    	]);
    	$result = Group::find($req->post('group_id'));
    	$result->name = $req->post('name');
    	$result->save();
    	$req->session()->flash('message','Group Updated Successfully');
        return redirect('/group_list');
    }
}

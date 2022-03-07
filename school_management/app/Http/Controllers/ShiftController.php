<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
class ShiftController extends Controller
{
    public function list(){
    	$data = Shift::all();
    	return view('admin.setup.shift.shift_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.setup.shift.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:shifts'
    	]);
    	$data = new Shift;
        $data->name = $req->post('name');
        $data->save();
        $req->session()->flash('message','Shift Added Successfully');
        return redirect('/shift_list');
    }
    public function delete(Request $req,$id){
       $result = Shift::find($id);
       $result->delete();
       $req->session()->flash('message','Shift Deleted Successfully');
       return redirect('/shift_list');
    }
    public function edit($id){
    	$result = Shift::find($id);
    	return view('admin.setup.shift.shift_edit',compact('result'));
    }
    public function update(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:shifts'
    	]);
    	$result = Shift::find($req->post('shift_id'));
    	$result->name = $req->post('name');
    	$result->save();
    	$req->session()->flash('message','Shift Updated Successfully');
        return redirect('/shift_list');
    }
}

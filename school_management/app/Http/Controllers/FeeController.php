<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
class FeeController extends Controller
{
    public function list(){
    	$data = Fee::all();
    	return view('admin.setup.fee.fee_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.setup.fee.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:fees'
    	]);
    	$data = new Fee;
        $data->name = $req->post('name');
        $data->save();
        $req->session()->flash('message','Fee Added Successfully');
        return redirect('/fee_list');
    }
    public function delete(Request $req,$id){
       $result = Fee::find($id);
       $result->delete();
       $req->session()->flash('message','Fee Deleted Successfully');
       return redirect('/fee_list');
    }
    public function edit($id){
    	$result = Fee::find($id);
    	return view('admin.setup.fee.fee_edit',compact('result'));
    }
    public function update(Request $req){
    	$validated = $req->validate([
        'name' => 'required|unique:fees'
    	]);
    	$result = Fee::find($req->post('fee_id'));
    	$result->name = $req->post('name');
    	$result->save();
    	$req->session()->flash('message','Fee Updated Successfully');
        return redirect('/fee_list');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
class YearController extends Controller
{
    public function list(){
    	$data = Year::all();
    	return view('admin.setup.year.year_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.setup.year.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'year' => 'required|unique:years'
    	]);
    	$data = new Year;
        $data->year = $req->post('year');
        $data->save();
        $req->session()->flash('message','Year Added Successfully');
        return redirect('/year_list');
    }
    public function edit($id){
    	$result = Year::find($id);
    	return view('admin.setup.year.year_edit',compact('result'));
    }
    public function update(Request $req){
    	$validated = $req->validate([
        'year' => 'required|unique:years'
    	]);
    	$result = Year::find($req->post('year_id'));
    	$result->year = $req->post('year');
    	$result->save();
    	$req->session()->flash('message','Year Updated Successfully');
        return redirect('/year_list');
    }
}

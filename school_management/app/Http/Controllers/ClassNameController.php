<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ClassName;
class ClassNameController extends Controller
{
    public function list(){
    	return view('admin.setup.student_class.class_list');
    }
    public function show_form(){
    	return view('admin.setup.student_class.add_form');
    }
    public function add_form(Request $req){
    	dd($req->all());
    }
}

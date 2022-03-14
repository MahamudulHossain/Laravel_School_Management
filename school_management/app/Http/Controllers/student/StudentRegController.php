<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultiUser;
class StudentRegController extends Controller
{
    public function list(){
    	$data = MultiUser::where('usertype','student')->get();
    	return view('admin.users.students.students_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.users.students.register_form');
    }
}

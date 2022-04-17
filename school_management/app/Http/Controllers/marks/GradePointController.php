<?php

namespace App\Http\Controllers\marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GradePoint;

class GradePointController extends Controller
{
    public function view(){
    	$data['allData'] = GradePoint::all();
    	return view('admin.marks.show_grades',$data);
    }

    public function add_form(){
    	return view('admin.marks.add_grades_form');
    }
}

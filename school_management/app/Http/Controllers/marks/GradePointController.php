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

    public function store(Request $req){
    	$model = new GradePoint;
    	$model->grade_name = $req->grade_name;
    	$model->grade_point = $req->grade_point;
    	$model->start_mark = $req->start_mark;
    	$model->end_mark = $req->end_mark;
    	$model->start_point = $req->start_point;
    	$model->end_point = $req->end_point;
    	$model->remarks = $req->remarks;
    	$model->save();
    	$req->session()->flash('message','Grade Added Successfully');
        return redirect('/view_grade_point'); 
    }
}

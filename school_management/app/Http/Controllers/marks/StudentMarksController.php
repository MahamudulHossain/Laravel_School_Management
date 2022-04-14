<?php

namespace App\Http\Controllers\marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\ClassName;
use App\Models\ExamType;
use App\Models\Subject;
use App\Models\AssignSubject;

class StudentMarksController extends Controller
{
    public function view(){
    	$data['year'] = Year::all();
    	$data['className'] = ClassName::all();
    	$data['examType'] = ExamType::all();
    	return view('admin.marks.add_marks',$data);
    }

    public function get_subjects(Request $req){
    	$cls = $req->cls_id;
    	$subjects = AssignSubject::where('class_name_id',$cls)->get('subject_id');
    	foreach ($subjects as $key => $sub) {
    		$subName[] = Subject::where('id',$sub->subject_id)->get();
    	}
    	return response()->json($subName);
    }
}

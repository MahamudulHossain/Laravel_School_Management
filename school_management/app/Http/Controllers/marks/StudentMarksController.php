<?php

namespace App\Http\Controllers\marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\ClassName;
use App\Models\ExamType;
class StudentMarksController extends Controller
{
    public function view(){
    	$data['year'] = Year::all();
    	$data['className'] = ClassName::all();
    	$data['examType'] = ExamType::all();
    	return view('admin.marks.add_marks',$data);
    }
}

<?php

namespace App\Http\Controllers\marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\ClassName;
use App\Models\ExamType;
use App\Models\Subject;
use App\Models\AssignSubject;
use App\Models\AssignStudent;
use App\Models\MultiUser;
use App\Models\StudentMarks;

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

    public function get_stu_info(Request $req){
        $yr = $req->yr_id;
        $cls = $req->cls_id;
        $stu = AssignStudent::where(['year_id'=>$yr,'class_id'=>$cls])->get();
        foreach ($stu as $key => $st) {
            $stuInfo[] = MultiUser::where('id',$st->id)->get();
        }
        return response()->json(['assignStu'=>$stu,'data'=>$stuInfo]);
    }

    public function store(Request $req){
        //dd($req->all());
        $count = count($req->student_id);
        for($i=0;$i<$count;$i++){
            $mark = new StudentMarks;
            $mark->student_id = $req->student_id[$i];
            $mark->id_no = $req->id_no[$i];
            $mark->class_id = $req->class_id;
            $mark->year_id = $req->year_id;
            $mark->assign_subject_id = $req->sub_id;
            $mark->exam_type_id = $req->exam_id;
            $mark->marks = $req->marks[$i];
            $mark->save();
        }
        $req->session()->flash('message','Number Added Successfully');
        return redirect('/add_student_mark'); 
    }

    public function edit_view(){
        $data['year'] = Year::all();
        $data['className'] = ClassName::all();
        $data['examType'] = ExamType::all();
        return view('admin.marks.edit_marks',$data);
    }

    public function get_stu_mark(Request $req){
        $yr = $req->yr_id;
        $cls = $req->cls_id;
        $sub = $req->sub_id;
        $exm = $req->exam_id;
         $stu = AssignStudent::where(['year_id'=>$yr,'class_id'=>$cls])->get();
        foreach ($stu as $key => $st) {
            $stuInfo[] = MultiUser::where('id',$st->id)->get();
            $stuMark = StudentMarks::where(['year_id'=>$yr,'class_id'=>$cls,'assign_subject_id'=>$sub,'exam_type_id'=>$exm])->get();
        }
        return response()->json(['assignStu'=>$stu,'data'=>$stuInfo,'mark'=>$stuMark]);
    }
}

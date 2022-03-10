<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassName;
use App\Models\Group;
use App\Models\Subject;
use App\Models\AssignSubject;
class AssignSubjectController extends Controller
{
    public function list(){
    	$data['assignSubject'] = AssignSubject::all();
    	return view('admin.setup.assign_subject.assign_subject_list',$data);
    }
    public function show_form(){
    	$data['className'] = ClassName::all();
    	$data['group'] = Group::all();
    	$data['subject'] = Subject::all();
    	return view('admin.setup.assign_subject.assign_subject_add_form',$data);
    }
}

<?php

namespace App\Http\Controllers\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountStudentFee;

class StudentFeeController extends Controller
{
    public function view(){
    	$data['allData'] = AccountStudentFee::all();
    	return view('admin.account.student.show_list',$data);
    }
}

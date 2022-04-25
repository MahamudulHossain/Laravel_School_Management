<?php

namespace App\Http\Controllers\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtraIncome;

class ExtraIncomeController extends Controller
{
    public function view(){
    	$data['allData'] = ExtraIncome::all();
    	return view('admin.account.extra.show_list',$data);
    }
    public function income_form(){
    	return view('admin.account.extra.income_form');
    }
    public function save(Request $req){
    	$model = new ExtraIncome;
    	$model->date = $req->date;
    	$model->amount = $req->amount;
    	$model->description = $req->description;
    	$model->save();
    	$req->session()->flash('message','Income Added Successfully');
        return redirect('/extra_income');
    }
    public function delete(Request $req,$id){
    	$del = ExtraIncome::where('id',$id)->delete();
    	$req->session()->flash('message','Item Deleted Successfully');
        return redirect('/extra_income');
    }
}

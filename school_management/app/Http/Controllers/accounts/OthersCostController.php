<?php

namespace App\Http\Controllers\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OthersCost;

class OthersCostController extends Controller
{
    public function view(){
    	$data['allData'] = OthersCost::all();
    	return view('admin.account.others.show_list',$data);
    }
    public function cost_form(){
    	return view('admin.account.others.cost_form');
    }
    public function save(Request $req){
    	$model = new OthersCost;
    	$model->date = $req->date;
    	$model->amount = $req->amount;
    	$model->description = $req->description;
    	$model->save();
    	$req->session()->flash('message','Cost Added Successfully');
        return redirect('/others_cost');
    }
    public function delete(Request $req,$id){
    	$del = OthersCost::where('id',$id)->delete();
    	$req->session()->flash('message','Item Deleted Successfully');
        return redirect('/others_cost');
    }
}

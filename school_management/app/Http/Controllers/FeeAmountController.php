<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassName;
use App\Models\Fee;
use App\Models\FeeAmount;
class FeeAmountController extends Controller
{
     public function list(){
    	$data['feeAmount'] = FeeAmount::select('fee_id')->groupBy('fee_id')->get();
    	return view('admin.setup.fee_amount.fee_amount_list',$data);
    }
    public function show_form(){
    	$data['className'] = ClassName::all();
    	$data['fee'] = Fee::all();
    	return view('admin.setup.fee_amount.fee_amount_add_form',$data);
    }
    public function class_name_ajax(Request $req){
    	$clData = ClassName::all();
    	return response()->json(['data'=>$clData]); 
    }
    public function add_form(Request $req){
    	if($req->fee_id > 0){
    		for($i=0; $i< count($req->class_name_id); $i++){
    			$data = new FeeAmount;
    			$data->fee_id = $req->fee_id;
    			$data->class_name_id = $req->class_name_id[$i];
    			$data->amount = $req->amount[$i];
        		$data->save();
    		}
    	}
        $req->session()->flash('message','Fee Amount Added Successfully');
        return redirect('/fee_amount_list');
    }
    public function edit($fee_id){
    	$data['editData'] = FeeAmount::where('fee_id',$fee_id)->get();
    	// dd($data['editData']->toarray());
    	$data['className'] = ClassName::all();
    	$data['fee'] = Fee::all();
    	return view('admin.setup.fee_amount.fee_amount_edit',$data);
    }
    public function update(Request $req,$fee_id){
    	FeeAmount::where('fee_id',$fee_id)->delete();
    	if($req->fee_id > 0){
    		for($i=0; $i< count($req->class_name_id); $i++){
    			$data = new FeeAmount;
    			$data->fee_id = $req->fee_id;
    			$data->class_name_id = $req->class_name_id[$i];
    			$data->amount = $req->amount[$i];
        		$data->save();
    		}
    	}
    	$req->session()->flash('message','Fee Amount Updated Successfully');
        return redirect('/fee_amount_list');
    }
    public function show(Request $req,$fee_id){
    	$data['showData'] = FeeAmount::where('fee_id',$fee_id)->get();
    	return view('admin.setup.fee_amount.fee_amount_show',$data);
    }
}

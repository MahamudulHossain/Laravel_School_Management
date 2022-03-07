<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassName;
use App\Models\Fee;
use App\Models\FeeAmount;
class FeeAmountController extends Controller
{
     public function list(){
    	$data['className'] = ClassName::all();
    	$data['fee'] = Fee::all();
    	$data['feeAmount'] = FeeAmount::all();
    	return view('admin.setup.fee_amount.fee_amount_list',$data);
    }
    public function show_form(){
    	$data['className'] = ClassName::all();
    	$data['fee'] = Fee::all();
    	return view('admin.setup.fee_amount.fee_amount_add_form',$data);
    }
}

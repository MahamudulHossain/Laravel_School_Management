<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountStudentFee;
use App\Models\AccountEmployeeFee;
use App\Models\ExtraIncome;
use App\Models\OthersCost;

class ProfitReportController extends Controller
{
    public function view(){
    	return view('admin.reports.profit_report.get_report');
    }
    public function calculateProfit(Request $req){
    	$start_date = $req->start_date;
    	$end_date = $req->end_date;
    	$studentFee = AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
    	$extraIncome = ExtraIncome::whereBetween('date',[$start_date,$end_date])->sum('amount');
    	$employeeSalary = AccountEmployeeFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
    	$othersCost = OthersCost::whereBetween('date',[$start_date,$end_date])->sum('amount');
    	return response()->json(['sFee'=>$studentFee,'eIncome'=>$extraIncome,'empSal'=>$employeeSalary,'othCost'=>$othersCost]);	
    }
}

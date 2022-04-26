<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountStudentFee;
use App\Models\AccountEmployeeFee;
use App\Models\ExtraIncome;
use App\Models\OthersCost;
use Barryvdh\DomPDF\Facade\Pdf;
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
    public function generatePDF(Request $req){
    	//dd($req->all());
        $data['start_date'] = $req->start_date;
        $data['end_date'] = $req->end_date;
        $data['sFee'] = $req->sFee;
        $data['eIncome'] = $req->eIncome;
        $data['tIncome'] = $req->tIncome;
        $data['empSal'] = $req->empSal;
        $data['othCost'] = $req->othCost;
        $data['tCost'] = $req->tCost;
        $pdf = PDF::loadView('admin.reports.profit_report.profit_report_pdf',$data);
        return $pdf->stream('profit.pdf');
    }
}

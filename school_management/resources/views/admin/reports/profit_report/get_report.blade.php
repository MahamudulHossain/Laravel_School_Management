@extends('admin.layout')
@section('title','View Profit')

@section('head_link')

<script>
     $(document).ready(function(){
	   $("#datatable").dataTable();
	 });

   </script>
<!-- Datatables -->
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

@endsection

@section('content')

@if(session()->has('message'))
<div class="alert alert-success alert-dismissible " role="alert">
    {{session('message')}}
</div>
@endif
<div class="page-title">
  <div class="title_left">
    <h3>Monthly/Yearly Profit</h3>
  </div>

  <div class="title_right">
    
  </div>
</div>
<div class="x_content">
    <br />
    <form class="form-label-left input_mask" action="{{url('genPDF')}}" method="post">
      @csrf
      <div class="form-group row">
        <div class="col-md-5">
          <label class="col-form-label col-md-3 col-sm-3 ">Start Date</label>
          <div class="col-md-9 col-sm-9">
          <input type="date" name="start_date" class="form-control" id="start_date_id">
          </div>
          <span id="sdEmty" style="color: red;font-size: 15px;font-weight: bold;margin-left: 12px"></span>
        </div>
        <div class="col-md-5">
          <label class="col-form-label col-md-3 col-sm-3 ">End Date</label>
          <div class="col-md-9 col-sm-9">
          <input type="date" name="end_date" class="form-control" id="end_date_id">
          </div>
          <span id="edEmty" style="color: red;font-size: 15px;font-weight: bold;margin-left: 12px"></span>
        </div>
        <div class="col-md-2 col-sm-2">
          <a id="search" class="btn btn-primary" style="color: white">Search</a>
        </div>
      </div>
      <div class="form-group row" id="table_div">
        <table class="table table-striped table-bordered d-none" style="width:100%" id="table">
        <thead>
          <tr>
            <th>Student Fee</th>
            <th>Extra</th>
            <th>Grand Income</th>
            <th>Employee Salary</th>
            <th>Others</th>
            <th>Grand Expenses</th>
            <th>Profit</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbl_body">
        
        </tbody>  
        </table>
      </div>
        
    </form>

  </div>
              
@section('scripts')

    <script type="text/javascript">
      $(document).on('click','#search',function(){
        $("#tbl_body").html("");
        $("#sdEmty").html("");
        $("#edEmty").html("");
        var sdate = $("#start_date_id").val();
        var edate = $("#end_date_id").val();
        if(sdate == 0){
          $("#sdEmty").html("Please select Date");
          return false;
        }
        if(edate == 0){
          $("#edEmty").html("Please select Date");
          return false;
        }
        $("#table").removeClass('d-none');
        $.ajax({
          url: "{{url('/calculate_profit')}}",
          type: "get",
          data:{'start_date':sdate,'end_date':edate},
          success:function(result){
            var ht = "";
            ht += "<tr><input type='hidden' name='sFee' value='"+result.sFee+"'><input type='hidden' name='eIncome' value='"+result.eIncome+"'><input type='hidden' name='tIncome' value='"+(result.sFee+result.eIncome)+"'><input type='hidden' name='empSal' value='"+result.empSal+"'><input type='hidden' name='othCost' value='"+result.othCost+"'><input type='hidden' name='tCost' value='"+(result.empSal+result.othCost)+"'><td>"+result.sFee+"/-</td><td>"+result.eIncome+"/-</td><td>"+(result.sFee + result.eIncome)+"/-</td><td>"+result.empSal+"/-</td><td>"+result.othCost+"/-</td><td>"+(result.empSal + result.othCost)+"/-</td><td>"+((result.sFee + result.eIncome) - (result.empSal + result.othCost))+"/-</td><td><button class='btn btn-primary btn-sm'>PDF</button></td></tr>";
            $("#tbl_body").append(ht);
          }
        });
      });
    </script>
    <!-- Datatables -->
    <script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
@endsection

@endsection



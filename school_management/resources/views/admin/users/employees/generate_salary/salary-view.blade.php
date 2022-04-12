@extends('admin.layout')
@section('title','Generate Employee Salary')

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
    <h3>Generate Employee Salary</h3>
  </div>

  <div class="title_right">
    
  </div>
</div>
<div class="x_content">
    <br />
      <div class="form-group row">
        <div class="col-md-4">
          <label class="col-form-label col-md-3 col-sm-3 ">Month</label>
          <div class="col-md-9 col-sm-9">
            <input type="date" class="form-control" required="required" name="month" id="month">
          </div>
          <span id="monthEmpty" style="color: red;font-size: 15px;font-weight: bold;margin-left: 12px"></span>
        </div>
        <div class="col-md-4 col-sm-4">
          <a id="search" class="btn btn-primary" style="color: white">Search</a>
        </div>
      </div>
      <div class="form-group row">
        <table class="table table-striped table-bordered d-none" style="width:100%" id="table">
        <thead>
          <tr>
            <th>SL</th>
            <th>ID No.</th>
            <th>Employee Name</th>
            <th>Present Salary</th>
            <th>Monthly Salary(This Month)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbl_body">
        
        </tbody>  
        </table>
      </div>
  </div>
              
@section('scripts')

    <script type="text/javascript">
      $(document).on('click','#search',function(){
        $("#tbl_body").html("");
        $("#monthEmpty").html("");
        var month = $("#month").val();
        if(month == ''){
          $("#monthEmpty").html("Please select month");
          return false;
        }
        $.ajax({
          url: "{{url('/get_emp_sal_info')}}",
          type: "GET",
          data:{'month':month},
          success:function(result){
            $("#table").removeClass("d-none");
            var html = "";
            $.each(result.data,function(key,val){
              html +="<tr><td>"+(++key)+"</td><td>"+val.id_no+"</td><td>"+val.name+"</td><td>"+val.salary+"/-</td><td>"+result.sal[--key]+"/-</td><td><a href='{{url('download-paySlip')}}/"+val.id+"/"+month+"'><button class='btn btn-sm btn-success'>Pay slip</button></a></td></tr>";
            });
            $("#tbl_body").append(html);
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



@extends('admin.layout')
@section('title','Pay Employee Fee')

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
    <h3>Pay Employee Fees</h3>
  </div>

  <div class="title_right">
    
  </div>
</div>
<div class="x_content">
    <br />
    <form class="form-label-left input_mask" method="post" action="{{url('pay_employees_fee')}}">
      @csrf
      <div class="form-group row">
        <div class="col-md-3">
          <label class="col-form-label col-md-3 col-sm-3 ">Date</label>
          <div class="col-md-9 col-sm-9">
          <input type="date" name="date" class="form-control" id="date_id">
          </div>
          <span id="dEmty" style="color: red;font-size: 15px;font-weight: bold;margin-left: 12px"></span>
        </div>
        <div class="col-md-3 col-sm-3">
          <a id="search" class="btn btn-primary" style="color: white">Search</a>
        </div>
      </div>
      <div class="form-group row" id="table_div">
        <table class="table table-striped table-bordered d-none" style="width:100%" id="table">
        <thead>
          <tr>
            <th>SL</th>
            <th>ID No.</th>
            <th>Employee Name</th>
            <th>Basic Salary</th>
            <th>Salary(This Month)</th>
            <th>Status</th>
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
        $("#dEmty").html("");
        var date = $("#date_id").val();
        if(date == 0){
          $("#dEmty").html("Please select Date");
          return false;
        }
        $("#table").removeClass('d-none');
        $.ajax({
          url: "{{url('/get_employee_fee_info')}}",
          type: "get",
          data:{'date':date},
          success:function(result){
            var ht = "";
            $.each(result.data,function(key,val){
              //console.log(result.sal[key]);
              ht +="<tr><input type='hidden' name='emp_id[]' value='"+val['id']+"'><input type='hidden' name='amount[]' value='"+result.sal[key]+"'><td>"+(key+1)+"</td><td>"+val['id_no']+"</td><td>"+val['name']+"</td><td>"+val['salary']+"/-</td><td>"+result.sal[key]+"/-</td><td><input type='checkbox' name='status"+key+"'"+result.status[key]+"></td></tr>";
              
            });
            ht +="<tr><td colspan='6'><button class='btn btn-success'>Submit</button></td></tr>";
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



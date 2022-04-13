@extends('admin.layout')
@section('title','Add Marks')

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
    <h3>Add Marks</h3>
  </div>

  <div class="title_right">
    
  </div>
</div>
<div class="x_content">
    <br />
      <div class="form-group row">
        <div class="col-md-3">
          <label class="col-form-label col-md-3 col-sm-3 ">Year</label>
          <div class="col-md-9 col-sm-9">
          <select class="form-control" name="year_id" id="year_id" required="required">
            <option value="0">Select Year</option>
            @foreach($year as $yr)
            <option value="{{$yr->id}}">{{$yr->year}}</option>
            @endforeach
          </select>
          </div>
          <span id="yrEmty" style="color: red;font-size: 15px;font-weight: bold;margin-left: 12px"></span>
        </div>
        <div class="col-md-3">
          <label class="col-form-label col-md-3 col-sm-3 ">Class</label>
          <div class="col-md-9 col-sm-9">
          <select class="form-control" name="class_id" id="class_id" required="required">
            <option value="0">Select Class</option>
            @foreach($className as $cl)
            <option value="{{$cl->id}}">{{$cl->name}}</option>
            @endforeach
          </select>
          </div>
          <span id="clEmty" style="color: red;font-size: 15px;font-weight: bold;margin-left: 12px"></span>
        </div>
        <div class="col-md-3">
          <label class="col-form-label col-md-3 col-sm-3 ">Subject</label>
          <div class="col-md-9 col-sm-9">
          <select class="form-control" name="sub_id" id="sub_id" required="required">
            <option value="0">Select Subject</option>
            
          </select>
          </div>
          <span id="subEmty" style="color: red;font-size: 15px;font-weight: bold;margin-left: 12px"></span>
        </div>
        <div class="col-md-3">
          <label class="col-form-label col-md-3 col-sm-3 ">Exam Name</label>
          <div class="col-md-9 col-sm-9">
          <select class="form-control" name="exam_id" id="exam_id" required="required">
            <option value="0">Select Exam Name</option>
            @foreach($examType as $et)
            <option value="{{$et->id}}">{{$et->name}}</option>
            @endforeach
          </select>
          </div>
          <span id="etEmty" style="color: red;font-size: 15px;font-weight: bold;margin-left: 12px"></span>
        </div>
        <div class="col-md-3 col-sm-3">
          <a id="search" class="btn btn-primary" style="color: white">Search</a>
        </div>
      </div>
      <div class="form-group row">
        <table class="table table-striped table-bordered d-none" style="width:100%" id="table">
        <thead>
          <tr>
            <th>SL</th>
            <th>ID No.</th>
            <th>Student Name</th>
            <th>Roll</th>
            <th>Monthly Fee</th>
            <th>Discount Amount</th>
            <th>Final Fee</th>
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
        $("#yrEmty").html("");
        $("#subEmty").html("");
        $("#clEmty").html("");
        $("#etEmty").html("");
        var yr = $("#year_id").val();
        var cls = $("#class_id").val();
        var exm = $("#exam_id").val();
        var sub = $("#sub_id").val();
        if(yr == 0){
          $("#yrEmty").html("Please select year");
          return false;
        }
        if(cls == 0){
          $("#clEmty").html("Please select class");
          return false;
        }
        if(sub == 0){
          $("#subEmty").html("Please select Subject");
          return false;
        }
        if(exm == 0){
          $("#etEmty").html("Please select Exam Name");
          return false;
        }
        $.ajax({
          
        });
      });
    </script>
    <script type="text/javascript">
      $(document).on('change','#class_id',function(){
        var clsId = $(this).val();
        $.ajax({
          url: "{{url('/get_all_sub')}}",
          type: "GET",
          data:{'cls_id':clsId},
          success:function(result){
            var html = "";
            $.each(result.data,function(key,val){
              console.log(val[0]['name']);
            });
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



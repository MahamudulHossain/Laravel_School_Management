@extends('admin.layout')
@section('title','Assign Roll')

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
    <h3>Assign Roll</h3>
  </div>

  <div class="title_right">
    
  </div>
</div>
<div class="x_content">
    <br />
    <form class="form-label-left input_mask" method="post" action="{{url('assign_roll')}}">
      @csrf
      <div class="form-group row">
        <div class="col-md-4">
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
        <div class="col-md-4">
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
        <div class="col-md-4 col-sm-4">
          <a id="search" class="btn btn-primary" style="color: white">Search</a>
        </div>
      </div>
      <div class="form-group row">
        <table class="table table-striped table-bordered d-none" style="width:100%" id="table">
        <thead>
          <tr>
            <th>ID No.</th>
            <th>Name</th>
            <th>Father's Name</th>
            <th>Roll</th>
          </tr>
        </thead>
        <tbody id="tbl_body">
        
        </tbody>  
        </table>
      </div>
      <div>
        <button class="btn btn-success">Generate Roll</button>
      </div>  
    </form>

  </div>
              
@section('scripts')

    <script type="text/javascript">
      $(document).on('click','#search',function(){
        $("#tbl_body").html("");
        $("#yrEmty").html("");
        $("#clEmty").html("");
        var yr = $("#year_id").val();
        var cls = $("#class_id").val();
        if(yr == 0){
          $("#yrEmty").html("Please select year");
          return false;
        }
        if(cls == 0){
          $("#clEmty").html("Please select class");
          return false;
        }
        $.ajax({
          url: "{{url('/get_stu_info')}}",
          type: "GET",
          data:{'cls_id':cls,'year_id':yr},
          success:function(result){
            $("#table").removeClass("d-none");
            var html = "";
            $.each(result.data,function(key,val){
              html +="<tr><input type='hidden' name='student_id[]' value='"+val.student_id+"'><td>"+val.stu_id+"</td><td>"+val.stu_nm+"</td><td>"+val.stu_fname+"</td><td><input type='number' name='roll[]' value='"+val.roll+"'></td></tr>";
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



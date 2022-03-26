@extends('admin.layout')
@section('title','Employess Leave List')

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
    <h3>Employee Leave List</h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <a href="{{url('/create_employee_leave')}}"><button class="btn btn-primary">Create employee leave</button></a>
      </div>
    </div>
  </div>
</div>
<div class="card-box table-responsive">
	<table id="datatable" class="table table-striped table-bordered" style="width:100%">
	  <thead>
	    <tr>
	      <th>SL.</th>
        <th>Name</th>
        <th>Id NO.</th>
        <th>Purpose</th>
        <th>Start Date</th>
        <th>End Date</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($allData as $key=>$cl)
	    <tr>
	      <td>{{++$key}}</td>
        <td>
          <?php
            $empName = App\Models\MultiUser::where('id',$cl->employee_id)->get();
            echo $empName['0']->name;
          ?>
        </td>
        <td>
          <?php
            $empName = App\Models\MultiUser::where('id',$cl->employee_id)->get();
            echo $empName['0']->id_no;
          ?>
        </td>
        <td>
          <?php
            $empName = App\Models\LeavePurpose::where('id',$cl->leave_purpose_id)->get();
            echo $empName['0']->name;
          ?>
        </td>
        <td>{{date('d-m-Y',strtotime($cl->start_date))}}</td>
        <td>{{date('d-m-Y',strtotime($cl->end_date))}}</td>
	      <td>
	      	<a href="{{url('employee_leave_edit',$cl->id)}}"><button class="btn btn-sm btn-primary">Edit</button></a>
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>         
</div>
              
@section('scripts')
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



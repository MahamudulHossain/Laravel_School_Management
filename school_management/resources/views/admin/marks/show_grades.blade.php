@extends('admin.layout')
@section('title','Grade Point Table')

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
    <h3>Grade Point Table</h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <a href="{{url('/add_grade_point')}}"><button class="btn btn-success">Add grade point</button></a>
    </div>
  </div>
</div>
<div class="card-box table-responsive">
	<table id="datatable" class="table table-striped table-bordered" style="width:100%">
	  <thead>
	    <tr>
	      <th>SL.</th>
        <th>Grade Name</th>
        <th>Grade Point</th>
        <th>Number</th>
        <th>Point</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($allData as $key=>$gp)
	    <tr>
	      <td>{{$key + 1}}</td>
        <td>{{$gp->grade_name}}</td>
        <td>{{$gp->grade_point}}</td>
        <td>{{$gp->start_mark}} - {{$gp->end_mark}}</td>
        <td>{{$gp->start_point}} - {{$gp->end_point}}</td>
	      <td>
	      	<a href="{{url('employee_salary_increment',$gp->id)}}"><button class="btn btn-sm btn-primary">Edit</button></a>
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



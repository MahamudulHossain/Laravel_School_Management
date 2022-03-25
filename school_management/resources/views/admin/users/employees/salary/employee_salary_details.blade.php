@extends('admin.layout')
@section('title','Salary Log')

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
    <h3>Salary Log</h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      
    </div>
  </div>
</div>
<div class="card-box table-responsive">
  <div>
    <table style="margin-bottom: 15px">
      <tr>
        <th><h5>Employee Name: </h5></th>
        <td><h5>{{$allData->name}}</h5></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <th><h5>Employee ID: </h5></th>
        <td><h5>{{$allData->id_no}}</h5></td>
      </tr>
    </table>
  </div>
	<table id="datatable" class="table table-striped table-bordered" style="width:100%">
	  <thead>
	    <tr>
	      <th>SL.</th>
        <th>Previous Salary</th>
        <th>Increment</th>
        <th>New Salary</th>
        <th>Effected Date</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($salaryData as $key=>$sl) 
	    <tr>
        @if($key == '0')
          <td colspan="5" style="text-align: center;font-weight: bold">Joining Salary: {{$sl->present_salary}}/-</td>
        @else 
	      <td>{{$key++}}</td>
        <td>{{$sl->prevoius_salary}}/-</td>
        <td>{{$sl->increment_salary}}/-</td>
        <td>{{$sl->present_salary}}/-</td>
        <td>{{date('d-m-Y',strtotime($sl->effected_date))}}</td>
        @endif
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



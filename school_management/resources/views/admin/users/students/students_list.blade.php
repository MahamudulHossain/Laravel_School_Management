@extends('admin.layout')
@section('title','Students List')

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
    <h3>All Registered Students</h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <a href="{{url('/student_reg_form')}}"><button class="btn btn-primary">Student Register Form!</button></a>
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
        <th>Roll</th>
        <th>Class</th>
        <th>Image</th>
	      <th>Code</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($data as $key=>$cl)
	    <tr>
	      <td>{{++$key}}</td>
        <td>{{$cl->name}}</td>
        <td>{{$cl->id_no}}</td>
        <td></td>
        <td>
          <?php
            $clNm = App\Models\ClassName::where('id',$cl->get_student->class_id)->get();
          ?>
          {{$clNm[0]->name}}
        </td>
        <td>
          <img src="{{asset('uploads/images')}}/{{$cl->image}}" width="120px" height="80px">
        </td>
	      <td>{{$cl->code}}</td>
	      <td>
	      	<a href="{{url('student_edit')}}/{{$cl->id}}/{{$cl->get_student->year_id}}"><button class="btn btn-sm btn-primary">Edit</button></a>
          <a href="{{url('student_promotion')}}/{{$cl->id}}/{{$cl->get_student->year_id}}"><button class="btn btn-sm btn-success">Promotion</button></a>
          <a href="{{url('student_pdf')}}/{{$cl->id}}/{{$cl->get_student->year_id}}"><button class="btn btn-sm btn-success">PDF</button></a>
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



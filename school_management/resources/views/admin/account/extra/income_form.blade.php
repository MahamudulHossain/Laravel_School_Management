@extends('admin.layout')
@section('title','Add Extra Income')

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
    <h3>Add Extra Income</h3>
  </div>

  <div class="title_right">
    
  </div>
</div>
<div class="x_content">
    <br />
    <form class="form-label-left input_mask" method="post" action="{{url('extra_income_submit')}}">
      @csrf
      <div class="form-group row">
        <div class="col-md-4">
          <label class="col-form-label col-md-3 col-sm-3 ">Date</label>
          <div class="col-md-9 col-sm-9">
          <input type="date" name="date" class="form-control" required="required">
          </div>
        </div>
        <div class="col-md-4">
          <label class="col-form-label col-md-3 col-sm-3 ">Amount</label>
          <div class="col-md-9 col-sm-9">
          <input type="number" name="amount" class="form-control" required="required">
          </div>
        </div>
        <div class="col-md-4">
          <label class="col-form-label col-md-3 col-sm-3 ">Description</label>
          <div class="col-md-9 col-sm-9">
          <input type="text" name="description" class="form-control" required="required">
          </div>
        </div>
        <div class="col-md-3 col-sm-3">
          <button class="btn btn-success">Save</button>
        </div>
      </div>
        
    </form>

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



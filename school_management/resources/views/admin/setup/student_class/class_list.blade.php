@extends('admin.layout')
@section('title','Class List')

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
<div class="page-title">
  <div class="title_left">
    <h3>Class Name</h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <a href="{{url('/class_add_form')}}"><button class="btn btn-primary">Add New Class Now!</button></a>
      </div>
    </div>
  </div>
</div>
<div class="card-box table-responsive">
	<table id="datatable" class="table table-striped table-bordered" style="width:100%">
	  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Position</th>
	      <th>Office</th>
	      <th>Age</th>
	      <th>Start date</th>
	      <th>Salary</th>
	    </tr>
	  </thead>


	  <tbody>
	    <tr>
	      <td>Tiger Nixon</td>
	      <td>System Architect</td>
	      <td>Edinburgh</td>
	      <td>61</td>
	      <td>2011/04/25</td>
	      <td>$320,800</td>
	    </tr>
	    <tr>
	      <td>Garrett Winters</td>
	      <td>Accountant</td>
	      <td>Tokyo</td>
	      <td>63</td>
	      <td>2011/07/25</td>
	      <td>$170,750</td>
	    </tr>
	    <tr>
	      <td>Ashton Cox</td>
	      <td>Junior Technical Author</td>
	      <td>San Francisco</td>
	      <td>66</td>
	      <td>2009/01/12</td>
	      <td>$86,000</td>
	    </tr>
	    <tr>
	      <td>Cedric Kelly</td>
	      <td>Senior Javascript Developer</td>
	      <td>Edinburgh</td>
	      <td>22</td>
	      <td>2012/03/29</td>
	      <td>$433,060</td>
	    </tr>
	    <tr>
	      <td>Airi Satou</td>
	      <td>Accountant</td>
	      <td>Tokyo</td>
	      <td>33</td>
	      <td>2008/11/28</td>
	      <td>$162,700</td>
	    </tr>
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



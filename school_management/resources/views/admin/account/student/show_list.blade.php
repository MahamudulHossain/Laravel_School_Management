@extends('admin.layout')
@section('title','Student Fees List')

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
    <h3>Student Fees List</h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <a href="{{url('/student_pay_fees')}}"><button class="btn btn-success">Pay Fees Now</button></a>
    </div>
  </div>
</div>
<div class="card-box table-responsive">
	<table id="datatable" class="table table-striped table-bordered" style="width:100%">
	  <thead>
	    <tr>
	      <th>SL.</th>
          <th>ID</th>
          <th>Name</th>
          <th>Year</th>
          <th>Class</th>
          <th>Fee Type</th>
          <th>Amount</th>
	      <th>Date</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($allData as $key=>$StuFee)
	    <tr>
          <td>{{$key + 1}}</td>
          <td><?php
            $stuId = App\Models\MultiUser::where('id',$StuFee->student_id)->get();
            echo $stuId['0']['id_no'];
            ?>
          </td>
          <td>{{$stuId['0']['name']}}</td>
          <td><?php
            $stuYear = App\Models\Year::where('id',$StuFee->year_id)->get();
            echo $stuYear['0']['year'];
            ?>
          </td>
          <td><?php
            $stuClass = App\Models\ClassName::where('id',$StuFee->class_id)->get();
            echo $stuClass['0']['name'];
            ?>  
          </td>
          <td><?php
            $FeeType = App\Models\Fee::where('id',$StuFee->fee_category_id)->get();
            echo $FeeType['0']['name'];
            ?>
          </td>
          <td>{{$StuFee->amount}}</td>
          <td><?php echo date('F,Y',strtotime($StuFee->date));?></td>
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



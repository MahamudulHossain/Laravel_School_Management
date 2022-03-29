@extends('admin.layout')
@section('title','Employee Attendance Form')


@section('content')
<h2> Employee Attendance Form </h2>
<div class="x_content">
	@if(session()->has('message'))
	<div class="alert alert-danger alert-dismissible " role="alert">
	    {{session('message')}}
	</div>
	@endif
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('add_employee_attendance')}}">
			@csrf
			<div class="form-group row">
				<div class="col-md-8">
						<label class="col-form-label col-md-3 col-sm-3 ">Present Date </label>
						<div class="col-md-9 col-sm-9">
						<input type="date" class="form-control" name="date" required="required">
						</div>
				</div>
			</div>
			<div class="form-group row">	
				<table class="table table-bordered table-stripped dt-responsive">
					<thead>
						<tr>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name</th>
							<th colspan="3" class="text-center" style="vertical-align: middle;width: 25%;">Attendance Status</th>
						</tr>
						<tr>
							<th class="text-center btn" style="background-color: #114190;color: #fff;">Present</th>
							<th class="text-center btn" style="background-color: #114190;color: #fff;">Leave</th>
							<th class="text-center btn" style="background-color: #114190;color: #fff;">Absent</th>
						</tr>
					</thead>
					<tbody>
						@foreach($emp_name as $key=>$emp)
							<tr>
								<input type="hidden" name="employee_id[]" value="{{$emp->id}}">
								<td class="text-center">{{$key + 1}}</td>
								<td class="text-center">{{$emp->name}}</td>
								<td colspan="3">
									<input type="radio" name="attend_status{{$key}}" value="present" checked="checked"><label>Present</label>
									<input type="radio" name="attend_status{{$key}}" value="leave"><label>Leave</label>
									<input type="radio" name="attend_status{{$key}}" value="absent"><label>Absent</label>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="form-group row">
				<div class="col-md-6">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>

	</div>  

@endsection



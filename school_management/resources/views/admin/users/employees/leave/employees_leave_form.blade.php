@extends('admin.layout')
@section('title','Employee Leave Form')


@section('content')
<h2> Employee Leave Form </h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('add_employee_leave')}}">
			@csrf
			<div class="form-group row">
				<div class="col-md-6">
						<label class="col-form-label col-md-3 col-sm-3 ">Employee Name</label>
						<div class="col-md-9 col-sm-9">
						<select class="form-control" name="emploee_id" required="required">
							<option value="">Choose Employee Name</option>
							@foreach($emp_name as $key=>$val)
							<option value="{{$val->id}}">{{$val->name}}</option>
							@endforeach
						</select>
						</div>
				</div>
				<div class="col-md-6">
					<label class="col-form-label col-md-3 col-sm-3 ">Leave Purpose</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="leave_purpose_id" required="required">
							<option value="">Choose Employee Name</option>
							@foreach($leave_purpose as $key=>$val)
							<option value="{{$val->id}}">{{$val->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="form-group row">	
				<div class="col-md-6">
						<label class="col-form-label col-md-3 col-sm-3 ">Start Date</label>
						<div class="col-md-9 col-sm-9">
						<input type="date" class="form-control" name="strat_date" required="required">
						</div>
				</div>
				<div class="col-md-6">
						<label class="col-form-label col-md-3 col-sm-3 ">End Date</label>
						<div class="col-md-9 col-sm-9">
						<input type="date" class="form-control" name="end_date" required="required">
						</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-6">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>

	</div>  

@endsection



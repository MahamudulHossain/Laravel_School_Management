@extends('admin.layout')
@section('title','Employee Salary Increment')


@section('content')
<h2> Employee Salary Increment </h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('employee_increment_salary',$data->id)}}">
			@csrf
			<div class="form-group row">
				<div class="col-md-5">
						<label class="col-form-label col-md-3 col-sm-3 ">Increment</label>
						<div class="col-md-9 col-sm-9">
						<input type="number" class="form-control" placeholder="Enter increment amount"  name="increment_amount" required="required">
						</div>
				</div>
				<div class="col-md-5">
					<label class="col-form-label col-md-3 col-sm-3 ">Effected Date</label>
					<div class="col-md-9 col-sm-9">
					<input type="date" class="form-control" name="effected_date" required="required">
					</div>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>

	</div>  

@endsection



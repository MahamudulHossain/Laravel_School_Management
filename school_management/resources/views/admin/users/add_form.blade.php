@extends('admin.layout')
@section('title','User Form')


@section('content')
<h2>Add User</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('add_users')}}">
			@csrf
			<div class="form-group row">

			<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Name</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter your name"  name="name" required="required">
					</div>
			</div>

			<div class="col-md-4">
				<label class="col-form-label col-md-3 col-sm-3 ">Email</label>
				<div class="col-md-9 col-sm-9">
				<input type="email" class="form-control" placeholder="Enter your email"  name="email">
				@if ($errors->any())
				 <div class="alert alert-danger">
		         @foreach ($errors->all() as $error)
		            {{ $error }}
		         @endforeach
				 </div>
				@endif
				</div>
			</div>	

			<div class="col-md-4">
				<label class="col-form-label col-md-4 col-sm-4 ">User Type</label>
				<div class="col-md-8 col-sm-8">
					<select class="form-control" name="usertype" required="required"> 
						<option value="">Choose user type</option>
						<option value="employee">Employee</option>
						<option value="operator">Operator</option>
						<option value="student">Student</option>
					</select>
				</div>
			</div>	
				
			</div>

			<div class="ln_solid"></div>
			<div class="form-group row">
				<div class="col-md-9 col-sm-9  offset-md-3">
					<button class="btn btn-primary" type="reset">Reset</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>

	</div>  

@endsection



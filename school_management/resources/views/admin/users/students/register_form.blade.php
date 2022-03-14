@extends('admin.layout')
@section('title','Student Register Form')


@section('content')
<h2> Register Student</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('register_student')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<div class="col-md-4">
						<label class="col-form-label col-md-3 col-sm-3 ">Name</label>
						<div class="col-md-9 col-sm-9">
						<input type="text" class="form-control" placeholder="Enter your name"  name="name" required="required">
						</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Father's Name</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter your father's name" name="fname" required="required">
					</div>
				</div>	
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Mother's Name</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter your mother's name" name="mname" required="required">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Address</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter your address"  name="address" required="required">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Gender</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="gender" required="required">
						<option value="">Select Gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Religion</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="religion" required="required">
						<option value="">Select Religion</option>
						<option value="muslim">Muslim</option>
						<option value="hindu">Hindu</option>
					</select>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Class</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="class_id" required="required">
						<option value="">Select Class</option>
						@foreach($className as $cl)
						<option value="{{$cl->id}}">{{$cl->name}}</option>
						@endforeach
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Group Name</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="group_id">
						<option value="">Select Group</option>
						@foreach($group as $grp)
						<option value="{{$grp->id}}">{{$grp->name}}</option>
						@endforeach
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Shift</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="shift_id" required="required">
						<option value="">Select Shift</option>
						@foreach($shift as $sft)
						<option value="{{$sft->id}}">{{$sft->name}}</option>
						@endforeach
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Year</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="year_id" required="required">
						<option value="">Select Year</option>
						@foreach($year as $yr)
						<option value="{{$yr->id}}">{{$yr->year}}</option>
						@endforeach
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Mobile</label>
					<div class="col-md-9 col-sm-9">
					<input type="number" class="form-control" name="mobile" required="required" placeholder="Enter mobile number">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Date of Birth</label>
					<div class="col-md-9 col-sm-9">
					<input type="date" class="form-control" name="dob" required="required">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Image</label>
					<div class="col-md-9 col-sm-9">
					<input type="file" class="form-control" name="image" required="required">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Discount</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" name="discount" placeholder="Enter discounted amount" class="form-control">
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



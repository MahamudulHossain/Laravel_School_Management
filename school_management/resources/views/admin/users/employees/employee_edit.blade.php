@extends('admin.layout')
@section('title','Edit Employee')


@section('content')
<h2>Edit Employee</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('update_employee',$editData->id)}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<div class="col-md-4">
						<label class="col-form-label col-md-3 col-sm-3 ">Name</label>
						<div class="col-md-9 col-sm-9">
						<input type="text" class="form-control" placeholder="Enter your name"  name="name" required="required" value="{{$editData->name}}">
						</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Father's Name</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter your father's name" name="fname" required="required" value="{{$editData->fname}}">
					</div>
				</div>	
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Mother's Name</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter your mother's name" name="mname" required="required" value="{{$editData->mname}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Address</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter your address"  name="address" required="required" value="{{$editData->address}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Gender</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="gender" required="required">
						<option value="">Select Gender</option>
						<option value="male" {{($editData->gender == 'male')?'selected':''}}>Male</option>
						<option value="female" {{($editData->gender == 'female')?'selected':''}}>Female</option>
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Religion</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="religion" required="required">
						<option value="">Select Religion</option>
						<option value="muslim" {{($editData->religion == 'muslim')?'selected':''}}>Muslim</option>
						<option value="hindu" {{($editData->religion == 'hindu')?'selected':''}}>Hindu</option>
					</select>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Designation</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="designation_id" required="required">
						<option value="">Select designation</option>
						@foreach($designation as $dsg)
						<option value="{{$dsg->id}}" {{($editData->designation_id == $dsg->id)?'selected':''}}>{{$dsg->name}}</option>
						@endforeach
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Mobile</label>
					<div class="col-md-9 col-sm-9">
					<input type="number" class="form-control" name="mobile" required="required" placeholder="Enter mobile number" value="{{$editData->mobile}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Date of Birth</label>
					<div class="col-md-9 col-sm-9">
					<input type="date" class="form-control" name="dob" required="required" value="{{$editData->dob}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Image</label>
					<div class="col-md-9 col-sm-9">
					<input type="file" class="form-control" name="image">
					<img src="{{asset('uploads/images')}}/{{$editData->image}}" width="150px" height="120px">
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



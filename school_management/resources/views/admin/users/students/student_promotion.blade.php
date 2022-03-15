@extends('admin.layout')
@section('title','Student Promotion')


@section('content')
<h2>Student Promotion</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('promote_student')}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="stu_id" value="{{$editData[0]->id}}">
			<input type="hidden" name="yr_id" value="{{$editData[0]->year_id}}">
			<input type="hidden" name="assign_stu_id" value="{{$editData[0]->assign_student_id}}">
			<div class="form-group row">
				<div class="col-md-4">
						<label class="col-form-label col-md-3 col-sm-3 ">Name</label>
						<div class="col-md-9 col-sm-9">
						<input type="text" class="form-control" name="name" readonly="readonly" value="{{$editData[0]->name}}">
						</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Father's Name</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" name="fname" readonly="readonly" value="{{$editData[0]->fname}}">
					</div>
				</div>	
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Mother's Name</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" name="mname" readonly="readonly" value="{{$editData[0]->mname}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Address</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" name="address" readonly="readonly" value="{{$editData[0]->address}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Gender</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="gender" readonly="readonly">
						<option value="">Select Gender</option>
						<option value="male" {{($editData[0]->gender == 'male')?'selected':''}}>Male</option>
						<option value="female" {{($editData[0]->gender == 'female')?'selected':''}}>Female</option>
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Religion</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="religion" readonly="readonly">
						<option value="">Select Religion</option>
						<option value="muslim" {{($editData[0]->religion == 'muslim')?'selected':''}}>Muslim</option>
						<option value="hindu" {{($editData[0]->religion == 'hindu')?'selected':''}}>Hindu</option>
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
						<option value="{{$cl->id}}" {{($editData[0]->class_id == $cl->id)?'selected':''}}>{{$cl->name}}</option>
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
						<option value="{{$grp->id}}" {{($editData[0]->group_id == $grp->id)?'selected':''}}>{{$grp->name}}</option>
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
						<option value="{{$sft->id}}" {{($editData[0]->shift_id == $sft->id)?'selected':''}}>{{$sft->name}}</option>
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
						<option value="{{$yr->id}}" {{($editData[0]->year_id == $yr->id)?'selected':''}}>{{$yr->year}}</option>
						@endforeach
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Mobile</label>
					<div class="col-md-9 col-sm-9">
					<input type="number" class="form-control" name="mobile" readonly="readonly" value="{{$editData[0]->mobile}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Date of Birth</label>
					<div class="col-md-9 col-sm-9">
					<input type="date" class="form-control" name="dob" readonly="readonly" value="{{$editData[0]->dob}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Image</label>
					<div class="col-md-9 col-sm-9">
					<img src="{{asset('uploads/images')}}/{{$editData[0]->image}}" width="150px" height="120px">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Discount</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" name="discount" placeholder="Enter discounted amount" class="form-control"  value="{{$editData[0]->discount}}">
					</div>
				</div>
			</div>
			<div class="ln_solid"></div>
			<div class="form-group row">
				<div class="col-md-9 col-sm-9  offset-md-3">
					<button type="submit" class="btn btn-success">Promote Now</button>
				</div>
			</div>
		</form>

	</div>  

@endsection



@extends('admin.layout')
@section('title','Edit grade Form')


@section('content')
<h2>Edit grade Form</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('update_grade',$data->id)}}">
			@csrf
			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Grade Name</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter grade name"  name="grade_name" required="required" value="{{$data->grade_name}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Grade Point</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter grade point"  name="grade_point" required="required" value="{{$data->grade_point}}">
					</div>
				</div>	
				<div class="col-md-4">
					<label class="col-form-label col-md-4 col-sm-4 ">Start Mark</label>
					<div class="col-md-8 col-sm-8">
						<input type="text" class="form-control" placeholder="Enter start mark"  name="start_mark" required="required" value="{{$data->start_mark}}">
					</div>
				</div>	
			</div>

			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">End Mark</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter end mark"  name="end_mark" required="required" value="{{$data->end_mark}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Start Point</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter start point"  name="start_point" required="required" value="{{$data->start_point}}">
					</div>
				</div>	
				<div class="col-md-4">
					<label class="col-form-label col-md-4 col-sm-4 ">End Point</label>
					<div class="col-md-8 col-sm-8">
						<input type="text" class="form-control" placeholder="Enter end point"  name="end_point" required="required" value="{{$data->end_point}}">
					</div>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">ReMarks</label>
					<div class="col-md-9 col-sm-9">
					<input type="text" class="form-control" placeholder="Enter remarks"  name="remarks" required="required" value="{{$data->remarks}}">
					</div>
				</div>
			</div>

			<div class="ln_solid"></div>
			<div class="form-group row">
				<div class="col-md-9 col-sm-9  offset-md-3">
					<button type="submit" class="btn btn-success">Update</button>
				</div>
			</div>
		</form>

	</div>  

@endsection



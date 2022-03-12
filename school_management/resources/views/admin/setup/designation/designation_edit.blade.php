@extends('admin.layout')
@section('title','Edit Designation')


@section('content')
<h2>Edit Designation</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('update_designation')}}">
			@csrf
			<div class="form-group row">
				<label class="col-form-label col-md-3 col-sm-3 ">Designation</label>
				<div class="col-md-9 col-sm-9 ">
					<input type="text" class="form-control" placeholder="Designation"  name="name" required="required" value="{{$result->name}}">
					<input type="hidden" name="designation_id" value="{{$result->id}}">
					 @if ($errors->any())
					 <div class="alert alert-danger">
			         @foreach ($errors->all() as $error)
			            {{ $error }}
			         @endforeach
    				 </div>
					 @endif
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



@extends('admin.layout')
@section('title','Employee Leave Edit')


@section('content')
<h2> Employee Leave Edit </h2>
<div class="x_content">
	@if(session()->has('message'))
	<div class="alert alert-danger alert-dismissible " role="alert">
	    {{session('message')}}
	</div>
	@endif
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('update_employee_leave',$allData->id)}}">
			@csrf
			<div class="form-group row">
				<div class="col-md-6">
						<label class="col-form-label col-md-3 col-sm-3 ">Employee Name</label>
						<div class="col-md-9 col-sm-9">
						<select class="form-control" name="employee_id" required="required">
							<option value="">Choose Employee Name</option>
							@foreach($emp_name as $key=>$val)
							<option value="{{$val->id}}" {{($val->id == $allData->employee_id)?'selected':''}}>{{$val->name}}</option>
							@endforeach
						</select>
						</div>
				</div>
				<div class="col-md-6">
					<label class="col-form-label col-md-3 col-sm-3 ">Leave Purpose</label>
					<div class="col-md-9 col-sm-9">
					<select class="form-control" name="leave_purpose_id" required="required" id="addPurpose">
							<option value="">Choose Leave Purpose</option>
							@foreach($leave_purpose as $key=>$val)
							<option value="{{$val->id}}" {{($val->id == $allData->leave_purpose_id)?'selected':''}}>{{$val->name}}</option>
							@endforeach
							<option value="0">Add Leave Purpose</option>
					</select>
					<input type="text" name="new_purpose" class="form-control d-none" placeholder="Enter your purpose" id="newPurpose">
					</div>
				</div>
			</div>
			<div class="form-group row">	
				<div class="col-md-6">
						<label class="col-form-label col-md-3 col-sm-3 ">Start Date</label>
						<div class="col-md-9 col-sm-9">
						<input type="date" class="form-control" name="start_date" required="required" value="{{$allData->start_date}}">
						</div>
				</div>
				<div class="col-md-6">
						<label class="col-form-label col-md-3 col-sm-3 ">End Date</label>
						<div class="col-md-9 col-sm-9">
						<input type="date" class="form-control" name="end_date" required="required" value="{{$allData->end_date}}">
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

	@section('scripts')
		<script type="text/javascript">
			$(document).on('change','#addPurpose',function(){
				var val = $(this).val();
				if(val == '0'){
					$('#newPurpose').removeClass('d-none');
				}else{
					$('#newPurpose').addClass('d-none');
				}
			});
		</script>
	@endsection

@endsection



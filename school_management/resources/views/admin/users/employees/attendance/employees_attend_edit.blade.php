@extends('admin.layout')
@section('title','Employee Attendance Edit')


@section('content')
<h2> Employee Attendance Edit </h2>
<div class="x_content">
	@if(session()->has('message'))
	<div class="alert alert-danger alert-dismissible " role="alert">
	    {{session('message')}}
	</div>
	@endif
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('update_employee_attend',$editData['0']->date)}}">
			@csrf
			<div class="form-group row">
				<div class="col-md-8">
						<label class="col-form-label col-md-3 col-sm-3 ">Present Date </label>
						<div class="col-md-9 col-sm-9">
						<input type="date" class="form-control" name="date" readonly="readonly" value="{{$editData['0']->date}}">
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
						@foreach($editData as $key=>$eData)
						
							<tr>
								<input type="hidden" name="employee_id[]" value="{{$eData->employee_id}}">
								<td class="text-center">{{$key + 1}}</td>
								<td class="text-center">{{$eData->employee_id}}</td>
								<td colspan="3">
									<input type="radio" name="attend_status{{$key}}" value="present" {{($eData->attend_status=='present')?'checked':''}}><label>Present</label>
									<input type="radio" name="attend_status{{$key}}" value="leave" {{($eData->attend_status=='leave')?'checked':''}}><label>Leave</label>
									<input type="radio" name="attend_status{{$key}}" value="absent" {{($eData->attend_status=='absent')?'checked':''}}><label>Absent</label>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="form-group row">
				<div class="col-md-6">
					<button type="submit" class="btn btn-success">Update</button>
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



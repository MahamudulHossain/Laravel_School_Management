@extends('admin.layout')
@section('title','Assign Subject Form')


@section('content')
<h2>Assign Subject</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('add_assign_subject')}}">
			@csrf
			<div class="form-group row">
				<div class="col-md-6 col-sm-6 ">
				<label class="col-form-label col-md-3 col-sm-3 ">Class</label>
					<select class="form-control" required="required" name="class_name_id">
						<option value="">Select Class</option>
						@foreach($className as $cN)
						<option value="{{$cN->id}}">{{$cN->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6 col-sm-6 ">
				<label class="col-form-label col-md-6 col-sm-6 ">Group (<span style="color: red;font-size: 6px;font-weight: bold">Only when appropiate</span>)</label>
					<select class="form-control" name="group_id">
						<option value="">Select Group</option>
						@foreach($group as $grp)
						<option value="{{$grp->id}}">{{$grp->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Subject</label>
					<div class="col-md-9 col-sm-9 ">
						<select class="form-control" name="subject_id[]">
						<option value="">Select Subject</option>
						@foreach($subject as $sub)
						<option value="{{$sub->id}}">{{$sub->name}}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Subjective Mark</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="subjective[]" required="required" class="form-control" placeholder="Subjective Mark">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Subjective Pass Mark</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="subjective_pass_mark[]" required="required" class="form-control" placeholder="Subjective Pass Mark">
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Objective Mark</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="objective[]" class="form-control" placeholder="Objective Mark">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Objective Pass Mark</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="objective_pass_mark[]" class="form-control" placeholder="Objective Pass Mark">
					</div>
				</div>
				<div class="col-md-4">
					<button class="btn btn-success addMoreBtn">Add</button>
				</div>
			</div>
			<div>
				<table width="100%">
					<tbody id="addRow" class="addRow"></tbody>
				</table>
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
@section('scripts')
	<script type="text/javascript">
		$(document).on('click','.addMoreBtn',function(e){
			e.preventDefault();
			$.ajax({
			url: "{{url('get_subject')}}",
			type: "GET",
			success: function(result){
				var html = '<tr><td><div class="form-group row"><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Subject</label><div class="col-md-9 col-sm-9 "><select class="form-control" name="subject_id[]"><option value="">Select Subject</option>';
				$.each(result.data,function(key,val){
					html += '<option value="'+val.id+'">'+val.name+'</option>';
				});
					html += '</select></div></div><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Subjective Mark</label><div class="col-md-9 col-sm-9 "><input type="number" name="subjective[]" required="required" class="form-control" placeholder="Subjective Mark"></div></div><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Subjective Pass Mark</label><div class="col-md-9 col-sm-9 "><input type="number" name="subjective_pass_mark[]" required="required" class="form-control" placeholder="Subjective Pass Mark"></div></div></div><div class="form-group row"><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Objective Mark</label><div class="col-md-9 col-sm-9 "><input type="number" name="objective[]" class="form-control" placeholder="Objective Mark"></div></div><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Objective Pass Mark</label><div class="col-md-9 col-sm-9 "><input type="number" name="objective_pass_mark[]" class="form-control" placeholder="Objective Pass Mark"></div></div><div class="col-md-4"><button class="btn btn-danger" onclick="removeMoreBtn(this)">Remove</button></div></div></td></tr>';
					$("#addRow").append(html);
			}
		});
	});

		function removeMoreBtn(that){
			$(that).closest('tr').remove();
		}
	</script>
@endsection

@endsection



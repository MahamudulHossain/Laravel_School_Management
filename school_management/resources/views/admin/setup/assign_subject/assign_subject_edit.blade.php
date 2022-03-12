@extends('admin.layout')
@section('title','Edit Assigned Subject')


@section('content')
<h2>Edit Assigned Subject</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('update_assign_subject/'.$editData[0]->class_name_id.'/'.$editData[0]->group_id)}}">
			@csrf
			<div class="form-group row">
				<div class="col-md-6 col-sm-6 ">
				<label class="col-form-label col-md-3 col-sm-3 ">Class</label>
					<select class="form-control" required="required" name="class_name_id">
						<option value="">Select Class</option>
						@foreach($className as $cN)
						<option value="{{$cN->id}}" {{($editData[0]->class_name_id == $cN->id)?'selected':''}}>{{$cN->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6 col-sm-6 ">
				<label class="col-form-label col-md-6 col-sm-6 ">Group (<span style="color: red;font-size: 6px;font-weight: bold">Only when appropiate</span>)</label>
					<select class="form-control" name="group_id">
						<option value="">Select Group</option>
						@foreach($group as $grp)
						<option value="{{$grp->id}}" {{($editData[0]->group_id == $grp->id)?'selected':''}}>{{$grp->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@foreach($editData as $key=>$edit)
				<table width="100%"><tbody><tr><td>	
					<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Subject</label>
					<div class="col-md-9 col-sm-9 ">
						<select class="form-control" name="subject_id[]">
						<option value="">Select Subject</option>
						@foreach($subject as $sub)
						<option value="{{$sub->id}}" {{($edit->subject_id == $sub->id)?'selected':''}}>{{$sub->name}}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Subjective Mark</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="subjective[]" required="required" class="form-control" placeholder="Subjective Mark" value="{{$edit->subjective}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Subjective Pass Mark</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="subjective_pass_mark[]" required="required" class="form-control" placeholder="Subjective Pass Mark" value="{{$edit->subjective_pass_mark}}">
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Objective Mark</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="objective[]" class="form-control" placeholder="Objective Mark" value="{{$edit->objective}}">
					</div>
				</div>
				<div class="col-md-4">
					<label class="col-form-label col-md-3 col-sm-3 ">Objective Pass Mark</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="objective_pass_mark[]" class="form-control" placeholder="Objective Pass Mark" value="{{$edit->objective_pass_mark}}">
					</div>
				</div>
				<div class="col-md-4">
					@if($key == 0)
					<button class="btn btn-sm btn-success addMoreBtn">Add</button>
					@else
					<button class="btn btn-sm btn-danger" onclick="removeMoreBtn(this)">Delete</button>
					@endif
				</div>
			</div>
				</td></tr></tbody></table>
			@endforeach		
			<div>
				<table width="100%">
					<tbody id="addRow" class="addRow"></tbody>
				</table>
			</div>
			<div class="ln_solid"></div>
			<div class="form-group row">
				<div class="col-md-9 col-sm-9  offset-md-3">
					<button type="submit" class="btn btn-success">Update</button>
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
					html += '</select></div></div><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Subjective Mark</label><div class="col-md-9 col-sm-9 "><input type="number" name="subjective[]" required="required" class="form-control" placeholder="Subjective Mark"></div></div><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Subjective Pass Mark</label><div class="col-md-9 col-sm-9 "><input type="number" name="subjective_pass_mark[]" required="required" class="form-control" placeholder="Subjective Pass Mark"></div></div></div><div class="form-group row"><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Objective Mark</label><div class="col-md-9 col-sm-9 "><input type="number" name="objective[]" class="form-control" placeholder="Objective Mark"></div></div><div class="col-md-4"><label class="col-form-label col-md-3 col-sm-3 ">Objective Pass Mark</label><div class="col-md-9 col-sm-9 "><input type="number" name="objective_pass_mark[]" class="form-control" placeholder="Objective Pass Mark"></div></div><div class="col-md-2"><button class="btn btn-danger btn-sm" onclick="removeMoreBtn(this)">Remove</button></div></div></td></tr>';
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



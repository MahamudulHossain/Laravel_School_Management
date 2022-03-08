@extends('admin.layout')
@section('title','Edit Fee Amount')


@section('content')
<h2>Edit Fee Amount</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('update_fee_amount/'.$editData[0]->fee_id)}}">
			@csrf
			<div class="form-group row">
				<label class="col-form-label col-md-3 col-sm-3 ">Fee Type</label>
				<div class="col-md-6 col-sm-6 ">
					<select class="form-control" required="required" name="fee_id">
						<option value="">Select Fee Type</option>
						@foreach($fee as $fees)
						<option value="{{$fees->id}}" {{($editData[0]->fee_id == $fees->id)?"selected":""}}>{{$fees->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@foreach($editData as $key=>$edit)
			<table width="100%"><tbody><tr><td>	
			<div class="form-group row">
				<div class="col-md-5">
					<label class="col-form-label col-md-3 col-sm-3 ">Class</label>
					<div class="col-md-9 col-sm-9 ">
						<select class="form-control" required="required" name="class_name_id[]">
							<option value="">Select Class</option>
							@foreach($className as $cName)
							<option value="{{$cName->id}}" {{($edit->class_name_id == $cName->id)?"selected":""}}>{{$cName->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-5">
					<label class="col-form-label col-md-3 col-sm-3 ">Fee Type</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="amount[]" required="required" class="form-control" value="{{$edit->amount}}">
					</div>
				</div>
				<div class="col-md-2">
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
			url: "{{url('get_class_name')}}",
			type: "GET",
			success: function(result){
				var html = '<tr><td><div class="form-group row"><div class="col-md-5"><label class="col-form-label col-md-3 col-sm-3 ">Class</label><div class="col-md-9 col-sm-9 "><select class="form-control" required="required" name="class_name_id[]"><option value="">Select Class</option>';
				$.each(result.data,function(key,val){
					html += '<option value="'+val.id+'">'+val.name+'</option>';
				});
					html += '</select></div></div><div class="col-md-5"><label class="col-form-label col-md-3 col-sm-3 ">Fee Type</label><div class="col-md-9 col-sm-9 "><input type="number" name="amount[]" required="required" class="form-control" placeholder="Fee amount"></div></div><div class="col-md-2"><button class="btn btn-sm btn-danger" onclick="removeMoreBtn(this)">Delete</button></div></div></td></tr>';
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



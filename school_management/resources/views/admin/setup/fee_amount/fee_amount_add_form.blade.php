@extends('admin.layout')
@section('title','Fee Amount Form')


@section('content')
<h2>Add Fee Amount</h2>
<div class="x_content">
		<br />
		<form class="form-label-left input_mask" method="post" action="{{url('add_fee_amount')}}">
			@csrf
			<div class="form-group row">
				<label class="col-form-label col-md-3 col-sm-3 ">Fee Type</label>
				<div class="col-md-6 col-sm-6 ">
					<select class="form-control" required="required" name="fee_id">
						<option value="">Select Fee Type</option>
						@foreach($fee as $fees)
						<option value="{{$fees->id}}">{{$fees->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-5">
					<label class="col-form-label col-md-3 col-sm-3 ">Class</label>
					<div class="col-md-9 col-sm-9 ">
						<select class="form-control" required="required" name="class_name_id[]">
							<option value="">Select Class</option>
							@foreach($className as $cName)
							<option value="{{$cName->id}}">{{$cName->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-5">
					<label class="col-form-label col-md-3 col-sm-3 ">Fee Type</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="number" name="amount[]" required="required" class="form-control" placeholder="Fee amount">
					</div>
				</div>
				<div class="col-md-2">
					<button class="btn btn-sm btn-success addMoreBtn">Add</button>
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
			url: "{{url('get_class_name')}}",
			type: "GET",
			success: function(result){
				var html = '<tr><td><div class="form-group row test"><div class="col-md-5"><label class="col-form-label col-md-3 col-sm-3 ">Class</label><div class="col-md-9 col-sm-9 "><select class="form-control" required="required" name="class_name_id[]"><option value="">Select Class</option>';
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



<!DOCTYPE html>
<html>
<head>
	<title>Employee Details</title>
</head>
<body>
	<table>
		<tr>
			<td>
				<div style="margin-left: 550px">
					<img src="uploads/images/'{{$editData->image}}" width="150px" height="120px">
				</div>
			</td>
		</tr>
	</table>
	<table border="1" width="90%">
		<tr>
			<th>Name</th>
			<td>{{$editData->name}}</td>
		</tr>
		<tr>
			<th>Father's Name</th>
			<td>{{$editData->fname}}</td>
		</tr>
		<tr>
			<th>Mother's Name</th>
			<td>{{$editData->mname}}</td>
		</tr>
		<tr>
			<th>Mobile</th>
			<td>{{$editData->mobile}}</td>
		</tr>
		<tr>
			<th>Date</th>
			<td>{{$editData->dob}}</td>
		</tr>
		<tr>
			<th>Address</th>
			<td>{{$editData->address}}</td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>{{($editData->gender == 'male')?'Male':'Female'}}</td>
		</tr>
		<tr>
			<th>Religion</th>
			<td>{{($editData->religion == 'muslim')?'Muslim':'Hindu'}}</td>
		</tr>
		<tr>
			<th>Designation</th>
			<td>
				@foreach($designation as $dg)
				@if($editData->designation_id == $dg->id)
					<?php
            		$dgNm = App\Models\Designation::where('id',$dg->id)->get();
          			?>
          		{{$dgNm[0]->name}}
				@endif
				@endforeach
			</td>
		</tr>
		<tr>
			<th>Joining Date</th>
			<td>{{date('d-m-Y',strtotime($editData->join_date))}}</td>
		</tr>
	</table>
	<table style="margin-top: 75px;">
		<tr>
			<td width="30%"></td>
			<td width="30%"></td>
			<td width="40%">
				<div style="width: 150px;margin-left: 450px">
					<hr style="1px dotted">
					<p style="text-align: right">(Principal's Sign)</p>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>
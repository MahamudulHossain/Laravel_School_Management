<!DOCTYPE html>
<html>
<head>
	<title>Student Details</title>
</head>
<body>
	<table>
		<tr>
			<td><img src="uploads/images/'{{$editData[0]->image}}" width="150px" height="120px"></td>
		</tr>
	</table>
	<table border="1" width="90%">
		<tr>
			<th>Name</th>
			<td>{{$editData[0]->name}}</td>
		</tr>
		<tr>
			<th>Father's Name</th>
			<td>{{$editData[0]->fname}}</td>
		</tr>
		<tr>
			<th>Mother's Name</th>
			<td>{{$editData[0]->mname}}</td>
		</tr>
		<tr>
			<th>Mobile</th>
			<td>{{$editData[0]->mobile}}</td>
		</tr>
		<tr>
			<th>Date</th>
			<td>{{$editData[0]->dob}}</td>
		</tr>
		<tr>
			<th>Address</th>
			<td>{{$editData[0]->address}}</td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>{{($editData[0]->gender == 'male')?'Male':'Female'}}</td>
		</tr>
		<tr>
			<th>Religion</th>
			<td>{{($editData[0]->religion == 'muslim')?'Muslim':'Hindu'}}</td>
		</tr>
		<tr>
			<th>Class</th>
			<td>
				@foreach($className as $cl)
				@if($editData[0]->class_id == $cl->id)
					<?php
            		$clNm = App\Models\ClassName::where('id',$cl->id)->get();
          			?>
          		{{$clNm[0]->name}}
				@endif
				@endforeach
			</td>
		</tr>
		<tr>
			<th>Group</th>
			<td>
				@if($editData[0]->group_id == 0)
					Not Eligible
				@else	 
					@foreach($group as $grp)
					@if($editData[0]->group_id == $grp->id)
						<?php
	            		$grpNm = App\Models\Group::where('id',$grp->id)->get();
	          			?>
	          		{{$grpNm[0]->name}}
					@endif
					@endforeach
				@endif
			</td>
		</tr>
		<tr>
			<th>Shift</th>
			<td> 
				@foreach($shift as $sft)
				@if($editData[0]->shift_id == $sft->id)
					<?php
            		$shftNm = App\Models\Shift::where('id',$sft->id)->get();
          			?>
          		{{$shftNm[0]->name}}
				@endif
				@endforeach
			</td>
		</tr>
		<tr>
			<th>Year</th>
			<td> 
				@foreach($year as $yr)
				@if($editData[0]->year_id == $yr->id)
					<?php
            		$yrNm = App\Models\Year::where('id',$yr->id)->get();
          			?>
          		{{$yrNm[0]->year}}
				@endif
				@endforeach
			</td>
		</tr>
		<tr>
			<th>Discount</th>
			<td>{{$editData[0]->discount}}/-</td>
		</tr>
	</table>
</body>
</html>
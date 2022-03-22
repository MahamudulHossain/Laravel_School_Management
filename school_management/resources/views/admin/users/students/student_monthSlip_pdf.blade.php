<!DOCTYPE html>
<html>
<head>
	<title>Monthly Pay Slip</title>
</head>
<body>
	<table border="1" width="90%">
		
		<tr>
			<td colspan="2"><h2 style="text-align: center">Office Copy</h2></td>
		</tr>
		<tr>
			<th>Name</th>
			<td>{{$allData[0]->stu_nm}}</td>
		</tr>
		<tr>
			<th>ID No</th>
			<td>{{$allData[0]->stu_id}}</td>
		</tr>
		<tr>
			<th>Class</th>
			<td>
				<?php
					$clNm = App\Models\ClassName::where('id',$allData[0]->class_id)->get();
				?>
				{{$clNm[0]->name}}
			</td>
		</tr>
		<tr>
			<th>Session</th>
			<td>
				<?php
					$yr = App\Models\Year::where('id',$allData[0]->year_id)->get();
				?>
				{{$yr[0]->year}}
			</td>
		</tr>
		<tr>
			<th>Monthly Fee ({{$month}})</th>
			<td>{{$allData[0]->amount}}/-</td>
		</tr>
		<tr>
			<th>Discount</th>
			<td>{{$allData[0]->discount}}%</td>
		</tr>
		<tr>
			<th>Amount to Pay</th>
			<td>{{$allData[0]->amount - (($allData[0]->amount/100)*$allData[0]->discount)}}/-</td>
		</tr>
		<tr>
			<th>Group</th>
			<td>
				@if($allData[0]->group_id > 0)
					$grp = App\Models\Group::where('id',$allData[0]->group_id)->get();
					{{$grp[0]->name}}
				@else
					Not Applicable
				@endif
			</td>
		</tr>
	</table>
	<table  style="margin-bottom: 50px;">
		<tr>
			<td>Date: <?php echo date('d-m-Y');?></td>
		</tr>
	</table>
	<hr/>
	<table border="1" width="90%" style="margin-top: 50px;">
		<tr>
			<td colspan="2"><h2 style="text-align: center">Student's Copy</h2></td>
		</tr>
		<tr>
			<th>Name</th>
			<td>{{$allData[0]->stu_nm}}</td>
		</tr>
		<tr>
			<th>ID No</th>
			<td>{{$allData[0]->stu_id}}</td>
		</tr>
		<tr>
			<th>Class</th>
			<td>
				<?php
					$clNm = App\Models\ClassName::where('id',$allData[0]->class_id)->get();
				?>
				{{$clNm[0]->name}}
			</td>
		</tr>
		<tr>
			<th>Session</th>
			<td>
				<?php
					$yr = App\Models\Year::where('id',$allData[0]->year_id)->get();
				?>
				{{$yr[0]->year}}
			</td>
		</tr>
		<tr>
			<th>Monthly Fee ({{$month}})</th>
			<td>{{$allData[0]->amount}}/-</td>
		</tr>
		<tr>
			<th>Discount</th>
			<td>{{$allData[0]->discount}}%</td>
		</tr>
		<tr>
			<th>Amount to Pay</th>
			<td>{{$allData[0]->amount - (($allData[0]->amount/100)*$allData[0]->discount)}}/-</td>
		</tr>
		<tr>
			<th>Group</th>
			<td>
				@if($allData[0]->group_id > 0)
					$grp = App\Models\Group::where('id',$allData[0]->group_id)->get();
					{{$grp[0]->name}}
				@else
					Not Applicable
				@endif
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Date: <?php echo date('d-m-Y');?></td>
		</tr>
	</table>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Salary Pay Slip</title>
</head>
<body>
	<table border="1" width="90%">
		<tr>
			<td colspan="2"><h2 style="text-align: center">Office Copy</h2></td>
		</tr>
		<tr>
			<th>Name</th>
			<td>{{$userInfo['0']->name}}</td>
		</tr>
		<tr>
			<th>ID No</th>
			<td>{{$userInfo['0']->id_no}}</td>
		</tr>
		<tr>
			<th>Actual Salary</th>
			<td>{{$userInfo['0']->salary}}/-</td>
		</tr>
		<tr>
			<th>Salary Month(Year)</th>
			<td>{{$month}} ({{$year}})</td>
		</tr>
		<tr>
			<th>Total Absent</th>
			<td>{{$absent}} day(s)</td>
		</tr>
		<tr>
			<th>Paid Salary</th>
			<td>{{$sal}}/-</td>
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
			<td colspan="2"><h2 style="text-align: center">Employee's Copy</h2></td>
		</tr>
		<tr>
			<th>Name</th>
			<td>{{$userInfo['0']->name}}</td>
		</tr>
		<tr>
			<th>ID No</th>
			<td>{{$userInfo['0']->id_no}}</td>
		</tr>
		<tr>
			<th>Actual Salary</th>
			<td>{{$userInfo['0']->salary}}/-</td>
		</tr>
		<tr>
			<th>Salary Month(Year)</th>
			<td>{{$month}} ({{$year}})</td>
		</tr>
		<tr>
			<th>Total Absent</th>
			<td>{{$absent}} day(s)</td>
		</tr>
		<tr>
			<th>Paid Salary</th>
			<td>{{$sal}}/-</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Date: <?php echo date('d-m-Y');?></td>
		</tr>
	</table>
	
</body>
</html>
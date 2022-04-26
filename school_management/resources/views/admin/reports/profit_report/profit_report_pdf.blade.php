<!DOCTYPE html>
<html>
<head>
	<title>Monthly/Yearly Profit</title>
</head>
<body>
	<table border="1" width="90%" style="margin-bottom: 25px;">

		<tr>
			<td colspan="2"><h2 style="text-align: center">Monthly/Yearly Profit</h2></td>
		</tr>
		<tr>
			<td colspan="2"><span style="margin-left: 180px;">Duration: {{date('d,F-Y',strtotime($start_date))}} - {{date('d,F-Y',strtotime($end_date))}}</span></td>
		</tr>
		<tr>
			<th>Student Fees</th>
			<td style="text-align: center">{{$sFee}}/-</td>
		</tr>
		<tr>
			<th>Extra Income</th>
			<td style="text-align: center">{{$eIncome}}/-</td>
		</tr>
		<tr style="background-color: #BBEDA0">
			<th>Grand Income</th>
			<td style="text-align: center">{{$tIncome}}/-</td>
		</tr>
		<tr>
			<th>Employee Salary</th>
			<td style="text-align: center">{{$empSal}}/-</td>
		</tr>
		<tr>
			<th>Other Cost</th>
			<td style="text-align: center">{{$othCost}}/-</td>
		</tr>
		<tr style="background-color: #A0EDCC">
			<th>Grand Expense</th>
			<td style="text-align: center">{{$tCost}}/-</td>
		</tr>
	</table>
	<table border="1" width="90%">
		<tr style="background-color: #A3C7E7">
			<th style="text-align: center" colspan="2">Profit/Loss: <span style="margin-left: 15px;">{{ $tIncome - $tCost}}/-</span></th>
		</tr>
	</table>
	<table  style="margin-top: 50px;">
		<tr>
			<td>Date: <?php echo date('d-m-Y');?></td>
		</tr>
	</table>
	
</body>
</html>
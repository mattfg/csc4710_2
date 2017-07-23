<a href="/">Home</a><br>
<style>
.t {width:100%;}
.tt {width:20%;}
</style>
<form id='params' method='POST' action='/daily_master_schedule2.php'>
<table class='t' style='width:100%'>
<tr>
<td class='tt'><p class='t'>Day:<br> (format: e.g. <?php echo "'".date('Y-m-d')."'"?>)</p></td>
<td class='tt'><input class='t' type="text" name="date" value=<?php echo "'".date('Y-m-d')."'"?>></td>
<td class='tt'><input class='t' type="submit" value="Go"></td>
</tr>
</table>
</form>
<?php
	require '_query.php';
	require '_table.php';

	$date='FROM_UNIXTIME('.date_timestamp_get(date_create_from_format('Y-m-d', getP('date'))).')';
	table(
		'SELECT s.Id, sp.name, ss.start, ss.done, p.name, v.reason, a.name
		FROM StaffShift ss
			INNER JOIN Staff s ON s.Id = ss.staff
			INNER JOIN Patient sp on sp.Id = s.asPatient
			LEFT JOIN Visit v ON s.Id = v.staff
			LEFT JOIN Appointment ap ON v.Id = ap.visit
			LEFT JOIN Patient p ON p.Id = v.patient
			LEFT JOIN Assignment a ON a.Id = ss.assignment AND a.name = \'walkin\'
		WHERE DayOfYear(ss.start) = DayOfYear('.$date.')
			AND DayOfYear(ss.start) = DayOfYear('.$date.')'
	);
	mysqli_close($sql);
?>
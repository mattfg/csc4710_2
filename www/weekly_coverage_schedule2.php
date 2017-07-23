<a href="/">Home</a><br>
<style>
.t {width:100%;}
.tt {width:20%;}
</style>
<form id='params' method='POST' action='/weekly_coverage_schedule2.php'>
<table class='t' style='width:100%'>
<tr>
<td class='tt'><p class='t'>Select the week containing this day:<br> (format: e.g. <?php echo "'".date('Y-m-d')."'"?>)</p></td>
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
		'SELECT p.name AS Staff, p.phone AS Phone, ss.start AS `Shift starts`, ss.done AS `Shift ends`, a.name AS `Assignment`
		FROM StaffShift ss
		INNER JOIN Staff s ON s.Id=ss.staff
		INNER JOIN Patient p on p.Id=s.asPatient
		INNER JOIN Assignment a on a.Id=ss.assignment
		WHERE WeekOfYear(ss.start)=WeekOfYear('.$date.')
			AND Year(ss.start)=Year('.$date.');'
	);
	mysqli_close($sql);
?>
<a href="/">Home</a><br>
<style>
.t {width:100%;}
.tt {width:20%;}
</style>
<form id='params' method='POST' action='/individual_practitioner_schedule2.php'>
<table class='t' style='width:100%'>
<tr>
<td class='tt'><p class='t'>Practitioner ID</p></td>
<td class='tt'><input class='t' type="numeric" name="id"></td>
<td class='tt'><p class='t'>Date e.g. <?php echo "'".date('Y-m-d')."'"?></p></td>
<td class='tt'><input class='t' type="text" name="date" value=<?php echo "'".date('Y-m-d')."'"?>></td>
<td class='tt'><input class='t' type="submit" value="Go"></td>
</tr>
</table>
</form>
<?php 
	require '_query.php';
	require '_table.php';

	$id=getP('id');
	$date='FROM_UNIXTIME('.date_timestamp_get(date_create_from_format('Y-m-d', getP('date'))).')';
	$cmd=
		'SELECT patient.name, a.start, a.done, v.reason, v.start, v.done
	FROM StaffShift ss
		INNER JOIN Staff s ON s.Id = ss.staff
		INNER JOIN Patient p ON p.Id = s.asPatient
		INNER JOIN Visit v on s.Id = v.staff
		INNER JOIN Patient patient ON patient.Id = v.patient
		LEFT JOIN Appointment a on v.Id = a.visit
	WHERE DayOfYear(ss.start)=DayOfYear('.$date.')
		AND Year(ss.start)=Year('.$date.')
		AND s.Id='.$id.';'
	;
	table($cmd);
	mysqli_close($sql);
?>
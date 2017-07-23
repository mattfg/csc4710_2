<a href="/">Home</a><br>
<?php
	require '_query.php';
	require '_table.php';
	table(
		'SELECT p.name AS Staff, p.phone AS Phone, ss.start AS `Shift starts`, ss.done AS `Shift ends`, a.name AS `Assignment`
		FROM StaffShift ss
		INNER JOIN Staff s ON s.Id=ss.staff
		INNER JOIN Patient p on p.Id=s.asPatient
		INNER JOIN Assignment a on a.Id=ss.assignment
		WHERE WeekOfYear(ss.start)=WeekOfYear(CURRENT_DATE)
			AND Year(ss.start)=Year(CURRENT_DATE)'
	);
	mysqli_close($sql);
?>
<?php
	require '_query.php';
	require '_table.php';
	table('SELECT DISTINCT v.name FROM Diagnosis v;');
	mysqli_close($sql);
?>
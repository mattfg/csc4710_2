<?php
	require '_query.php';
	require '_table.php';
	table('SELECT DISTINCT v.reason FROM Visit v;');
	mysqli_close($sql);
?>
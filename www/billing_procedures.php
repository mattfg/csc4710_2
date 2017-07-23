<?php
	require '_query.php';
	require '_table.php';
	table('SELECT DISTINCT p.name, p.Id, p.cost FROM MedicalProcedure p;');
	mysqli_close($sql);
?>
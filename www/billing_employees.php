<?php
	require '_query.php';
	require '_table.php';
	table(
		'SELECT p.name, p.phone, s.TaxId
	FROM Staff s
		INNER JOIN Patient p on p.Id=s.asPatient'
	);
	mysqli_close($sql);
?>
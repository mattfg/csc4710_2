<?php
	require '_query.php';
	require '_table.php';

	$bill=getP('bill');
	table("SELECT * FROM Bill WHERE Id=$bill;");
	table("SELECT * FROM BillCharge WHERE bill=$bill;");
	mysqli_close($sql);
?>
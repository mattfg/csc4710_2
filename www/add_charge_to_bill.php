<?php
	require '_query.php';
	require '_table.php';

	$bill=getP('bill');
	$type=getP('chargeType');
	$amount=getP('amount');
	$date='FROM_UNIXTIME('.date_timestamp_get(date_create_from_format('Y-m-d', getP('date'))).')';
	$str = "INSERT INTO BillCharge (bill, type, date, amount) VALUES ('$bill', '$type', $date, '$amount');";
	query($str);
	query("UPDATE Bill SET totalAmount=totalAmount+$amount WHERE Id=$bill;");
	table("SELECT * FROM Bill WHERE Id=$bill;");
	table("SELECT * FROM BillCharge WHERE bill=$bill;");
	mysqli_close($sql);
?>
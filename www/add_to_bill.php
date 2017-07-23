<?php
	require '_query.php';
	require '_table.php';

	$patient=getP('patient');
	$visit=getP('visit');
	$invoice=getP('invoice');
	$date='FROM_UNIXTIME('.date_timestamp_get(date_create_from_format('Y-m-d', getP('date'))).')';
	$str = "INSERT INTO Bill (patient, forVisit, invoiceNo, totalAmount, paidAmount, dueDate, issueDate) VALUES ($patient, $visit, $invoice, 0, 0, $date, CURRENT_DATE);";
	query($str);
	table("SELECT * FROM Bill ORDER BY Id DESC LIMIT 1");
	mysqli_close($sql);
?>
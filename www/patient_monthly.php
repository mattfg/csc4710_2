<a href="/">Home</a><br>
<?php
	require '_query.php';
	require '_table.php';
	table('SELECT p.Id, p.name, b.Id, b.totalAmount, b.paidAmount, bc.Id, bc.type, bc.amount
	FROM BILL b
		INNER JOIN Patient p ON p.Id = b.patient
		INNER JOIN BillCharge bc ON b.Id = bc.bill
	WHERE b.totalAmount <> b.paidAmount
		AND DayOfYear(b.dueDate) <= DayOfYear(CURRENT_DATE)
		AND Year(b.dueDate) <= Year(CURRENT_DATE)
	ORDER BY p.name, b.id, bc.id'
	);
	mysqli_close($sql);
?>
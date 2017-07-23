<a href="/">Home</a><br>
<h1>You maniacs! You blew it up!</h1>
<p style="font-family: monospace;">
<?php
	require '_rebuild.php';

	showRebuild();

	query('DROP TABLE IF EXISTS `appointment`, `assignment`, `bill`, `billcharge`, `diagnosis`, `drug`, `druginteraction`, `drugprescription`, `drugsideeffects`, `employeetype`, `hoursopen`, `insurancecompany`, `insurancepolicy`, `medicalprocedure`, `patient`, `payment`, `prescription`, `prescriptionfill`, `referralprescription`, `room`, `roomcondition`, `roomtype`, `severity`, `staff`, `staffshift`, `symptom`, `testprescription`, `visit`, `visitresult`;'
	);
?>
</p>
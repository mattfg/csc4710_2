<a href="/">Home</a><br>
<style>
.t {width:100%;}
.tt {width:20%;}
</style>
<br>
<?php require '_query.php';	require '_table.php';?>
<h2>Clinic Name</h2>
<h3>Clinic Address, 555-5555</h3>
<table class='t' style='width:100%'>
<tr>
<td><h3><a href="/billing_employees.php">Employee Information</a></h3></td>
<td><h3><a href="/billing_procedures.php">Procedures</a></h3></td>
<td><h3><a href="/billing_visit_types.php">Visit Types</a></h3></td>
<td><h3><a href="/billing_diagnoses.php">Diagnoses</a></h3></td>
</tr>
</table>
<h1>View Bill</h1>
<form id='viewBill' method='POST' action="/view_bill.php">
<table class='t' style='width:100%'>
<tr>
	<td class='tt'><p>Patient ID</p></td>
	<td class='tt'><input class='t' type="number" name="bill" value=<?php getP('id') ?>></td>
	<td class='tt'><input class='t' type="submit" value="Go"></td>
</tr>
</table>
</form>
<h1>Add Bill</h1>
<form id='addBill' method='POST' action="/add_to_bill.php">
<table class='t' style='width:100%'>
<tr>
	<td class='tt'><p>Patient ID</p></td>
	<td class='tt'><input class='t' type="number" name="patient" value=<?php getP('id') ?>></td>
	<td class='tt'><p>Visit ID</p></td>
	<td class='tt'><input class='t' type="number" name="visit"></td>
</tr>
<tr>
	<td class='tt'><p>Invoice Number</p></td>
	<td class='tt'><input class='t' type="number" name="invoice"></td>
	<td class='tt'><p class='t'>Due Date: (format: e.g. <?php echo "'".date('Y-m-d')."'"; ?>)</p></td>
	<td class='tt'><input class='t' type="text" name="date" value=<?php echo "'".date('Y-m-d')."'"?>></td>
</tr>
<tr>
	<td class='tt'><input class='t' type="submit" value="Go"></td>
</tr>
</table>
</form>
<h1>Add Charge to Bill</h1>
<form id='addBill' method='POST' action="/add_charge_to_bill.php">
<table class='t' style='width:100%'>
<tr>
	<td class='tt'><p>Bill ID</p></td>
	<td class='tt'><input class='t' type="number" name="bill" value=<?php getP('id') ?>></td>
	<td class='tt'><p>Type of Charge</p></td>
	<td class='tt'><input class='t' type="text" name="chargeType"></td>
</tr>
<tr>
	<td class='tt'><p>Amount</p></td>
	<td class='tt'><input class='t' type="number" name="amount"></td>
	<td class='tt'><p class='t'>Date Charged (format: e.g. <?php echo "'".date('Y-m-d')."'"; ?>)</p></td>
	<td class='tt'><input class='t' type="text" name="date" value=<?php echo "'".date('Y-m-d')."'"?>></td>
</tr>
<tr>
	<td class='tt'><input class='t' type="submit" value="Go"></td>
</tr>
</table>
</form>
<?php
	mysqli_close($sql);
?>
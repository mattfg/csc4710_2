<span style='font-weight: bold; font-size: 200%'>
	<p>Clinic Manager
	<span style='font-size: 80%; font-weight: normal; font-style: italic;'>
	(for CSC 4710) by
	</span>
	<a href='/credits_matt.html'>Matt Gaertner</a> and <a href='/credits_mohsin.html'>Mohsin Shah</a>
	</p>
</span><br>
<h1>Select (Search)/Insert/Update/Delete</h1>
	<form id="relations" method="POST" action="/show_table.php">
		<table style='text-align: left; padding: 4px; width: 100%;'>
		<tr>
			<td colspan=3>
			<select style='width:100%' required name="operation">
				<option value="Select">Select</option>
				<option value="Insert">Insert</option>
				<option value="Update">Update</option>
				<option value="Delete">Delete</option>
			</select>
			</td>
			<td colspan=3>
			<select style='width:100%' required name="table">
				<option value="Appointment">Appointment</option>
				<option value="Assignment">Assignment</option>
				<option value="Bill">Bill</option>
				<option value="BillCharge">BillCharge</option>
				<option value="Diagnosis">Diagnosis</option>
				<option value="Drug">Drug</option>
				<option value="DrugInteraction">DrugInteraction</option>
				<option value="DrugPrescription">DrugPrescription</option>
				<option value="DrugSideEffects">DrugSideEffects</option>
				<option value="EmployeeType">EmployeeType</option>
				<option value="HoursOpen">HoursOpen</option>
				<option value="InsuranceCompany">InsuranceCompany</option>
				<option value="InsurancePolicy">InsurancePolicy</option>
				<option value="MedicalProcedure">MedicalProcedure</option>
				<option value="Patient">Patient</option>
				<option value="Payment">Payment</option>
				<option value="Prescription">Prescription</option>
				<option value="PrescriptionFill">PrescriptionFill</option>
				<option value="ReferralPrescription">ReferralPrescription</option>
				<option value="Room">Room</option>
				<option value="RoomCondition">RoomCondition</option>
				<option value="RoomType">RoomType</option>
				<option value="Severity">Severity</option>
				<option value="Staff">Staff</option>
				<option value="StaffShift">StaffShift</option>
				<option value="Symptom">Symptom</option>
				<option value="TestPrescription">TestPrescription</option>
				<option value="Visit">Visit</option>
				<option value="VisitResult">VisitResult</option>
			</select>
			</td>
		</tr>
		<tr>
			<td colspan=3><p>For select or insert, enter a (tuple,of,columns). For update, enter a SET='OF',VALUES=''. For delete, leave blank.</p></td>
			<td colspan=3><p>For insert, enter a ('set','of','tuples'),('to','be','inserted'). For select, update or delete, enter a COND=ITION</p></td>
		</tr>
		<tr>
			<td colspan=3>
			<input style='width:100%' type="text" name="p1">
			</td>
			<td colspan=3>
			<input style='width:100%' type="text" name="p2">
			</td>
		</tr>
		</table>
		<input style='display:block; margin:auto; width:30%' type="submit" value="Run Query">
	</form>
<div>
	<h1>Reports</h1>
	<table style='text-align: left; padding: 4px; border-collapse: collapse; width: 100%;'>
		<tr style="border: 1px solid black;">
			<td><a href="/weekly_coverage_schedule.php">Weekly Coverage Schedule</a></td>
			<td><a href="/daily_master_schedule.php">Daily Master Schedule</a></td>
			<td><a href="/individual_practitioner_schedule.php">Individual Practitioner's Daily Schedule</a></td>
		</tr>
		<tr style="border: 1px solid black;">
			<td><a href="/physician_statement.php">Physician's Statement for Insurance Forms</a></td>
			<td><a href="/patient_monthly.php">Patient Monthly Statement</a></td>
			<td><a href="/prescription_label.php">Prescription Label and Receipt</a></td>
		</tr>
		<tr style="border: 1px solid black;">
			<td><a href="/lab_log.php">Daily Laboratory Log</a></td>
			<td><a href="/operating_room_schedule.php">Operating Room Schedule</a></td>
			<td><a href="/operating_room_log.php">Operating Room Log</a></td>
		</tr>
		<tr style="border: 1px solid black;">
			<td><a href="/monthly_activity.php">Monthly Activity Report</a></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>
<br>
<div>
	<h1>Custom Query</h1>
	<form id='customQuery' method="post" action="/query.php">
		<textarea name="query" rows="14" style='width:100%'></textarea><br>
		<input style='display:block; margin:auto; width:30%'  type="submit" value="Run Query">
	</form>
</div>
<a href="/dropAll.php">Clear Database</a><br>
<a href="/create.php">Populate Database</a><br>
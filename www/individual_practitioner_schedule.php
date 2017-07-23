<a href="/">Home</a><br>
<style>
.t {width:100%;}
.tt {width:20%;}
</style>
<form id='params' method='POST' action='/individual_practitioner_schedule2.php'>
<table class='t' style='width:100%'>
<tr>
<td class='tt'><p class='t'>Practitioner ID</p></td>
<td class='tt'><input class='t' type="numeric" name="id"></td>
<td class='tt'><p class='t'>Date e.g. <?php echo "'".date('Y-m-d')."'"?></p></td>
<td class='tt'><input class='t' type="text" name="date" value=<?php echo "'".date('Y-m-d')."'"?>></td>
<td class='tt'><input class='t' type="submit" value="Go"></td>
</tr>
</table>
</form>
<a href="/">Home</a><br>
<style>
tr:nth-child(even) {
  background: #eee;
}
</style>
<?php
  require '_query.php';
  require '_table.php';
  
  $table = getP('table');
  $op = getP('operation');
  if($op === 'Select') {
    $cols = getP('p1');
    $cond = getP('p2');
    table("SELECT ".$cols." FROM ".$table.' WHERE '.$cond.';');
  }
  elseif($op === 'Insert') {
    $cols = getP('p1');
    $cond = getP('p2');
    query("INSERT INTO ".$table.' '.$cols." VALUES ".$cond.';', 'noop',
      function($sad) {
        die('Query failed: <code>'.$sad.'</code>');
      }
    );
    table('SELECT * FROM '.$table.';');
  }
  elseif($op === 'Update') {
    $cols = getP('p1');
    $cond = getP('p2');
    query("UPDATE `".$table.'` SET '.$cols." WHERE ".$cond.';', 'noop',
      function($sad) {
        die('Query failed: <code>'.$sad.'</code>');
      }
    );
    table('SELECT * FROM '.$table.';');
  }
  elseif($op === 'Delete') {
    $cols = getP('p1');
    $cond = getP('p2');
    query("DELETE FROM ".$table." WHERE ".$cond.";", 'noop',
      function($sad) {
        die('Query failed: <code>'.$sad.'</code>');
      }
    );
    table('SELECT * FROM '.$table.';');
  }
  mysqli_close($sql);
?>
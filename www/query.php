<a href="/">Home</a><br>
<style>
tr:nth-child(even) {
  background: #eee;
}
</style>
<?php
  require '_query.php';
  require '_table.php';
  
  $command = "NO_COMMAND_SET";
  if(array_key_exists("query", $_POST)) {
    $command = $_POST["query"];
    printf('<code>%s</code>', htmlEscape($command));
    table($command);
  } else {
    die("No query present in POST!");
  }
  mysqli_close($sql);
?>
<?php
  function table($command) {
    $rownumber=0;
    $tableModel=[];
    $queryResult = query($command,
      function($row) use (&$rownumber, &$tableModel) {
        $tableModel[$rownumber++] = $row;
      },
      function($badnews) use($command) {
        die('The following query failed:<br><code>'.htmlEscape($command).'</code>because<br><code>'.htmlEscape($badnews).'</code>');
      }
    );
    printf('<table style="text-align: left; padding: 4px; border-collapse: collapse; width: 100%%;">');
    printf('<tr>');
    for($i = 0; $i < mysqli_num_fields($queryResult); $i++) {
      $field = mysqli_fetch_field_direct($queryResult, $i);
      $name = $field->name;
      $table = $field->table;
      printf('<th>%s.%s</th>', htmlEscape($table), htmlEscape($name));
    }
    printf('</tr>');
    foreach ($tableModel as $i => $row) {
      printf('<tr style=\"border: 1px solid black;\">');
      foreach($row as $j => $elem) {
        printf('<td style=\"padding: 6px;\">%s</td>', htmlEscape($elem));
      }
      printf('</tr>');
    }
    printf('</table>');
    mysqli_free_result($queryResult);
  }
?>
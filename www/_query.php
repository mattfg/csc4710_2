<?php
function sqlEscape($str) {
  global $sql;
  return mysqli_real_escape_string($sql, $str);
}

function htmlEscape($str) {
  return htmlspecialchars($str);
}

function printHtml($str) {
  print(htmlEscape($str));
}

function printSql($str) {
  print(sqlEscape($str));
}

function noop(...$args) {}

function getP($str) {
  if(array_key_exists($str, $_POST)) {
    return $_POST[$str];
  } else {
    die("Required $str was not found in _POST");
  }
}

$servername = "localhost";
$db = "csc4710";
$sql = mysqli_connect($servername, "root", "", $db);
if(mysqli_connect_errno()) {
  die("Connection failed: ".mysqli_connect_error());
}

function multiquery($query)
{
  global $sql;
  mysqli_multi_query($sql, $query) or die(mysqli_error($sql));
}
function query($query, $fn='noop', $onBadNews='noop')
{
  global $sql;
  $result = mysqli_query($sql, $query);
  if ($result === FALSE) {
    $err = mysqli_error($sql);
    call_user_func($onBadNews, $err);
    printf("Error: %s\n", $err);
    exit();
  } else {
    if($result === TRUE) return TRUE;
    else {
      while ($row = mysqli_fetch_row($result)) {
        call_user_func($fn, $row);
      }
      return $result;
    }
  }
}
?>
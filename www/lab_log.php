<?php require '../../_query.php'; ?>

<?php


$str = "select  p.name as 'Name', tlt.`name` as  `Test Name`, tl.`results` as `Test Results`,tl.`testDate` as `Date`,  tl.`testTime` as `Time`
from testlog tl
 inner join TestLogType tlt on tl.testLogTypeID = tlt.testLogTypeID
inner join patient p on p.id = tl.patientIDl;";
$command =sqlEscape($str);



$rownumber=0;
$tableModel=[];
$queryResult = query($command,
    function($row){
        global $rownumber, $tableModel;
        $tableModel[$rownumber++] = $row;
    }
);





?>
<html>
<head>
    <title>Daily Laboratory Log</title>


</head>
<body>

<h1>Daily Laboratory Log</h1>
<table style='text-align: left; padding: 4px; border-collapse: collapse; width: 100%;'>
    <tr>
        <?php
        for($i = 0; $i < mysqli_num_fields($queryResult); $i++) {
            $field = mysqli_fetch_field_direct($queryResult, $i);
            $name = $field->name;
            $table = $field->table;
            printf('<th>%s.%s</th>', htmlEscape($table), htmlEscape($name));
        }
        ?>
    </tr>
    <?php
    foreach ($tableModel as $i => $row) {
        printf('<tr style="border: 1px solid black;">');
        foreach($row as $j => $elem) {
            printf(
                '<td style="padding: 6px;">'
                .htmlEscape($elem).
                '</td>'
            );
        }
        printf('</tr>');
    }
    ?>
</table>
</body>


</html>









<?php mysqli_free_result($queryResult); mysqli_close($sql); ?>
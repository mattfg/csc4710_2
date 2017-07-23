<?php require '../../_query.php'; ?>

<?php


$str = "select p.name as `Patient Name`, mp.name as `Operation Name`,
 r.floor +' '+ r.postedRoomNumber as `Room Number`, mp.mpdate as 'Date', mp.mpTime as 'Time',  st.fullname as `Lead Name` from medicalprocedure mp
inner join patient p on p.Id = mp.patient
inner join room r on r.Id = mp.performedin
inner join staff st on st.Id = mp.leadSurgon
where isSurgery = true
and mp.mpdate is null;" ; //parameter from form needes to be added
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
        <title>Operating Room Schedule</title>


    </head>
    <body>

    <h1>Operating Room Schedule</h1>
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
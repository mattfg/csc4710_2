<?php
	require '_query.php';
	function showRebuild() {
		query('SHOW TABLES',
			function($row) {
				$table=$row[0];
				printf("DROP TABLE IF EXISTS %s;<br>", $table);
				query('SHOW CREATE TABLE '.$table.';', function($crow) {
					printf("%s<br>;", $crow[1]);
				});
				printf("<br>INSERT INTO $table VALUES <br>");
				$rown=0;
				$rows=[];
				query("SELECT * FROM $table;", function($crow)
					use (&$rows, &$rown)
				{
					$crow=array_map(function($x){
						$result=sqlEscape($x);
						return $result;
					}, $crow);
					$rows[$rown++]="   ('".implode("','", $crow)."')";
				});
				printf("%s;<br>", implode(',<br>', $rows));
			}
		);
	}
?>
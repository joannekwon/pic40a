#!/usr/local/bin/php -d display_errors=STDOUT

<?php
	print('<?xml version = "1.0" encoding="utf-8"?>');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">

      <head>
		<title>Calendar</title> 
      	<link rel="stylesheet" type="text/css" href="calendar.css"/>
      </head>

      <body>
      	<?php
            date_default_timezone_set('America/Los_Angeles'); 
      		$clock_time = time();
			$dates = date("D, F j, Y, g:i a",$clock_time);
			$hours_to_show = 12;
            ?>
			
        <?php
			function get_hour_string($t){
				$table_title = "";
				$time = date("g", $t);
				$clock = date("a",$t);
				$table_title = "$time:00$clock";
				return $table_title;
			}
		?>
		
      	<div class = "container">
      		<h1>Apartment Schedule for
      			<?php 
      				print "$dates"; 
      			?> 
      		</h1>
      		<table id = "ttable">
      			<?php
      				print "<tr> \n";
      				print "<th class = 'hr'></th> 
      				<th class = 'title'>Lily</th>
      				<th class = 'title'>Jennifer</th>
      				<th class = 'title'>Joanne</th> \n";
      				print "</tr> \n";

      				for ($i = 0; $i <= $hours_to_show; $i++) {
      					$hour_string = get_hour_string($clock_time + $i * 3600);
      					if ($i % 2 == 0){
      						print "<tr class = 'row1'> \n";
      						print "<td class = 'hr'>$hour_string</td> 
      						<td> </td> 
      						<td> </td> 
      						<td></td> \n";
      						print "</tr> \n";
						}
						else {
							print "<tr class = 'row2'> \n";
							print "<td class = 'hr'>$hour_string</td> 
							<td> </td> 
							<td> </td> 
							<td> </td> \n";
							print "</tr> \n";
						}
					}
				?>
			</table>
		</div>
	</body>
</html>

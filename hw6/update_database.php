#!/usr/local/bin/php -d display_errors=STDOUT

<?php
print('<?xml version = "1.0" encoding="utf-8"?> ');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">

	<head>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"/>
		<title>Calendar</title>
	</head>

	<body>
		<?php
			date_default_timezone_set('America/Los_Angeles');

			$database = "dbjoannekwon.db";

			try {
				$db = new SQLite3($database);
			}
			catch (Exception $exception) {
				echo '<p>There was an error connecting to the databse!</p>';
				if($db) {
					echo $exception->getMessage();
				}
			}

			$table = "event_table";
			$field1 = "person";
			$field2 = "time";
			$field3 = "event_title";
			$field4 = "event_message";

			$sql = "CREATE TABLE IF NOT EXISTS $table (
			$field1 varchar(200),
			$field2 int(12),
			$field3 varchar(300),
			$field4 varchar(300)
			)";
			$result = $db->query($sql);

			$date = $_POST["date"];
			$date_array = explode("-",$date);

			$hour = $_POST["mktime"];
			$hour_array = explode(":",$hour);

			$mktime = mktime($hour_array[0],0,0,$date_array[0],$date_array[1],$date_array[2]);

			$person = $_POST['person'];

			$event_title = $_POST["event_title"];

			$event_message = $_POST["event_message"];

			$sql = "INSERT INTO $table ($field1,$field2,$field3,$field4) VALUES ('$person','$mktime','$event_title','$event_message')";
			$result = $db->query($sql);
			
			if ($result) {
				print "<strong>Database successfully updated!</strong>";
				print "<br/>";
				print '<a href="http://pic.ucla.edu/~joannekwon/calendar2.php">Click here to see 
the calendar</a>';
			}
			else {
				print "<strong>Database didn't successfully update.</strong>";
			}
		?>
	</body>
</html>

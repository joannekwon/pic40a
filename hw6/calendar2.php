#!/usr/local/bin/php -d display_errors=STDOUT
<?php
	print('<?xml version = "1.0" encoding="utf-8"?>');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">

    <head>
        <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
		<title>Calendar</title> 
      	<link rel="stylesheet" type="text/css" href="calendar.css"/>
    </head>

    <body>
	<div class = "container">
      	<?php
            date_default_timezone_set('America/Los_Angeles');
		
		function get_hour_string($tmestp){
        		$table_title = "";
        		$times = date("g", $tmestp);
        		$clock = date("a",$tmestp);
        		$table_title = "$times:00$clock";
        		return $table_title;
        	}

        	function get_timestamp ($tmestp) {
        		$day = date('m-d-Y', $tmestp);
			$aday = explode("-", $day);
        		$hour = date('G', $tmestp);
               		$ahour = explode(".", $hour);
               		$tmestps = mktime($ahour[0],0,0,$aday[0],$aday[1],$aday[2]);
               		return $tmestps;
            	}

            function get_event($person, $timestamp) {
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

                $sql = "SELECT * FROM $table";
                $result = $db->query($sql);
		
		$multi = "";
		$count = 0;

                while ($record = $result->fetchArray()) {
                    if ($record[$field1] == $person && $record[$field2] == $timestamp) {
                        $count++;
                            if ($count == 1) {
                                $multi = "$record[$field3]: $record[$field4]";
                            }
			else {
				$multi = "$multi<br/>$record[$field3]: $record[$field4]";
			}
                    }
                }
                return $multi;
            }

            $button = false;
            $uts = $_GET["time_stamp"];
            $change = 3600 * 12;

            if ($uts > 0) {
                $button = true;
                echo "<h1>Apartment Schedule for " . date('D, F j, Y, g:i a', $uts) . "<h1>";
                $previous = $uts - $change;
                $next = $uts + $change;
            }
    		else {
			print "<h1>Apartment Schedule for " . date('D, M j, Y, g:i a') . "</h1>";
			$previous = time() - $change;
			$next = time() + $change;
		}

        print "<table id = 'ttable'>";
                print "<tr>";
                    print "<th class= 'hr'></th>
                        <th class = 'title'>Lily</th>
                        <th class = 'title'>Jennifer</th>
                        <th class = 'title'>Joanne</th> \n";
                    print "</tr> \n";

		$hours = 12;

                    for ($i = 0; $i <= $hours; $i++) {
                        $chgtme = $i * 3600;

                        if ($button) {
                            $tmestp = $uts + $chgtme;
                        }
                        else {
                            $tmestp = time() + $chgtme;
                        }

                        $ghs = get_hour_string($tmestp);
                        $tmestps = get_timestamp($tmestp); 

                        if ($i % 2 == 0) {
                            print "<tr class = 'row1'>";
                        }
                        else {
                            print "<tr class = 'row2'>";
                        }

                        print "<td class = 'hr'>" . $ghs . "</td>";

                        print "<td>";
                        print get_event("Lily", $tmestps);
                        print "</td>";

                        print "<td>";
                        print get_event("Jennifer", $tmestps);
                        print "</td>";

                        print "<td>";
                        print get_event("Joanne", $tmestps);
                        print "</td>";
                        print "</tr>";
                    }
		print "</table>";

            print "<div>";
            	print "<form id = 'previous' method ='get' action = 'calendar2.php'>";
                	print "<p><input type = 'hidden' name = 'time_stamp' value = '$previous'/>";
                	print "<input type = 'submit' value = 'Previous' /></p>";
            	print "</form>";

            	print "<form id = 'today' method ='get' action = 'calendar2.php'>";
             	   print "<p><input type = 'submit' value='Now'/></p>";
            	print "</form>";

            	print "<form id = 'next' method ='get' action = 'calendar2.php'>";
                	print "<p><input type = 'hidden' name = 'time_stamp' value = '$next'/>";
                	print "<input type = 'submit' value = 'Next' /></p>";
            	print "</form>";
        	print "</div>";
		?>
		</div>
	</body>
</html>

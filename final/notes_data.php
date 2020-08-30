#!/usr/local/bin/php -d display_Errors=STDOUT
<?php
print('<?xml version = "1.0" encoding="utf-8"?>');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">

<head>
   <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"/>
   <title>Notes Data</title>
   <link rel="stylesheet" type="text/css" href="notes_data.css"/>
</head>

<body>
   <div class='container'>
   <?php
   date_default_timezone_set('America/Los_Angeles');
   $database="invitation.db";
   try {
      $db = new SQLITE3($database);
   }
   catch (Exception $exception) {
      echo '<p>There as an error connecting to the database!</p>';
      if($db) {
         echo $exception->getMessage();
      }
   }

   $table = "notes";
   $field1 = "new_note";
   $field2 = "show_time";

   $sql = "CREATE TABLE IF NOT EXISTS $table (
   $field1 varchar(1000),
   $field2 int(100)
   )";
   $result = $db->query($sql);

   $done_note = $_GET['new_note'];
   $new_note = str_replace("'", "''", $done_note);
   $timestamp = time();
   $show_time = date("m-d-Y | g:iA", $timestamp);

   $sql = "INSERT INTO $table ($field1, $field2) VALUES ('$new_note', '$show_time')";
   $result = $db->query($sql);

   $sql = "SELECT * FROM $table ORDER BY $field2 DESC";
   $result = $db->query($sql);
  
   print "<h1>Notes</h1>";

      print "<table>";
      print "<tr>";
      print "<th>Notes</th>";
      print "<th>Time of Submission</th>";
      print "</tr>";

   while($record = $result->fetchArray()) {
      print "<tr>";
      print "<td>" . $record[$field1] . "</td>";
      print "<td>" . $record[$field2] . "</td>";
      print "</tr>";
   }  
   print "</table>";
   
   print "<a href='one.html'><button class='button'>Return to the main page</button></a>";
   print "<a href='responses.html'><button class='button'>See who has responded</button></a>";
   print "<a href='notes.html'><button class='button'>Write another note</button></a>";
      
   ?>
</body>
</html>

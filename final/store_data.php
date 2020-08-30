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
                <title>Form</title>
                <link rel="stylesheet" type="text/css" href="store_data.css"/>
        </head>
                        
        <body>
                <div id="dem">
                <?php
                        date_default_timezone_set('America/Los_Angeles');
                        
                        $database = "invitation.db";
                        
                        try {
                                $db = new SQLite3($database);
                        }
                        catch (Exception $exception) {
                                echo '<p>There was an error connecting to the databse!</p>';
                                if($db) {
                                        echo $exception->getMessage();
                                }
                        }
                        
                        $table = "invite";
                        $field1 = "name";
                        $field2 = "attend";
                        $field3 = "dish";
                        $field4 = "restrictions";
                        $field5 = "time";
                        
                        $sql = "CREATE TABLE IF NOT EXISTS $table (
                        $field1 varchar(50),
                        $field2 varchar(50),
                        $field3 varchar(50),
                        $field4 varchar(500),
                        $field5 int(50)
                        )";
                        $result = $db->query($sql);

                        $time = time();
$name = $_GET['name'];
                        $attend = $_GET['attend'];
                        $dish = $_GET['dish'];
                        $restrictions = $_GET['restrictions'];
 
                        $sql = "INSERT INTO $table ($field1, $field2, $field3, $field4, $field5) VALUES ('$name', '$attend', '$dish', '$restrictions', '$time')";
                        $result = $db->query($sql);
      
                        $sql = "SELECT * FROM $table";
                        $result = $db->query($sql);
                
                        print '<body>';
                        print '<div class="container">';
                        print '<p>Thanks for filling out the form!</p>';
                        print '<a href="responses.html"><button class="button">Click here to see who has responded</button></a>';
?>
    </div>
  </body>
</html>

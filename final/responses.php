#!/usr/local/bin/php -d display_errors=STDOUT
<?php
print('<?xml version = "1.0" encoding="utf-8"?> ');
?>

<?php
$database = "invitation.db";
try{
     $db = new SQLite3($database);
}
catch (Exception $exception)
{
    echo '<p>There was an error connecting to the database!</p>';
    if ($db) {
        echo $exception->getMessage();
    }
}
        $table = "invite";
    $field1 = "name";
    $field2 = "attend";
    $field3 = "dish";
    $field4 = "restrictions";
    $field5 = "time";

        $sql = "SELECT * FROM $table ORDER BY $field5 DESC";
        $result = $db->query($sql);

    while ($record=$result->fetchArray()) {
        print $record[$field1] . "/";
        print $record[$field2] . "/";
        print $record[$field3] . "/";
        print $record[$field4] . "/";
        print $record[$field5] . "/,";
       }
?>
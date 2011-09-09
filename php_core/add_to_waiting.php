<?php

require_once("connect_watson.php");

$bnumber = $_POST['bnumber']; //clean these
$reason = $_POST['reason'];
$comments = $_POST['comments'];

//write code to prevent sql injection....believe its a mysqli object
$query = "INSERT INTO waiting (bnumber, reason, comments) VALUES ('$bnumber', '$reason', '$comments')";

mysql_query($query) or die("Error Inserting");

mysql_close($db);
?>

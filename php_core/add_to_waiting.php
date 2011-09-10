<?php

require_once("connect_watson.php");

if(isset($_POST['bnumber']) && isset($_POST['initial_comments']) && isset($_POST['final_comments'])){
	$reason = $_POST['reason'];
	$bnumber = $_POST['bnumber']; //clean these
	$comments = $_POST['comments'];
}
else {



}

$query = "INSERT INTO waiting (bnumber, reason, comments)";
$query .= sprintf(" VALUES ('%s', '%s', '%s')", mysql_real_escape_string($bnumber),
		mysql_real_escape_string($reason), mysql_real_escape_string($comments));


mysql_query($query) or die("Error Inserting");

mysql_close($db);
?>

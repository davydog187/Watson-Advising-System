<?php

require_once("connect_watson.php");

if(isset($_POST['bnumber']) && isset($_POST['reason']) && isset($_POST['comments'])){
	$reason = $_POST['reason'];
	$bnumber = $_POST['bnumber'];
	$comments = $_POST['comments'];

	$query = "INSERT INTO waiting (bnumber, reason, comments)";
	$query .= sprintf(" VALUES ('%s', '%s', '%s')", mysql_real_escape_string($bnumber),
		mysql_real_escape_string($reason), mysql_real_escape_string($comments));

	mysql_query($query) or die("Error Inserting");
	mysql_close($db);

}
else {
	//error


}

?>

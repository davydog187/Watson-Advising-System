<?php
if(isset($_POST['bnumber']) && isset($_POST['initial_comments']) && isset($_POST['final_comments']) && isset($_POST['reason']) && isset($_POST['rectime'])){

	require_once("./connect_watson.php");
	$bnumber = trim($_POST['bnumber']);
	$reason = trim($_POST['reason']);
	$initial = trim($_POST['initial_comments']);
	$final = trim($_POST['final_comments']);
	$rectime = trim($_POST['rectime']);



	//Remove from waiting
	$remove_query = sprintf("DELETE FROM waiting WHERE rectime='%s'", mysql_real_escape_string($rectime));
	mysql_query($remove_query) or die("Error deleting $rectime");

	//Insert into finished queue
	$query = "INSERT INTO finished (bnumber, reason, initial_comments, final_comments, rectime)";
	$query .= sprintf(" VALUES ('%s', '%s', '%s', '%s', '%s')",
		mysql_real_escape_string($bnumber),
		mysql_real_escape_string($reason),
		mysql_real_escape_string($initial),
		mysql_real_escape_string($final),
		mysql_real_escape_string($rectime));

	mysql_query($query) or die("<br />Error Inserting");
	mysql_close($db);

	header("Location: ../main_queue.php");

}

else{
	header("Location: ../index.php");
}




?>

<?php
	require_once("./connect_watson.php");
	if(isset($_POST['bnumber']) && isset($_POST['initial_comments']) && isset($_POST['final_comments'])){
		$bnumber = $_POST['bnumber'];
		$initial = $_POST['initial_comments'];
		$final = $_POST['final_comments'];
	}

	else{
		header("Location: ../index.php");
	}

	echo "$bnumber and $initial and $final";



?>

<?php

if(isset($_POST['date']) && isset($_POST['bnumber']) && isset($_POST['fname'])
	&& isset($_POST['lname']) && isset($_POST['program']) && isset($_POST['reason'])){

		require_once("connect_watson.php");

		$date = mysql_real_escape_string($_POST['date']);
		$bnumber = mysql_real_escape_string($_POST['bnumber']);
		$fname = mysql_real_escape_string($_POST['fname']);
		$lname = mysql_real_escape_string($_POST['lname']);
		$program = mysql_real_escape_string($_POST['program']);
		$reason = mysql_real_escape_string($_POST['reason']);

		$query = "SELECT * FROM finished f, students s WHERE f.bnumber=s.bnumber";

		if($fname != ""){
			$query .= " and firstname like '$fname%'";
		}
		if($lname != ""){
				$query .= " and lastname like '$lname%'";
		}
		if($program != ""){
				$query .= " and major like '$program%'";
		}
		if($date != ""){
			//Rebuild date to right format
			$date_arr = date_parse_from_format("m/d/Y", $date);
			$date = date("Y-m-d", mktime(0,0,0,$date_arr['month'],$date_arr['day'], $date_arr['year']));
			$query .= " and rectime LIKE '$date%'";
		}
		if($bnumber != ""){
			$query .= " and s.bnumber='$bnumber'";
		}
		if($reason != ""){
			$query .= " and reason='$reason'";

		}
		$result = mysql_query($query);

		$students_found = array("error" => false, "count" => 0, "students" =>array());

		if($result && mysql_num_rows($result)>0){
			while($row = mysql_fetch_assoc($result)){
					$students_found["students"][] = $row;
					$students_found["count"]++;
				}
		}
		else{
			//return error
			$students_found["error"] = "No matches";
		}
		echo json_encode($students_found);
		mysql_close($db);

}
else{
  $students_found = array("error" => "Missing information!");
	echo json_encode($students_found);

}

?>

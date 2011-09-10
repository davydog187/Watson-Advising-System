<?php

require_once("connect_watson.php");

$bnumber = $_POST['bnumber']; //need to write code to prevent sql injection
$fname = $_POST['fname'];
$lname = $_POST['lname'];

if($fname=="" && $lname=="" && $bnumber==""){
  exit(1);
 }
$query = "SELECT bnumber, firstname, lastname FROM students WHERE ";
if($bnumber!=""){
  $query .= sprintf("bnumber='%s'", mysql_real_escape_string($bnumber));
 }
elseif($fname==""){
  $query .= sprintf("lastname LIKE '%s%%'", mysql_real_escape_string($lname));
}
elseif($lname==""){
  $query .= sprintf("firstname LIKE '%s%%'", mysql_real_escape_string($fname));
}else{
	$query .= sprintf("firstname LIKE '%s%%'AND lastname LIKE '%s%%'", mysql_real_escape_string($fname),
		mysql_real_escape_string($lname));
}

$result = mysql_query($query);

if($result && mysql_num_rows($result)>0){ //need to account for case with no results
  while($row = mysql_fetch_array($result)){
    echo "<input type='radio' name='select_student' id='".$row['bnumber']."' value='".$row['bnumber']."' />";
    echo "<label for='".$row['bnumber']."'>".$row['bnumber']." ".$row['lastname'].", ".$row['firstname']."<br /></label><br />";


  }
 }

mysql_close($db);
?>

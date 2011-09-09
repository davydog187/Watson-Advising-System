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
  $query .= "bnumber='".$bnumber."'";
 }
elseif($fname==""){
  $query .= "lastname LIKE'".$lname."%'";
}
elseif($lname==""){
  $query .= "firstname LIKE '".$fname."%'";
}else{
  $query .= "firstname LIKE '".$fname."%'AND lastname LIKE '".$lname."%'";
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

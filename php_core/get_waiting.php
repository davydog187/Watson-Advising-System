<?php

require_once("connect_watson.php");

$query = "SELECT * FROM waiting ORDER BY rectime ASC";

$waiters = mysql_query($query);

$student_arr = array();

if($waiters && mysql_num_rows($waiters)>0){
  $counter = 1;
  while($row = mysql_fetch_array($waiters)){
    $bnumber = $row['bnumber'];
    $student = mysql_query("SELECT * FROM students WHERE bnumber='$bnumber'");
    if($student){
      $studentdata = mysql_fetch_assoc($student);
      
      //keep inserting into a queue, then json_encode the queue and echo it
      $studentdata['rectime'] = $row['rectime'];
      $student_arr[] = $studentdata;
    }
    
  }

 }
echo json_encode($student_arr);

mysql_close($db);

?>




<?php

if(isset($_GET['bnumber']) && isset($_GET['firstname']) && isset($_GET['lastname'])
  && isset($_GET['email']) && isset($_GET['major']) && isset($_GET['year'])){
    $bnumber = trim($_GET['bnumber']);
    $firstname = trim($_GET['firstname']);
    $lastname = trim($_GET['lastname']);
    $year = trim($_GET['year']);
    $email = trim($_GET['email']);
    $major = trim($_GET['major']);

    require_once('./connect_watson.php');

    $check_query = sprintf("SELECT * FROM students where bnumber='%s'", mysql_real_escape_string($bnumber));
    $result = mysql_query($check_query);
    if(mysql_num_rows($result) == 1){
      //Update
      $update_query = sprintf("UPDATE students SET firstname='%s', lastname='%s', email='%s', year='%s', major='%s' WHERE bnumber='%s'",
        mysql_real_escape_string($firstname),
        mysql_real_escape_string($lastname),
        mysql_real_escape_string($email),
        mysql_real_escape_string($year),
        mysql_real_escape_string($major),
        mysql_real_escape_string($bnumber));
      mysql_query($update_query) or die("Error updating student <br />");
    }
    else{
      //Insert
      $update_query = sprintf("INSERT INTO students (bnumber, firstname, lastname, year, major, email)");
      $update_query .= sprintf(" VALUES('%s', '%s', '%s', '%s', '%s', '%s')",
        mysql_real_escape_string($bnumber),
        mysql_real_escape_string($firstname),
        mysql_real_escape_string($lastname),
        mysql_real_escape_string($year),
        mysql_real_escape_string($major),
        mysql_real_escape_string($email));
      mysql_query($update_query) or die("<br />Error inserting");
    }
		mysql_close($db);

		header("Location: ../index.php");
  }
else{
  //Don't do anything
  echo "Error...something bad happened";
}
?>

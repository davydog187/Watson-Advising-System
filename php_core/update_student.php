<?php
if(isset($_POST['bnumber']) && isset($_POST['firstname']) && isset($_POST['lastname'])
  && isset($_POST['email']) && isset($_POST['major']) && isset($_POST['year'])){
    $bnumber = trim($_POST['bnumber']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $year = trim($_POST['year']);
    $email = trim($_POST['email']);
    $major = trim($_POST['major']);

    require_once('./connect_watson.php');

    $check_query = sprintf("SELECT * FROM students where bnumber='%s'", mysql_real_escape_string($bnumber));
    $result = mysql_query($check_query);
    if(mysql_num_rows($result) == 1){
      //Update
      $update_query = sprintf("UPDATE students SET firstname='%s', SET lastname='%s', SET email='%s', SET year='%s', SET major='%s' WHERE bnumber='%s'",
        mysql_real_escape_string($firstname),
        mysql_real_escape_string($lastname),
        mysql_real_escape_string($email),
        mysql_real_escape_string($year),
        mysql_real_escape_string($major),
        mysql_real_escape_string($bnumber));
      echo $update_query;
      mysql_query($update_query) or die("Error updating student <br />");
    }
    else{
      //Insert
      $update_query = sprintf("INSERT INTO students (bnumber, firstname, lastname, year, major, email)");
      $update_query .= sprintf(" VALUES('%s', '%s', '%s', '%s', '%s', '%s')",
        mysql_real_escape_string($firstname),
        mysql_real_escape_string($lastname),
        mysql_real_escape_string($email),
        mysql_real_escape_string($major),
        mysql_real_escape_string($bnumber));
      echo $update_query;
      mysql_query($update_query) or die("<br />Error inserting");
    }
    mysql_close($db);
  }
else{
  //Don't do anything
  echo "Error...something bad happened";
}
?>

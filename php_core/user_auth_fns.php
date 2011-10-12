<?php
function login($username, $password) {
// check username and password with db
// if yes, return true
// else throw exception

  // connect to db
	require('connect_watson.php');

  // check if username is unique
  $query = sprintf("select * from user
                         where username='%s'
												 and passwd = sha1('%s')",
												 mysql_real_escape_string($username),
												 mysql_real_escape_string($password));
	$result = mysql_query($query);

  if (!$result) {
     throw new Exception('Could not log you in.');
  }

  if (mysql_num_rows($result)>0) {
     return true;
  } else {
     throw new Exception('Could not log you in.');
  }
}

function check_valid_user() {
// see if somebody is logged in and notify them if not
	if (!isset($_SESSION['valid_user']))  {
		header("Location: ./login.html");
  }
}
?>

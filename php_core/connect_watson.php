<?php

@ $db = mysql_connect("localhost", "root", "watson");
if(!$db){
  die('Could not connect: '.mysql_error());
}

mysql_select_db("Watson Advising", $db) or die(mysql_error());

?>

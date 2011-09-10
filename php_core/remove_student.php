<?php

require_once("connect_watson.php");

$rectime = $_POST['rectime'];

$query = sprintf("DELETE FROM waiting WHERE rectime='%s'" , mysql_real_escape_string($rectime));

mysql_query($query);//check for errors

mysql_close($db);


?>

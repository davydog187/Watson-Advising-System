<?php

require_once("connect_watson.php");

$rectime = $_POST['rectime'];

mysql_query("DELETE FROM waiting WHERE rectime='$rectime'");//check for errors

mysql_close($db);


?>
<?php

function printRow($text){
    echo "<tr>$text</tr>";
}

function buildStudent($row){
    echo "<div class='student_block'>";
    echo "<label id='".$row['rectime']."' class='queue_data label' class='center'>".$row['bnumber']." ".$row['firstname']." ".$row['lastname']."</label> <input class='finish' type='submit' value='Finish'> <input class='delete' type='submit' value='Delete'>";
    echo "<div class='queue_data' id='".$row['bnumber']."' style='display:none'>";
    echo "<table>";
    printRow("<td class='bold'>Email:</td>"."<td>".$row['email']."</td>");
		printRow("<td class='bold'>Program:</td>"."<td>".$row['major']."</td>");
		printRow("<td class='bold'>Calendar Year:</td>"."<td>".$row['year']."</td>");
		printRow("<td class='bold'>Reason:</td>"."<td>".$row['reason']."</td>");
		printRow("<td class='bold'>Comments:</td>"."<td>".$row['comments']."</td>");
		echo "</table>";
		echo "<a class='oblique edit' id='".$row['bnumber']."'href=''>Edit ".$row['firstname']."'s info.</a>";
		echo "</div>";
    echo "</div>";
}

require_once("php_core/connect_watson.php");

$query = "select * from waiting w, students s where s.bnumber= w.bnumber order by rectime";

$rows = mysql_query($query);

$num_waiting = mysql_num_rows($rows);
?>

<html>
	<head>
		<title>Watson Undergraduate Advising System</title>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/queue.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
		<?php require('header.html'); ?>
			<div id="content">
				<div id="cur_queue">
<?php
  if($num_waiting>0){
    echo "<h2 class='center'>Next Up</h2>";
    $row = mysql_fetch_assoc($rows);
    buildStudent($row);

    if($num_waiting>1){
        echo "<h2 class='center'>Currently Waiting</h2>";
        while($num_waiting>1){
            $row = mysql_fetch_assoc($rows);
            buildStudent($row);
            $num_waiting--;
        }
    }
  }
  else{
    echo "<p class='center'>No students waiting</p>";

  }
?>
				</div>

			</div>

			<div id="footer">
				<p>Created by David Lucia and Nick Ciaravella</p>
			</div>
		</div>
    <div id="edit-div"></div>
	</body>
</html>

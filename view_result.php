<?php
if(isset($_GET['rectime'])){
  $rectime = $_GET['rectime'];
  require_once('./php_core/connect_watson.php');

  $query = sprintf("SELECT * FROM finished f, students s WHERE s.bnumber=f.bnumber and f.rectime='%s'", mysql_real_escape_string($rectime));

  $rows = mysql_query($query);
  $num_rows = mysql_num_rows($rows);
  if($num_rows==1){
    $student =  mysql_fetch_assoc($rows);
  }
  else{
		//There was an error
		header("Location: finished_queue.php");
  }
}
else{
  header("Location: finished_queue.php");
}

?>
<html>
	<head>
		<title>Watson Undergraduate Advising System</title>
		<link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui-1.8.16.custom.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
		<script src="js/view_result.js" type="text/javascript"></script>
	</head>
	<body>
    <div id="wrapper">
      <?php require('header.html') ?>
      <div id="content">
        <div id="view_result">
          <h2 class="center">Walk-in Details</h2>
          <form id="walkin_results_form">
             <table>
                <tr>
							    <td>B-Number:</td><td><input type="text" name="bnumber" value='<?php echo $student['bnumber']; ?>' disabled='disabled'></td>
                </tr>
                <tr>
                  <td>Name:</td><td><input type="Text" name="name" value='<?php echo $student['firstname']." ".$student['lastname']; ?>' disabled='disabled'></td>
						  <tr>
                  <td>E-Mail:</td><td><input type="text" name="email" value='<?php echo $student['email']; ?>' disabled='disabled'></td>
                </tr>
                <tr>
							    <td>Program:</td><td><input type="text" name="major" value='<?php echo $student['major']; ?>' disabled='disabled'></td>
                </tr>
                 <tr>
                  <td>Visit Time:</td><td><input name="rectime" type="text" value='<?php echo $student['rectime']; ?>' disabled='disabled'></td>
                </tr>
                <tr>
                  <td>Reason for Visit:</td><td><input name="reason" type="text" value='<?php echo $student['reason']; ?>' disabled='disabled'></td>
                </tr>
            </table>
            <br />
            <span>
            Initial Comments: <br />
            <textarea cols="40" rows="10" name="initial_comments"><?php echo $student['initial_comments']; ?></textarea>
            <br />
            Final Comments: <br />
            <textarea cols="40" rows="10" name="final_comments"><?php echo $student['final_comments'] ?></textarea> <br />
            </span>
            <input type="submit" value="Back" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>


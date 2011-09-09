<?php
    if(isset($_GET['rectime'])){
        $rectime = $_GET['rectime'];
        require_once('./php_core/connect_watson.php');
        $query = "SELECT * FROM waiting w, students s WHERE s.bnumber=w.bnumber and w.rectime='$rectime'";

        $rows = mysql_query($query);
        $num_rows = mysql_num_rows($rows);
        if($num_rows==1){
            $student =  mysql_fetch_assoc($rows);
        }
        else{
            //Then theres an error
        }
    }
    else{
        header("Location: ./main_queue.php");
    }
?>

<html>
	<head>
		<title>Watson Undergraduate Advising System</title>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<script src="js/jquery.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
		  <?php require('header.html'); ?>
			<div id="content">
				<div id="finish_student">
					<h2 class="center">Finish Student Walk-in</h2>
					<form method="post" action="php_core/add_to_finished.php">
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
                  <td>Reason for Visit:</td><td><input name="reason" type="text" value='<?php echo $student['reason']; ?>' disabled='disabled'></td>
                </tr>
            </table>
            <br />
            Initial Comments: <br />
            <textarea cols="40" rows="10" name="intial_comments"><?php echo $student['comments']; ?></textarea>
            <br />
            Final Comments: <br />
            <textarea cols="40" rows="10" name="final_comments"></textarea> <br />
						<input type="submit" value="Submit" />

					</form>

				</div>
			</div>

			<div id="footer">
				<p>Created by David Lucia and Nick Ciaravella</p>
			</div>
		</div>
	</body>
</html>

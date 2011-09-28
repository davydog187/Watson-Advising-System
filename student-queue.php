<?php
if(isset($_POST['select_student'])){
    $bnumber = $_POST['select_student'];
  }
  else{
    header('Location: ./index.html');
  }

require_once("./php_core/connect_watson.php");

$query = sprintf("SELECT * FROM students WHERE bnumber='%s'", mysql_real_escape_string($bnumber));

$studentInfo = mysql_query($query); //Error check this

if($studentInfo){
  if(mysql_num_rows($studentInfo)==1){
    $row = mysql_fetch_array($studentInfo);
  }
  else{
    $row = "Information not retrieved";//I think this is bad design, I think a boolean would be better..or a redirect
  }
 }

?>


<html>
	<head>
		<title>Watson Undergraduate Advising System</title>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/waiting.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
  <?php require('header.html') ?>
			<div id="content">

				<div id="student_info">
					<h3>Current Student Information</h3>
						<table>
						<tr>
							<td class="bold">Student:</td>
  <td><?php echo "<label name='bnumber'>".$row['bnumber']." </label>"."<label name='firstname'>".$row['firstname']." </label>"."<label name='lastname'>".$row['lastname']." </label>"; ?></td>
						</tr>
						<tr>
							<td class="bold">Program:</td>
  <td><?php echo "<label name='major'>".$row['major']."</label>, <label name='year'>".$row['year']."</label>"; ?></td>
						</tr>
						<tr>
							<td class="bold">Contact:</td>
  <td><?php echo "<label name='email'>".$row['email']."</label>"; ?></td>
						</tr>
					</table>
					<p>Any of this information wrong? <a class="edit" <?php echo "id='".$row['bnumber']."'"; ?> href="#">Click here to edit.</a></p>
					<div id="queue_form">
						<form id="new_waiter">
							Reason for Visit:
              <select id="reason">
                <option>Scheduling</option>
                <option>Overloads</option>
                <option>Change of Major</option>
                <option>Transfer into/out of Watson</option>
                <option>Add/Drop</option>
                <option>University Withdrawal</option>
                <option>Pass/Fail options</option>
                <option>Major Requirements</option>
                <option>Dars Issues</option>
                <option>Study Abroad</option>
                <option>Letter of Recommendation</option>
                <option>Personal</option>
                <option>Other..</option>
              </select>
              Additional Comments <br />
							<textarea cols="40" rows="10" name="comments"></textarea> <br />
							<input type="submit" id="submit" value="Add to queue" />
						</form>
					</div>
				</div>

				<div id="queue">
					<!-- I was thinking we could make it so when you click on a student, there info slides under them -->
					<!-- The following table is going to be generated from ajax -->
					<h3>Current Students Waiting</h3>
					<table>
					  <div id="waiting">
						<!-- Waiting list will be generated here -->
					  </div>
					</table>
				</div>

			</div>
			<div id="footer">
				<p>Created by David Lucia and Nick Ciaravella</p>
			</div>
		</div>
    <div id="edit-div"></div>
	</body>
</html>

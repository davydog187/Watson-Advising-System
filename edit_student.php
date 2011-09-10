<?php

$edit = false;

if(isset($_POST['bnumber'])){
    $edit = true;
    $bnumber = $_POST['bnumber'];

    require_once('./php_core/connect_watson.php');

		$query = sprintf("select * from students where bnumber='%s'", mysql_real_escape_string($bnumber));

    $result = mysql_query($query);
    $num_rows = mysql_num_rows($result);

    if($num_rows>0){
        $row = mysql_fetch_assoc($result);
    }
    else {
        $edit = false;
    }
    mysql_close($db);
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
				<div id="edit_student">
					<h2 class="center"><?php if($edit){ echo "Edit";} else{ echo "Add";} ?> Student</h2>
					<form method="post" action="php_core/update_student.php">
						<p>
              <table>
                <tr>
							    <td>B-Number:</td><td><input type="text"  <?php if($edit) echo "value='".$row['bnumber']."' disabled='disabled'"; ?>maxlength="9" size="10"></td>
                </tr>
                <tr>
                  <td>First Name:</td><td><input type="text" <?php if($edit) echo "value='".$row['firstname']."'"; ?> size="30px"></td>
                <tr>
							    <td>Last Name:</td><td><input type="text" <?php if($edit) echo "value='".$row['lastname']."'"; ?> size="30px"></td>
                </tr>
							  <tr>
                  <td>E-Mail:</td><td><input type="email" <?php if($edit) echo "value='".$row['email']."'"; ?> size="30px"></td>
                </tr>
                <tr>
							    <td>Program:</td><td><input type="text" <?php if($edit) echo "value='".$row['major']."'"; ?> size="30px"></td>
                </tr>
            </table>
						<div class="center"><input type="submit" value="Submit" /></div>

					</form>

				</div>
			</div>

			<div id="footer">
				<p>Created by David Lucia and Nick Ciaravella</p>
			</div>
		</div>
	</body>
</html>

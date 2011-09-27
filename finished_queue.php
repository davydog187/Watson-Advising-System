<html>
	<head>
		<title>Watson Undergraduate Advising System</title>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui-1.8.16.custom.css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
		<script src="js/finished_queue.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
   <?php require('header.html') ?>
			<div id="content">
				<div id="query_student">
					<h2 class="center">Search Walkins</h2>
					<form id="query_form">
						<table>
							<tr>
								<td>Date: </td><td><input type="text" id ="datepicker" name="datepicker"></td>
							</tr>
							<tr>
								<td>Bnumber:</td><td><input type="text" name="bnumber"></td>
							</tr>
						<tr>
								<td>First Name:</td><td><input type="text" name="firstname"></td>
							</tr>
							<tr>
								<td>Last Name:</td><td><input type="text" name="lastname"></td>
							</tr>
							<tr>
								<td>Program:</td><td><input type="text" name="program"></td>
							</tr>
						<tr>
								<td>Reason:</td><td>
									<select name="reason">
											<option></option>
											<option>Scheduling</option>
											<option>Change of Major</option>
											<option>Transfer into/out of Watson</option>
											<option>Add/Drop</option>
											<option>Other..</option>
										</select>
								</td>
							</tr>
						</table>
						<br />
						<div class="center"><input type="submit" value"Submit" /></div>
					</form>
				</div>
				<div id="walkin_results"></div>
			</div>
			<div id="footer">
				<p>Created by David Lucia and Nick Ciaravella</p>
			</div>
		</div>
	</body>
</html>


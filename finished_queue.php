<html>
	<head>
		<title>Watson Undergraduate Advising System</title>
		<link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui-1.8.16.custom.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css" />
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
								</td>
							</tr>
						</table>
						<br />
						<div class="center"><input type="submit" value"Submit" /></div>
					</form>
				</div>
				<div id="walkin_results">
          <h1 class="center">Search Results</h1>
          <form id="result_form">
					<table id="results_table">
						<thead>
						<tr>
							<th></th>
							<th>Date</th>
							<th>Time</th>
							<th>B-Number</th>
							<th>Name</th>
							<th>Major</th>
							<th>Reason</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
          </table>
        <div class="center"><input type="submit" value"Submit" /></div>
        </form>
				</div>
			</div>
			<div id="footer">
				<p>Created by David Lucia and Nick Ciaravella</p>
			</div>
		</div>
	</body>
</html>


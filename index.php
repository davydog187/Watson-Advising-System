<html>
	<head>
		<title>Watson Undergraduate Advising System</title>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/results.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
   <?php require('header.html'); ?>
			<div id="content">
				<!-- Searching for students by using their B-Number or name -->
				<div id="search">
					<h2>Search for a Student</h2>
					<!-- form action should be handled by results.js -->
					<form id="search_form" >
						<div id="search_bnumber">
							<h3 id="bnumber">By B-Number:</h3>
							<p>B-Number: <input type="text" name="bnumber" /></p>
						</div>
						<div id="search_name">
							<h3 id="name">By Name:</h3>
							<p>First Name: <input type="text" name="fname" /></p>
							<p>Last Name: <input type="text" name="lname" /></p>
						</div>
						<input type="submit" value="Search" />
					</form>
				</div>

				<!-- Display the results of searching for a student -->
				<div id="search_results" >
					<h2>Students Found</h2>
					<form name="select_student" action="student-queue.php" method="post">
					  	<div id="results"></div>
						<div id="search_results_button"><input type="button" id="back" value="Back"><input type="submit" id="submit" value="Select" /></div>
					</form>
				</div>

			</div>

			<div id="footer">
				<p>Created by David Lucia and Nick Ciaravella</p>
			</div>
		</div>
	</body>
</html>

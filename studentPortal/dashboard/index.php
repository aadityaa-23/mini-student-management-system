<html>

	<head>
		<title>dashboard | studentPortal</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<nav>
			<div class="logo">
				studentPortal
			</div>
			<ul>
				<li><a href="../">Students</a></li>
				<li><a href="../register">Register</a></li>
				<li><a href="../mail">Mail</a></li>
				<li><a class="active" href="#">Dashboard</a></li>
			</ul>
		</nav>
		<div class="main">
			<?php
					$connect = mysqli_connect("localhost","root","","studentportal");
					mysqli_select_db($connect, 'studentportal');
					$result = mysqli_query($connect, "SELECT count FROM `visitors`");
					while ($row = $result->fetch_assoc()) {
						$count = $row['count'];
					}
					echo "<table border=1 style=\"text-align:center;\">
						<tr><td>Total Visitors</td><td style=\"width:100;\">$count</td></tr>";
					$result = mysqli_query($connect, "SELECT * FROM `branch_list`");
					while ($row = $result->fetch_assoc()) {
						$rowcount=mysqli_num_rows($result);
					}
					echo "<tr><td>Total Branches</td><td style=\"width:100;\">$rowcount</td></tr>";
					$result = mysqli_query($connect, "SELECT * FROM `students`");
					while ($row = $result->fetch_assoc()) {
						$rowcount=mysqli_num_rows($result);
					}
					echo "<tr><td>Total Students</td><td style=\"width:100;\">$rowcount</td></tr>";	
				?>
			</table>
			<a href="branches"><button class="button">EDIT BRANCHES</button></a>
			<a href="students"><button class="button">EDIT STUDENTS</button></a>
		</div>
	</body>

</html>
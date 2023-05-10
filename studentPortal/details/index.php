<html>

	<head>
		<title>studentDetails | studentPortal</title>
		<link rel="stylesheet" href="../style.css">
		<style>
			table {
				border-collapse: collapse;
				border: 0.22rem solid black;
				padding: 0rem 1rem;
				box-shadow: 0.5rem 0.5rem 0;
			}

			table:hover {
				border-collapse: collapse;
				border: 0.22rem solid black;
				padding: 0.2rem 1rem;
				box-shadow: 0.5rem 0.5rem 0;
			}

			tr:hover {
				background: black;
				color: white;
				border: white;
			}

			tr,
			th {
				width: 500;
				font-size: 3rem;
			}
		</style>
	</head>

	<body>
		<nav>
			<div class="logo">
				studentPortal
			</div>
			<ul>
				<li><a class="active" href="../">Students</a></li>
				<li><a href="../register">Register</a></li>
				<li><a href="../mail">Mail</a></li>
				<li><a href="../dashboard">Dashboard</a></li>

			</ul>
		</nav>
		<div class="main">
			<?php
				if(isset($_GET['id']))
				{
					echo '<center><u>studentDetails</u><br/>';
					$connect = mysqli_connect("localhost","root","","studentportal");
					if ($connect) {	
						mysqli_select_db($connect, 'studentportal');
						$id = $_GET['id'];
						$res = mysqli_query($connect, "SELECT * FROM `students` WHERE id = $id ");
						while ($row = $res->fetch_assoc()) {
							$enrollment = $row['id'];
							$name = $row['name'];
							$email = $row['email'];
							$phone = $row['phone'];
							$birthdate = $row['birthdate'];
							$branch = $row['branch'];
						}
						echo "<table border=1>";
						echo "<tr><td>Student&nbsp;Name&nbsp;</td><td>$name</td></tr>";
						echo "<tr><td>Enrollment&nbsp;Number&nbsp;</td><td>$enrollment</td></tr>";
						echo "<tr><td>Branch</td><td>$branch</td></tr>";
						echo "<tr><td>Email Address</td><td>$email</td></tr>";
						echo "<tr><td>Phone Number</td><td>$phone</td></tr>";
						echo "<tr><td>Birthdate</td><td>$birthdate</td></tr>";
						echo "</table>";
					}
				}
				else
				{
					echo "Data not found.";
				}	
				echo "<button class=\"button\" onclick=\"history.back()\">&larr; back</button></a>";
				
			?>
	</body>
</html>
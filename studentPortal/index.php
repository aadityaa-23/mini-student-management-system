<html>

	<head>
		<title>studentsList | studentPortal</title>
		<link rel="stylesheet" href="style.css">
		<style>
			tr:hover {
				background: black;
				color: white;
				border: white;
				cursor: pointer;
			}
		</style>
	</head>

	<body>
		<nav>
			<div class="logo">
				studentPortal
			</div>
			<ul>
				<li><a class="active" href="">Students</a></li>
				<li><a href="register\">Register</a></li>
				<li><a href="mail\">Mail</a></li>
				<li><a href="dashboard\">Dashboard</a></li>
			</ul>
		</nav>
		<div class="main">
			<?php
				$connect = mysqli_connect("localhost","root","","studentportal");
				echo '<center><u>studentsList</u><table border="1">';
				if ($connect) {
					//echo "connected<br/>";
					mysqli_select_db($connect, 'studentportal');
					$result = mysqli_query($connect, "SELECT * FROM students");
					while ($row = $result->fetch_assoc()) {
						echo '<tr title="click to view full student details." onclick="window.location=\'details?id=' . $row['id'] . '\'"><td>' . $row['id'] . '</td><td>' . $row['name'] . '</td></tr></a>';
					}
				}
			?>
			</table>
		</div>
		<?php
				session_start();
				if(!isset($_SESSION['start']))
				{
					$connect = mysqli_connect("localhost","root","","studentportal");
					mysqli_select_db($connect, 'studentportal');
					$result = mysqli_query($connect, "SELECT count FROM `visitors`");
					while ($row = $result->fetch_assoc()) {
						$count = $row['count'];
					}
					$count+=1;
					$connect = mysqli_connect("localhost","root","","studentportal");
					$result = mysqli_query($connect, "UPDATE `visitors` SET `count`='$count' WHERE id=1");	
					$_SESSION['start'] = true;
				}
			?>
	</body>

</html>
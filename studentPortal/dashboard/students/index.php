<html>

	<head>
		<title>dashboardStudents | studentPortal</title>
		<link rel="stylesheet" href="../../style.css">
		<style>
			tr:hover {
				background: white;
				color: black;
				border: black;
			}

			tr {

				font-size: 2rem;
			}

			.td {
				width: 780;
			}

			.id {
				text-align: center;
			}

			.button {
				font-family: monospace;
				font-size: 1.5rem;
				background: white;
				border: 0;
				padding: 0.2rem 1rem;
				width: 100;
				margin: 0rem;
				height: 55;
			}

			.button:hover,
			.button:focus-visible {
				background: black;
				height: 55;
				border: 0;
				color: white;
			}
		</style>
	</head>

	<body>
		<nav>
			<div class="logo">
				studentPortal
			</div>
			<ul>
				<li><a href="..\..\">Students</a></li>
				<li><a href="..\..\register\">Register</a></li>
				<li><a href="..\..\mail\">Mail</a></li>
				<li><a class="active" href="..\..\dashboard">Dashboard</a></li>
			</ul>
		</nav>
		<div class="main">
			<?php
				$connect = mysqli_connect("localhost","root","","studentportal");
				echo '<center><u>studentsList</u><table border="1">';
				if ($connect) {
					mysqli_select_db($connect, 'studentportal');
					$result = mysqli_query($connect, "SELECT * FROM students");
					while ($row = $result->fetch_assoc()) {
						echo '<tr title="click to view full student details." onclick="window.location=\'../../details?id=' . $row['id'] . '\'"><td class="id" style="width:40;">' . $row['id'] . '</td><td class="td">' . $row['name'] . '</td><td><a href="update\?id='.$row['id'].'"><button class="button">update</button></a></td><td><a href="delete\?id='.$row['id'].'"><button class="button">delete</button></a></td></tr></a>';
					}
				}
			?>
			</table>
			<a href="..\..\register"><button class="button" style="width:600; border: 0.22rem solid; margin: 0rem; height: 55;">ADD NEW STUDENTS &plus;</button></a><br/>
			<a href="..\..\dashboard"><button class="button" style="width:600; border: 0.22rem solid; margin: 1rem; height: 55;">&larr; back</button></a>
		</div>
	</body>

</html>
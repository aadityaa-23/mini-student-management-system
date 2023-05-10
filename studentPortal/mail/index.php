<html>

	<head>
		<title>sendNotification | studentPortal</title>
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

			.main {
				margin: 50;
			}

			textarea {
				font-family: monospace;
				font-size: 3rem;
				background: white;
				border: 0.22rem solid;
				max-width: 650;
				min-width: 650;
				width: 650;
				height: 300;
				outline: 0;
				margin: 1rem;
				padding: 0.2rem 1rem;
				box-shadow: 0.5rem 0.5rem 0;
			}
		</style>
	</head>

	<body>
		<nav>
			<div class="logo">
				studentPortal
			</div>
			<ul>
				<li><a href="../">Students</a></li>
				<li><a href="../register">Register</a></li>
				<li><a class="active" href="#">Mail</a></li>
				<li><a href="../dashboard">Dashboard</a></li>
			</ul>
		</nav>
		<div class="main">
			<u>sendNotification</u>
			<form method="POST">
				<input type="text" placeholder="subject" name="subject" required /><br />
				<textarea type="textarea" placeholder="message" name="message" required></textarea><br />
				<input type="submit" name="submit" value="send mail &rarr;" class="button" /><br />
			</form>
			<?php
					if(isset($_POST['submit']))
					{
						$connect = mysqli_connect("localhost","root","","studentportal");
						echo '<center><table border="1">';
						if ($connect) {
							mysqli_select_db($connect, 'studentportal');
							$result = mysqli_query($connect, "SELECT * FROM students");
							while ($row = $result->fetch_assoc()) {
								$emails[] = $row['email'];
							}
							$subject = $_REQUEST['subject'];
							$message = $_REQUEST['message'];
							$headers = array(
								'From' => 'studentPortal <aadityaa.txt@gmail.com>',
								'Content-type' => 'text/html;charset=UTF-8'
								);
							foreach($emails as $email)
							{
								if(mail($email, $subject, $message, $headers))
								{
									echo '<h3 style="font-size:30px;">Mail notification sent successfully.</h3>';
								}	
								else
								{
									echo '<h3 style="font-size:30px;">Mail notification not sent successfully.</h3>';
								}
							}
						}	
					}
				?>
			<h3 style="font-size:30px;">*send all student a mail notification</h3>
			</center>
	</body>

</html>
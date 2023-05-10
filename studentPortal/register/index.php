<html>

	<head>
		<title>registerStudent | studentPortal</title>
		<link rel="stylesheet" href="../style.css">
	</head>

	<body>
		<nav>
			<div class="logo">
				studentPortal
			</div>
			<ul>
				<li><a href="../">Students</a></li>
				<li><a class="active" href="#">Register</a></li>
				<li><a href="../mail/">Mail</a></li>
				<li><a href="../dashboard/">Dashboard</a></li>
			</ul>
		</nav>
		<div class="main">
			<u>registerStudent</u>
			<hr />
			<form action="" method="POST">
				<h4>Student Name</h4>
				<input type="text" placeholder="fullname" name="name" required /><br />
				<h4>Email Address</h4>
				<input type="email" placeholder="email address" name="email" required /><br />
				<h4>Mobile Number</h4>
				<input type="number" placeholder="mobile number" name="phone" required /><br />
				<h4>Birthdate</h4>
				<input type="date" name="birthdate" required /><br />
				<h4>Branch</h4>
				<select name="branch">
				<?php
					$connect = mysqli_connect("localhost","root","","studentportal");
					mysqli_select_db($connect, 'studentportal');
					$result = mysqli_query($connect, "SELECT * FROM `branch_list`");
					while ($row = $result->fetch_assoc()) {
						echo '<option value= '.$row['id'].'>' . $row['name'] . '</option>';
					}
				?>
			</select><br />
				<input type="submit" value="REGISTER" class="button" /><br />
				<button class="button" onclick="history.back()">&larr; back</button></a>
		</div>
		<?php
				try {
					if (isset($_POST['name'])) {
					$name = $_REQUEST['name'];
					$email = $_REQUEST['email'];
					$phone = $_REQUEST['phone'];
					$birthdate = $_REQUEST['birthdate'];
					$branch = $_REQUEST['branch'];
					$connect = mysqli_connect("localhost","root","","studentportal");
					mysqli_select_db($connect, 'studentportal');
					$result = mysqli_query($connect, "SELECT * FROM `branch_list` WHERE id=('$branch')");
					while ($row = $result->fetch_assoc()) {
						$branch = $row['name'];
					}
					if ($connect) {
						mysqli_select_db($connect, 'studentportal');
						$result = mysqli_query($connect, "INSERT INTO `students` (name,email,phone,birthdate,branch) VALUES ('$name','$email','$phone','$birthdate','$branch')");
						$enrollment = mysqli_insert_id($connect);
						if($result)
						{
							$to = $email;
							$subject = "studentPortal Enrollment";
							$message = "<h1 style=\"color:black; font-family: monospace;\">$name, You are successfully enrolled on studentPortal.</h1>
										<hr/>
										<h2 style=\"color:black; font-family: monospace;\">Student Name: <u>$name</u>.</h2>
										<h2 style=\"color:black; font-family: monospace;\">Enrollment Number:<u>$enrollment</u>.</h2>
										<h2 style=\"color:black; font-family: monospace;\">Branch Name: <u>$branch</u>.</h2>
										<hr/>
										<h1 style=\"color:black; font-family: monospace;\">From: <u>studentPortal</u>.</h1>";
							
							$headers = array(
								'From' => 'studentPortal <aadityaa.txt@gmail.com>',
								'Content-type' => 'text/html;charset=UTF-8',
								'Reply-To' => 'aadityaa.css@gmail.com');
							if(!mail($to, $subject, $message, $headers))
							{
								echo '<script>console.log("Mail has been not sent successfully!");</script>';
							}	
							else{
								echo '<script>console.log("Mail has been sent successfully!");</script>';
							}
							header("Location:../");
						}
					}
					}
				} catch (Exception $e) {
					echo $e;
				}
			?>
	</body>

</html>
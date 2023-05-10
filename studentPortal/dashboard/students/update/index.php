<html>

	<head>
		<title>dashboardStudents | studentPortal</title>
		<link rel="stylesheet" href="../../../style.css">
	</head>
    <?php
		if(isset($_GET['id']))
		{
			$id = $_GET['id']; 
			$connect = mysqli_connect("localhost","root","","studentportal");
			mysqli_select_db($connect, 'studentportal');
			$result = mysqli_query($connect, "SELECT * FROM `students` WHERE id=$id");
			while ($row = $result->fetch_assoc()) {
				$id = $row['id'];
				$name = $row['name'];
				$email = $row['email'];
				$phone = $row['phone'];
				$date = $row['birthdate'];
				$branch = $row['branch'];
			}
		}
	?>

    <body>
        <div class="main">
            <u>updateStudent</u>
            <form action="" method="POST">
                <h4>Student Id</h4>
                <input type="text" placeholder="id" name="id" value="<?php if(isset($id)){echo $id;}?>" readonly="readonly" /><br />
                <h4>Student Name</h4>
                <input type="text" placeholder="fullname" name="name" value="<?php if(isset($name)){echo $name;}?>" required /><br />
                <h4>Email Address</h4>
                <input type="email" placeholder="email address" name="email" value="<?php if(isset($email)){echo $email;}?>" required /><br />
                <h4>Mobile Number</h4>
                <input type="number" placeholder="mobile number" name="phone" value="<?php if(isset($phone)){echo $phone;}?>" required /><br />
                <h4>Birthdate</h4>
                <input type="date" name="birthdate" value="<?php if(isset($date)){echo $date;}?>" required /><br />
                <h4>Branch</h4>
                <input type="text" name="branch" value="<?php if(isset($branch)){echo $branch;}?>" readonly="readonly" />
                </select><br />
                <input type="submit" value="UPDATE" class="button" /><br />
			</form>
			<button class="button" onclick="history.back()">&larr; back</button></a>
		</div>
    </body>

</html>
<?php
	if(isset($_POST['id']))
	{
		$id = $_POST['id']; 
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$birthdate = $_POST['birthdate'];
		$branch = $_POST['branch'];
		$connect = mysqli_connect("localhost","root","","studentportal");
		mysqli_select_db($connect, 'studentportal');
		$result = mysqli_query($connect, "UPDATE `students` SET name='$name',email='$email',phone='$phone',birthdate='$birthdate' WHERE id=$id");
		if($result)
		{
			echo "<script>alert(\"Student data updated at enrollment - $id\");window.location = '../';</script>";
		}
		else
		{
			echo "<script>alert(\"Student data not updated at enrollment - $id\");window.location = '../';</script>";
		}	
	}
?>
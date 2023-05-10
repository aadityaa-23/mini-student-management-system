<html>

	<head>
		<title>dashboardBranches | studentPortal</title>
		<link rel="stylesheet" href="../../../style.css">
	</head>
	<?php
			if(isset($_GET['id']))
			{
				$id = $_GET['id']; 
				$connect = mysqli_connect("localhost","root","","studentportal");
				mysqli_select_db($connect, 'studentportal');
				$result = mysqli_query($connect, "SELECT * FROM `branch_list` WHERE id=$id");
				while ($row = $result->fetch_assoc()) {
					$id = $row['id'];
					$name = $row['name'];
				}
			}
		?>

	<body>
		<div class="main">
			<u>updateBranch</u>
			<form action="" method="POST">
				<input type="number" placeholder="id" name="id" value="<?php echo $id;?>"	readonly="readonly" /><br />
				<input type="text" placeholder="name" name="name" value="<?php echo $name;?>"required /><br />
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
		$connect = mysqli_connect("localhost","root","","studentportal");
		mysqli_select_db($connect, 'studentportal');
		$result = mysqli_query($connect, "UPDATE `branch_list` SET `name`='$name' WHERE id=$id");
		if($result)
		{
			echo "<script>alert(\"Branch updated at id - $id\");window.location = '../';</script>";
		}
		else
		{
			echo "<script>alert(\"Branch not updated at id - $id\");window.location = '../';</script>";
		}	
	}
?>
<?php
	if(isset($_GET['id']))
	{
		try
		{
			$connect = mysqli_connect("localhost","root","","studentportal");
			$id = $_GET['id'];
			mysqli_select_db($connect, 'studentportal');
			$result = mysqli_query($connect, "DELETE FROM `students` WHERE id=$id");
			if($result)
			{
				echo "<script>alert(\"Student deleted at id - $id\");window.location = '../';</script>";
			}
			else
			{
				echo "<script>alert(\"Student not deleted at id - $id\");window.location = '../';</script>";
			}
		}
		catch(Exception $e)
		{
			die($e);
		}
	}
	else
	{
		header("Location:../");
	}
?>
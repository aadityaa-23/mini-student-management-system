<?php
	if(isset($_GET['id']))
	{
		try
		{
			$connect = mysqli_connect("localhost","root","","studentportal");
			$id = $_GET['id'];
			mysqli_select_db($connect, 'studentportal');
			$result = mysqli_query($connect, "DELETE FROM `branch_list` WHERE id=$id");
			if($result)
			{
				echo "<script>alert(\"Branch deleted at id - $id\");window.location = '../';</script>";
			}
			else
			{
				echo "<script>alert(\"Branch not deleted at id - $id\");window.location = '../';</script>";
			}
		}
		catch(Exception $e)
		{
			die("error while deleteing");
		}
	}
	else
	{
		header("Location:../");
	}
?>
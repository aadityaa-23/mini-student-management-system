<html>

<head>
    <title>registerBranch | studentPortal</title>
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <div class="main">
        <u>addBranch</u>
        <form action="" method="POST">
            <input type="text" placeholder="name" name="name" required /><br />
            <input type="submit" value="ADD BRANCH" class="button" /><br />
        </form>
        <button class="button" onclick="history.back()">&larr; back</button></a>
    </div>
</body>

</html>
<?php
	if(isset($_POST['name']))
	{
		$name = $_POST['name']; 
		$connect = mysqli_connect("localhost","root","","studentportal");
		mysqli_select_db($connect, 'studentportal');
		$result = mysqli_query($connect, "INSERT INTO `branch_list` (name) VALUES ('$name')");
		$id = mysqli_insert_id($connect);
		echo "<h4>Branch inserted\nBranch id - $id</h3>";
		echo "<script>alert(\"Branch inserted.\\nBranch id - $id\");window.location = '../';</script>";
	}
 
 ?>
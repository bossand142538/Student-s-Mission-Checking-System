<?php
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$name = $_POST['name'];
	$status = $_POST['status'];
	$class = $_POST['class'];

	$link = mysqli_connect("localhost", "root","1234");
	mysqli_set_charset($link,'utf8');
	$sql = "use userdb";
	$result = mysqli_query($link,$sql);

	$sql = 	"Insert into usertbl(user, password, name, status, class) ".
			"values('$user', '$pass', '$name', '$status', '$class');";
	$result = mysqli_query($link,$sql);

	if ($result)
	{
		echo "Add user successfully";
		?>
		<div class="back" >
			 <a href=admin_form.php>กลับสู่หน้าหลักadmin</a>
	 </div>
		<div class="logout">
		<a href="/project/login/logout.php">Logout</a><p>
	 </div>
	 <?php
	}
	else
	{
		echo "Error, Please check data again";
	}
?>

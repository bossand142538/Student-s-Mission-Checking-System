<?php
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$link = mysqli_connect("localhost","root","1234");
	mysqli_set_charset($link,'utf8');
	$sql = "use userdb";
	$Result = mysqli_query($link,$sql);

	$sql = "SELECT * FROM usertbl WHERE user='$user' AND password='$pass'";
	$Result = mysqli_query($link,$sql);
	$DbarrUser = mysqli_fetch_array($Result);
	if ($DbarrUser)
	{
		session_start();
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
		$_SESSION['status'] = $DbarrUser['status'];
		$_SESSION['name'] = $DbarrUser['name'];
		$_SESSION['class'] = $DbarrUser['class'];

		$sql = "SELECT status FROM usertbl WHERE user='$user' AND password='$pass'";
		$Result = mysqli_query($link,$sql);
		$DbarrUser = mysqli_fetch_array($Result);
		if ($DbarrUser["status"] == "teacher")
		{
			header("location:/project/teacher/teacher_form.php");
		}
		elseif ($DbarrUser["status"] == "student")
		{
			header("location:/project/student/student_form.php");
		}
		elseif ($DbarrUser["status"] == "admin")
		{
			header("location:/project/admin/admin_form.php");
		}
	}
	else
	{
		echo "Username or Password Incorrect";
	}

?>

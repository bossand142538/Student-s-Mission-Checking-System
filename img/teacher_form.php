<?php
	session_start();
	if($_SESSION['user'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['status'] != "teacher")
	{
		echo "This page for tercher only!";
		exit();
	}


	$link = mysqli_connect("localhost","root");M
	mysqli_set_charset($link,'utf8');
	mysqli_query($link, "use userdb;");
	$sql = "Select * from usertbl where user = '".$_SESSION["user"]."' && password = '".$_SESSION["pass"]."'";
	$result = mysqli_query($link, $sql);
	$dbarr = mysqli_fetch_array($result);
	$sql2 = "Select class from class where class like '".$dbarr["class"]."%_'";
	$result2 = mysqli_query($link, $sql2);



?>
<html>
<head>
<title>ฟอร์มส่งการบ้านครู</title>
</head>
<body>
	<h2>ฟอร์มส่งการบ้านครู</h2>
	<?php echo "คุณครู ".$dbarr["name"]." ระดับชั้นมัธยมศึกษาปีที่ ".$dbarr["class"];?><p>
	<form method="post" action="add_work.php">
	ส่งไปที่ <select name="class">
	<?php
		while($dbarr2 = mysqli_fetch_array($result2))
	{
		echo "<option value=$dbarr2[class]>$dbarr2[class]</option>";
	}
	?>
	</select><p>
	หัวข้อ <input type="text" name="title"><p>
	รายละเอียด<p> <textarea name="detail" cols="75" row="10"></textarea><p>
	<input type="submit" name="submit" value="ส่งงาน">
	<input type="reset" name="reset" value="ยกเลิก"><p>

</body>
</html>

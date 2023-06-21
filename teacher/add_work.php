<html>
<?php
session_start();
$title = $_POST["title"];
$detail = $_POST["detail"];
$name = $_SESSION['name'];
$status = $_SESSION['status'];
$date = $_POST['date'];
$select_class = $_POST['select_class'];
$input_num_people = $_POST['input_num_people'];
$num_people = $_POST['num_people'];

//เพิ่มไฟล์
if(is_uploaded_file($_FILES['file']['tmp_name'])) {
	$e = $_FILES['file']['error'];

	//ถ้าเป็นเลขที่ไม่ใช่ 0 แสดงว่าเกิดข้อผิดพลาด
	if($e != 0) {
		$msg = "";
		if($e == 1 || $e == 2) {
			$msg = "ไฟล์ที่อัปโหลดมีขนาดเกินกำหนด";
		}
		else {
			$msg = "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
		}
		echo '<span class="err">'.$msg.'</span>';
	}
	else {
		$mime_type = $_FILES['file']['type'];
		$namefile = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$size = $_FILES['file']['size'];


		$accept = array("image", "video", "audio");

		$t = explode("/", $mime_type);
		$type = $t[0];

		if(!in_array($type, $accept)) {
			echo '<span class="err">ต้องเป็นไฟล์ภาพ, เสียง หรือวิดีโอเท่านั้น</span>';
			mysqli_close($link);
			exit("</body></html>");
		}
		@mkdir($type); //ถ้ายังไม่มีไดเร็กทอรี ให้สร้างขึ้นใหม่

		$target = "$type/$namefile";
		$newname  = $namefile;
		if(file_exists($target)) {
			$oldname = pathinfo($namefile, PATHINFO_FILENAME);
			$ext =  pathinfo($namefile, PATHINFO_EXTENSION);

			$newname = $oldname;
			do {
				$r = rand(1000, 9999);
				$newname = $oldname."-".$r.".$ext";	//เช่น bird-1234.jpg
				$target = "$type/$newname";
			} while(file_exists($target));
		}

		move_uploaded_file($_FILES['file']['tmp_name'], $target);

		echo "<h3>จัดเก็บไฟล์เรียบร้อยแล้ว</h3>";
	}
}
else {
	$newname = 0;
}


if ($title == "" || $detail == "" || $date == "" || $select_class == "" || $num_people == "" )
{
	echo "คุณกรอกข้อมูลไม่ครบ กรุณากรอกข้อมูลใหม่"
	?>
	<input type="button" value="ย้อนกลับไปแก้ไข" onClick="history.back();">
	<?php
	exit ();
}

$currentdatetime = (date("Y")) . date("-m-d G:i:s");
$link = mysqli_connect("localhost", "root","1234");
mysqli_set_charset($link,'utf8');
mysqli_query($link,"Use userdb;");


if($select_class == 1)
{
	$sql = "Select * from usertbl where user = '".$_SESSION["user"]."' && password = '".$_SESSION["pass"]."'";
	$result = mysqli_query($link, $sql);
	$dbarr = mysqli_fetch_array($result);
	$sql2 = "Select class from class where class like '".$dbarr["class"]."%_'";
	$result2 = mysqli_query($link, $sql2);

	if($num_people == 1)
	{
		while($dbarr2 = mysqli_fetch_array($result2))
		{
			if($input_num_people == "")
			{
				echo "คุณกรอกข้อมูลไม่ครบ กรุณากรอกข้อมูลใหม่"
				?>
				<input type="button" value="ย้อนกลับไปแก้ไข" onClick="history.back();">
				<?php
				exit ();
			}
			$sql = 	"Insert Into worktbl(title, detail, name, class, date, num_people, currentdatetime)" .
			" Values ('$title', '$detail', '$name', '$dbarr2[class]', '$date', '$input_num_people', '$currentdatetime', '$newname');" ;
			$result = mysqli_query($link,$sql);
		}
	}
	elseif($num_people == 2)
	{
		while($dbarr2 = mysqli_fetch_array($result2))
		{
			$sql = 	"Insert Into worktbl(title, detail, name, class, date, num_people, currentdatetime, file)" .
			" Values ('$title', '$detail', '$name', '$dbarr2[class]', '$date', 0, '$currentdatetime', '$newname');" ;
			$result = mysqli_query($link,$sql);
		}
	}


}
elseif($select_class == 2)
{
	if($num_people == 1)
	{
		for($i=0;$i<count($_POST["class"]);$i++)
		{
			if($input_num_people == "")
			{
				echo "คุณกรอกข้อมูลไม่ครบ กรุณากรอกข้อมูลใหม่"
				?>
				<input type="button" value="ย้อนกลับไปแก้ไข" onClick="history.back();">
				<?php
				exit ();
			}
			if($_POST["class"][$i] != "")
			{
				$sql = 	"Insert Into worktbl(title, detail, name, class, date, num_people, currentdatetime, file)" .
				" Values ('$title', '$detail', '$name', '".$_POST['class'][$i]."', '$date', '$input_num_people', '$currentdatetime', '$newname');" ;
				$result = mysqli_query($link,$sql);
			}
		}
	}
	elseif($num_people == 2)
	{
		for($i=0;$i<count($_POST["class"]);$i++)
		{
			if($_POST["class"][$i] != "")
			{
				$sql = 	"Insert Into worktbl(title, detail, name, class, date, num_people, currentdatetime, file)" .
				" Values ('$title', '$detail', '$name', '".$_POST['class'][$i]."', '$date', 0, '$currentdatetime', '$newname');" ;
				$result = mysqli_query($link,$sql);
			}
		}
	}
}
?>
<div class="text" >
	<center>
<?php
if ($result)
{
	echo "แจ้งการบ้านเรียบร้อยแล้ว";
	mysqli_close($link);
}

else
{
	echo "ไม่สามารถส่งข้อมูลได้";
}


echo "<a href=teacher_form.php>กลับสู่หน้าหลักครู";

?>
</center>
</div>
<style>

.text{
	font-size: 35px;
	font-family: Mitr Light;
	margin-top: 7%;
	font-weight: 700;

}


body {cursor: url('http://fix.gs/pic/cursor/i/point60.cur'),auto;}
a {cursor: url('http://fix.gs/pic/cursor/i/point60.cur'),auto; }
html {
	background: url("/project/img/ppt-backgrounds-2340383_960_720.png") no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;}

img{
	margin-top: 4%;
}


</style>

<body>
	<center>
	  <img src="/project/img/di-13.png" class="compicin" >
	</center>
</body>
</html>

<html>
<?php
$link_id = $_POST['link_id'];
$name = $_POST['name_b'];
$comment = $_POST['comment'];

$link = mysqli_connect("localhost", "root","1234");
mysqli_set_charset($link,'utf8');
mysqli_query($link,"Use userdb;");
$sql = 	"Insert Into commenttbl(link_id,comment,name)" .
" Values ('$link_id', '$comment', '$name');" ;
$result = mysqli_query($link,$sql);
?>
<div class="text1" >
	<center>
<?php
if ($result)
{
	echo "ส่งคอมเม้นเรียบร้อยแล้ว";
	mysqli_close($link);
}
else
{
	echo "ไม่สามารถส่งข้อมูลได้";
}
echo "<a href=student_form.php>กลับสู่หน้าหลักนักเรียน <a>";
  echo "$name";
?>
</center>
</div>
<style>

.text1{
	font-size: 30px;
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
	  <img src="/project/img/emo12.png" class="compicin" >
	</center>
</body>
</html>

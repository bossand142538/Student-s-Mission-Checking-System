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

if ($result)
{
	echo "ส่งคอมเม้นเรียบร้อยแล้ว";
	mysqli_close($link);
}
else
{
	echo "ไม่สามารถส่งข้อมูลได้";
}
echo "<a href=teacher_form.php>กลับสู่หน้าหลักนักครู<a>";
echo "$name";
?>

<?php
$link = mysqli_connect("localhost","root","1234");
mysqli_set_charset($link, 'utf8');
mysqli_query($link,"Use userdb");



$sql = "Delete From worktbl where id = $_GET[id];";
$result = mysqli_query($link,$sql);
if($result)
{
  echo "ลบรายการงานออกจากฐานข้อมูลแล้ว";
  mysqli_close($link);
}
else {
  echo "ไม่สามารถลบรายการงานออกจากฐานข้อมูลได้";
}
?>
<a href=teacher_showwork.php>กลับสู่หน้าแสดงลิตส์งาน</a>

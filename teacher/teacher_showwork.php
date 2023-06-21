<?php
session_start();
if($_SESSION['user'] == "")
{
	echo "Please Login!";
	exit();
}

if($_SESSION['status'] != "teacher")
{
	echo "This page for teacher only!";
	exit();
}

$link = mysqli_connect("localhost","root","1234");
mysqli_set_charset($link,'utf8');
mysqli_query($link, "use userdb;");
$sql = "Select * from usertbl where user = '".$_SESSION["user"]."' && password = '".$_SESSION["pass"]."'";
$result = mysqli_query($link, $sql);
$DbarrUser = mysqli_fetch_array($result);
$sql = "Select * from worktbl where name = '".$_SESSION["name"]."'";
$result = mysqli_query($link, $sql);

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<style>
body {cursor: url('http://fix.gs/pic/cursor/i/point60.cur'),auto;}
a {cursor: url('http://fix.gs/pic/cursor/i/point60.cur'),auto; }
html {
	background: url("/project/img/ppt-backgrounds-2340383_960_720.png") no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;}

.header{
	margin-top: 6%;
	font-family: Mitr Light;
}
h1{
	font-size: 55px;
}
.logout{
	font-family: Impact;
	font-weight: 700;
	width: 20%;
	height:auto;
	background: #CCCC99	;

	color: white;
 font-size: 16px;
	border-radius: 10px;
	margin-top: 3%;
	text-decoration:none;
}
.back{

	width: 20%;
	height:auto;
	background-color: #228B22;
border-radius: 10px;
color: white;
text-decoration:none;

}
a{
	text-decoration:none;
}
</style>




</head>
<body>
	<div class="header">
	<center>
	<h1>รายการมอบหมายงาน</h1>
	<?php echo $DbarrUser["name"]." ระดับชั้นมัธยมศึกษาปีที่ ".$DbarrUser["class"];?><p>

		<table width="800" border="1" style="background:#F5F5DC;" >


			<?php
			while ($DbarrWork = mysqli_fetch_array($result))
			{
				?><tr><td>
					<h3> <?php echo "หัวข้อ: $DbarrWork[title] ส่งวันที่: $DbarrWork[date]";?></h3>
					<div>
						<p><?php echo "$DbarrWork[detail]"; ?></p>
						<p><?php echo "ผู้แจ้งงาน: $DbarrWork[name] แจ้งเมื่อวันที่: $DbarrWork[currentdatetime]"; ?></p>
					</div>

					<div class="line1">
							<p>แสดงความคิดเห็น</p>
					</div>

					<?php
					$sql = "Select * from commenttbl ";
					$ResultComment = mysqli_query($link, $sql);
					while ($DbarrComment = mysqli_fetch_array($ResultComment)){
						if ($DbarrWork["id" ]== $DbarrComment["link_id"]){?>

							<div id="ชือผูแจง" align="left"><?php echo "$DbarrComment[name]"; ?></div>
							<div id="คอมเมน" align="left"><?php echo "$DbarrComment[comment]"; ?></div><br><br>
							<?php
						}
					}
					?>
					<form name="form1" method="post" action="add_comment.php" align="left">
						<br>
						<textarea name="comment" cols="35" rows="4" ></textarea>
						<p><input type="submit" name="ส่งคอมเม้น" value="แสดงความคิดเห็น"></p>
						<input type="hidden" name="link_id" value="<?php echo "$DbarrWork[id]";?>">
						<input type="hidden" name="name_b" value="<?php echo "$DbarrUser[name]";?>">

					</form>
				</td>
					<td><p align="center" ><a href= delete_work.php?id=<?php echo "$DbarrWork[id]";?> ><font color="#CC0000">delete</font></a></p> </td>

					</tr>
					<?php
				}
				?>

			</table>





			<br>
			<div class="back" >
				 <a href=teacher_form.php><font style="color: white;text-decoration:none;">กลับสู่หน้าหลักteacher</font></a>
		 </div>
			<div class="logout">
			<a href="logout.php"><font style="font-family: Mitr Light;color:white;text-decoration:none;">Logout</font></a><p>
     </div>

			</center>
		</div>
			</body>
			</html>

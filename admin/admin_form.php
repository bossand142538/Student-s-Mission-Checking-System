<?php
session_start();
if($_SESSION['user'] == "")
{
	echo "Please Login!";
	exit();
}

if($_SESSION['status'] != "admin")
{
	echo "This page for admin only!";
	exit();
}


$link = mysqli_connect("localhost","root","1234");
mysqli_set_charset($link,'utf8');
mysqli_query($link, "use userdb;");
$sql = "Select * from usertbl where user = '".$_SESSION["user"]."' && password = '".$_SESSION["pass"]."'";
$ResultUser = mysqli_query($link, $sql);
$DbarrUser = mysqli_fetch_array($ResultUser);

?>
<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript" src="/project/jQueryui/jQuery.js"></script>
	<script type="text/javascript" src="/project/jQueryui/jQuery-ui.js"></script>
	<script >
	$(function(){
		$("#AccordionContents").accordion({collapsible: true, autoHeigh: true, active: false});
	});
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style type='text/css'>
body {cursor: url('http://fix.gs/pic/cursor/i/point60.cur'),auto;}
a {cursor: url('http://fix.gs/pic/cursor/i/point60.cur'),auto; }
html {
	background: url("/project/img/ppt-backgrounds-2340383_960_720.png") no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;}
	h1{
		font-family: Mitr Light;
		font-size: 50px;
	}


	body{
		font-family: Mitr Light;
	}
	#header{
		height:50px;

	}
	#content{ position:center;
		margin:0 250px 0 200px;
		padding:8px;

	}

	.กรอบขาว{
		width: 600px;
		height: auto;
		border: none;
		box-sizing: border-box;
		background-color: white;
		box-shadow: 5px 5px 10px 10px rgba(30,30,30,.1);
		font-family: Mitr Light;
	}
	.หัว{
		font-family:Impact;
		color: #FF6347;
	}

}
input{
	font-family: Mitr Light;
}
input[type="submit"]{
	border: none;
	color: white;
	padding: 16px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	-webkit-transition-duration: 0.4s; /* Safari */
	transition-duration: 0.4s;
	cursor: pointer;
	font-weight: 900;
	border-radius: 8px;
}
input[type="submit"]{background-color: #99FFFF;
	color: black;
	border: none;
}
input:hover[type="submit"]{background-color: #0099FF;
	color: white;}

	input[type="reset"]{
		border: none;
		color: white;
		padding: 16px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		-webkit-transition-duration: 0.4s; /* Safari */
		transition-duration: 0.4s;
		cursor: pointer;
		font-weight: 900;
		border-radius: 8px;
	}
	input[type="reset"]{background-color: #BEBEBE;
		color: black;
		border: none;}
		input:hover[type="reset"]{
			background-color:#FF3333 ;
			color: white;
			border: none;}
			textarea[ name="detail"]{
				font-size: 18px;
				font-family: Mitr Light;
				box-sizing: border-box;
				border: 1px solid #ccc;
				-webkit-transition: 0.5s;
				transition: 0.5s;
				outline: none;
			}
			textarea[ name="detail"]:focus {
				border: 1px solid #555;

			}
			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color:#B22222 ;
			}

			li {
				float: left;
				font-family: Mitr Light;

			}

			li a {
				display: block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}

			li a:hover:not(.active) {
				background-color: #111;
			}

			.active {
				background-color: #4CAF50;
			}




			</style>





			<meta http-equiv="Content-Typed" content="text/html;charset=utf8" />

			<script language="javascript">

			function show_class(id) {
				if(id == 1) { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2
					document.getElementById("class_1").style.display = "none";
					document.getElementById("class_2").style.display = "none";
				} else if(id == 2) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1
					document.getElementById("class_1").style.display = "none";
					document.getElementById("class_2").style.display = "";
				}
			}

			function show_people(id) {
				if(id == 1) { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2
					document.getElementById("people_1").style.display = "";
					document.getElementById("people_2").style.display = "none";
				} else if(id == 2) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1
					document.getElementById("people_1").style.display = "none";
					document.getElementById("people_2").style.display = "none";
				}
			}

			</script>

			<title>รายการมอบหมายการ</title>



		</head>






		<body>
			<div id="header">
				<ul>
					<li><a href="admin_form.php">เพิ่มผู้ใช้</a></li>
					<li><a href="admin_showuser.php">แก้ไขผู้ใช้</a></li>
					<li><a href="import_excel_upload.php">นำเข้าฐานข้อมูล</a></li>
					<li style="float:right"><a class="Logout" href="/project/login/logout.php">Logout</a></li>
				</ul>
			</div>








			<div id="content">
				<center>
					<h1>เพิ่มผู้ใช้</h1>


						<FORM METHOD=POST ACTION="insert_user.php">
						</center>
						<br>
						<center>
							<div class="กรอบขาว"><br><br><BR>
								<div class="หัว" align="left">
								</div>
								<br>
								username: <INPUT TYPE="text" NAME="user"><br>
									password: <INPUT TYPE="password" NAME="pass"><br>
										name : <INPUT TYPE="text" NAME="name"><br>
											status :
											<select name="status">
												<option value="student">student</option>
												<option value="teacher">teacher</option>
												<option value="admin">admin</option>
												</select><br>
												class: <INPUT TYPE="text" NAME="class">

										</div>

										<p>



											<br><br>
											<input type="submit" name="มอบหมายงาน" value="มอบหมายงาน">&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="reset" name="ยกเลิก" value="ยกเลิก"><p>

											</form>

											<br>

										</center>
									</div>
								</div>
							</body>
							</html>

<?php
	$link = mysqli_connect("localhost", "root","1234");
	mysqli_set_charset($link, 'utf8');
	$sql = "use userdb";
	$result = mysqli_query($link, $sql);
	$sql = "select * from usertbl";
	$result = mysqli_query($link, $sql);
	$DbarrUser = mysqli_fetch_array($result)
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
		<h1>แก้รายชื่อ</h1>

			<table width="800" border="1" style="background:#F5F5DC;" >


				<?php
				while ($DbarrUser = mysqli_fetch_array($result))
				{
					?><tr><td>
						<?php echo "$DbarrUser[name]<p>";	?>
					</td>
						<td><p align="center" ><a href= delete_user.php?id=<?php echo "$DbarrUser[id]";?> ><font color="#CC0000">delete</font></a></p> </td>

						</tr>
						<?php
					}
					?>

				</table>





				<br>
				<div class="back" >
					 <a href=admin_form.php><font style="color: white;text-decoration:none;">กลับสู่หน้าหลักadmin</font></a>
			 </div>
				<div class="logout">
				<a href="/project/login/logout.php"><font style="font-family: Mitr Light;color:white;text-decoration:none;">Logout</font></a><p>
	     </div>

				</center>
			</div>
				</body>
				</html>

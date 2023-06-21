<?php
session_start();
	if($_SESSION['user'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['status'] != "student")
	{
		echo "This page for student only!";
		exit();
	}

	$link = mysqli_connect("localhost","root","1234");
	mysqli_set_charset($link,'utf8');
	mysqli_query($link, "use userdb;");
	$SqlUser = "Select * from usertbl where user = '".$_SESSION["user"]."' && password = '".$_SESSION["pass"]."'";
	$ResultUser = mysqli_query($link, $SqlUser);
	$DbarrUser = mysqli_fetch_array($ResultUser);
	$SqlWork = "Select * from worktbl order by date asc;";
	$ResultWork = mysqli_query($link, $SqlWork);

	function datethai($datea)
	{
		$day = substr("$datea",8,2);
		$month = substr("$datea",5,2);
		$month = (int)$month -1;
		$year = substr("$datea",0,4);
		$year = $year + 543;
		$thaimonth = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$month = $thaimonth[$month];
		return (int)$day." ".$month." พ.ศ.".$year;
	}

	function DateDiff($strDate1,$strDate2)
	{
			 return "ผ่านไปแล้ว ".(strtotime($strDate1) - strtotime($strDate2))/  ( 60 * 60 * 24 )." วัน";  // 1 day = 60*60*24
	}

	$currentdatetime2 = (date("Y-m-d"));

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta charset="utf-8" >
	  <link rel="stylesheet"  media="screen and (min-width:1000px)" href="student1000px.css">
		<link rel="stylesheet"  media=" (max-width:900px)" href="student300px.css"/>

	</head>
	<body>

		<div id="header">
			<ul class="แถบเมณู">
				<li class="เมณู"><a href="/project/student/student_form.php">รายการมอบหมายงาน</a></li>
				<li class="เมณู" ><a href="/project/student/student_form2.php">รายการงานที่สั่งไปแล้ว</a></li>
				<li class="เมณู" style="float:right"><a class="Logout" href="/project/login/logout.php">Logout</a></li>
			</ul>
		</div>





		<center>
			<div id="content">
				<br>
				<h1>รายการที่สั่งไปแล้ว</h1>
				<p class="nameclass" ><?php echo $DbarrUser["name"]." ระดับชั้นมัธยมศึกษาปีที่ ".$DbarrUser["class"];?></p>
				<br>
				<div class="กรอบของปุ่ม">

					<?php
					while ($DbarrWork = mysqli_fetch_array($ResultWork))
					{
						if($DbarrWork["class"] == $_SESSION['class'] && $DbarrWork["date"] <= $currentdatetime2 ){
							?>
							<div class="ปุ่ม">
								<button class="accordion">
									<?php

								echo DateDiff($currentdatetime2,"$DbarrWork[date]")." หัวข้อ: $DbarrWork[title]"; ?></button>
								<div class="panel">

									<p align="left" style="font-weight: 900;"><?php echo "ผู้แจ้งงาน: $DbarrWork[name] ส่งวันที่: ".datethai("$DbarrWork[date]"); ?></p>
									<p align="left" ><?php echo "$DbarrWork[detail]"; ?></p>
									<?php if($DbarrWork['file'] != 0){ ?>
										<img src=/project/teacher/image/<?php echo $DbarrWork['file']; ?>><br>
										<?php
									}
									?>
									<p align="left" class="ผูแจง" ><?php echo "แจ้งเมื่อวันที่: $DbarrWork[currentdatetime]"; ?></p>


									<div class="อักษรใน">

	            <div class="bg">
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
									</div>
									</div>
								</div>
							</div>


							<?php
						}
					}
					?>


				</div>

			</center>

			<script>
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
				acc[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var panel = this.nextElementSibling;
					if (panel.style.maxHeight){
						panel.style.maxHeight = null;
					} else {
						panel.style.maxHeight = panel.scrollHeight + "px";
					}
				});
			}
		</script>
	</body>
	</html>

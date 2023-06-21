<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" >
  <link rel="stylesheet"  media="screen and (min-width:1000px)" href="login1000.css">
  <link rel="stylesheet"  media=" (max-width:900px)" href="login300.css"/>
</head>
<body>
  <div id="header" align="center">
    <ul class="logo" align="left">
      <font color= "black" style="font-family:Impact">PCCNST&nbsp;&nbsp;WORKBOOK</font></p>
    </ul>
    <div class="headerin">
      <h1>Make life easy in your way</h1>
    </div>
    <div class="headertext">
      <font class="texthead">ใช้ชีวิตให้ง่ายในแบบของคุณ</font>
    </div>
    <br><br>
    <button class="pom" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">start</button>
    <br>
    <div class="compic" >
      <img src="/project/img/ttttt.png" class="compicin">
    </div>
  </div>
  <div id="id01" class="modal" align="center">

    <form method=post class="modal-content animate" action="/project/login/check_user.php">

      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="/project/img/homework-icon-1.png"  alt="Avatar" class="avatar" style="width:100px" >
        <br>
        <font class="textin" >PCCNST&nbsp;&nbsp;WORKBOOK</font>
      </div>
      <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="user" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" required>

        <button class="pom2" type="submit" value="login">เข้าสู่ระบบ</button>
        <label>
          <input type="checkbox" checked="checked"> Remember me
        </label>
      </div>
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
  </div>
  <div id="content" style="height:auto">
    <div class="textcenter">
      <div>
        <img src="/project/img/wow.png" class="computer" align="right" >
        <h2>ดูข้อมูลได้จากทุกที่</h2>
        คุณจะสามารถเข้าถึงงานของคุณจากสมาร์ทโฟน <br>
        แท็บเล็ต หรือคอมพิวเตอร์ ไม่ว่าจะอยู่ที่ไหน <br>งานเหล่านั้นจะไปกับคุณทุกที่
      </div>
    </div>
  </div>
  <div id="footer" align="center">
    <h2  class="textfoot">ติดตามข่าวสารจากพวกเราได้ที่นี้<h2>
      <br>
      <a href="http://www.pccnst.ac.th/pcshsnst/" target="_blank">PCCNST</a>
      <br><br><br>
      <div class="Slides" style="max-width:75%;">
        <img class="mySlides" src="/project/img/20954104_1638424112895953_3327154731634658273_n.jpg" style="width:100%;height:70%;">
        <img class="mySlides" src="/project/img/DSC_4804.jpg" style="width:100%;height:70%;">
        <img class="mySlides" src="/project/img/DSC_1086.jpg" style="width:100%;height:70%;">
      </div>

      <script>
      var myIndex = 0;
      carousel();

      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 3500); // Change image every 4 seconds
      }
      </script>
    </div>




  </body>

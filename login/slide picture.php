<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.mySlides{
  display:none;}
</style>
<body>

<div class="w3-content" style="max-width:800px">
  <img class="mySlides" src="img_nature_wide.jpg" style="width:100%">
  <img class="mySlides" src="img_fjords_wide.jpg" style="width:100%">
  <img class="mySlides" src="img_mountains_wide.jpg" style="width:100%">
</div>

<div class="w3-center">
  <div class="w3-section">
    <button class="w3-btn" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-btn" onclick="plusDivs(1)">Next ❯</button>
  </div>
  <button class="w3-btn demo" onclick="currentDiv(1)">1</button>
  <button class="w3-btn demo" onclick="currentDiv(2)">2</button>
  <button class="w3-btn demo" onclick="currentDiv(3)">3</button>
</div>


<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-red";
}
</script>


</body>
</html>

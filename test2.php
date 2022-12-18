<!DOCTYPE html>
<html>
<head><title>Demo HTML DOM + Javascript </title></head>
<body>
<button onclick="showBandung()">Bandung</button>
<span onclick="showJakarta()" style="border:1px solid black">Jakarta</span>
<a href ="#" onmouseover="showSurabaya()">Surabaya</a>
<div id="isi" style="border:1px solid black;font-size:28pt">&nbsp;</div>
<script>
function
showBandung () {
    var isi = document.getElementById("isi");
    isi.innerHTML = "Bandung adalah ibukota Provinsi Jawa Barat<br>";
    }
function
showJakarta () {
var isi = document.getElementById("isi");
isi.innerHTML="Jakarta adalah ibukota Republik Indonesia<br>";
}
function
showSurabaya () {
var isi = document.getElementById("isi");
isi.innerHTML ="Surabaya adalah ibukota Provinsi Jawa Timur<br>";
}
</script>
</body>
</html>
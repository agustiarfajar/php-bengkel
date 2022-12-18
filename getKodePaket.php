<?php
include_once("functions.php");
$kdPaket = $_GET["kdPaket"];
$db = dbConnect();
$sql = "SELECT kdPaket,harga FROM paket WHERE kdPaket='$kdPaket'" .$db->escape_string($kdPaket);
$res = $db->query($sql);
$data = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);
?>
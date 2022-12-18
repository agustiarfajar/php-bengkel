<?php include_once("functions.php");?>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	if(isset($_POST["btnlogin"])){
		$idPegawai=$db->escape_string($_POST["idPegawai"]);
		$password=$db->escape_string($_POST["password"]);
		$sql="SELECT idPegawai,namaPegawai,jk,alamat,notelp FROM pegawai
			  WHERE idPegawai='$idPegawai' and pass=password('$password')";
		$res=$db->query($sql);
		if($res){
			if($res->num_rows==1){
				$data=$res->fetch_assoc();
				session_start();
				$_SESSION["idPegawai"]=$data["idPegawai"];
				$_SESSION["namaPegawai"]=$data["namaPegawai"];
				$_SESSION["jk"]=$data["jk"];
				$_SESSION["alamat"]=$data["alamat"];
				$_SESSION["notelp"]=$data["notelp"];
				header("Location: index-dashboard.php");
			}
			else
				header("Location: index.php?error=1");
		}
	}
	else 
		header("Location: index.php?error=2");	
	
}
else 
	header("Location: index.php?error=3");

?>
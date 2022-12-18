<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>Tambah Pegawai</title></head>
<style>
	body {
        background: #fff2f1;
        padding: 10px;
		margin-left: 200px;
		position: relative;
    }
    h2 {
        margin:auto;
        color:purple;
        text-align:left;
        font-weight:bold;
        display: block;
        width: 100%;
        padding-bottom:20px;
    }
	.main {
		padding: 20px;
		position: relative;
	}
    .btn-kembali {
		background-color: black;
		color: white;
		text-align: center;
		padding: 10px;
		width: 110px;
		text-decoration: none;
		border-radius: 8px;
        border:0;
	}
	.btn-kembali:hover {
		background-color: purple;
	}
	.aksi {
		padding: 10px;
		text-align: center;
		font-weight: bold;
		text-decoration: none;
	}
	.aksi:hover {
		color:salmon;
	}
	.atr {
		background-color: purple;
		color:white;
		text-align: center;
		font-weight: bold;
		font-size: 16px;
	}
	.error {
        background-color:mistyrose;
        padding:10px;
        color:red;
        display:block;
        position:relative;
        border: 2px solid red;
        font-size:10px;
        width:fit-content;
        font-weight:bold;
    }
</style>
<?php navigator();?>
<body>
<div class="main">
    <h2>Tambah Pegawai</h2>
	<?php
    if(isset($_POST["btntambah"])) {
        $db=dbConnect();
        if($db->connect_errno==0){
            $idPegawai=$db->escape_string($_POST["idPegawai"]);
            $namaPegawai=$db->escape_string($_POST["namaPegawai"]);
            $jk=$db->escape_string($_POST["jk"]);
            $alamat=$db->escape_string($_POST["alamat"]);
            $notelp=$db->escape_string($_POST["notelp"]);
            $sql="INSERT INTO pegawai (idPegawai,namaPegawai,jk,alamat,notelp) VALUES ('$idPegawai','$namaPegawai','$jk','$alamat','$notelp')";
            $res=$db->query($sql);
            if($res) {
                if($db->affected_rows>0) {
                    ?>
                    <div class="error">
                        <i class="fa-solid fa-fw fa-circle-info" style="font-size:14px">&nbsp</i>
                        DATA BERHASIL DISIMPAN
                    </div>
                    <br>
                    <a href="pegawai.php" class="btn-kembali">View Pegawai</a>
                    <?php
                }
            } else {
                ?>
                <div class="error">
                    <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                    DATA GAGAL DISIMPAN KARENA ID PEGAWAI SUDAH TERDAFTAR
                </div>
                <br>
                <a href="javascript:history.back()" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a>
                <?php
            }
        } else {
            ?>
            <div class="error">
                <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                <?php echo "GAGAL KONEKSI DATABASE".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>"; ?>
            </div>
            <?php
        }
	}
	?>	
</div>
</body>
</html>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>Tambah Transaksi</title></head>
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
    <h2>Tambah Transaksi</h2>
	<?php
    if(isset($_POST["btntambah"])) {
        $db=dbConnect();
        if($db->connect_errno==0){
            $idPelanggan=$db->escape_string($_POST["idPelanggan"]);
            $idPegawai=$db->escape_string($_POST["idPegawai"]);
            $kdPaket=$db->escape_string($_POST["kdPaket"]);
            $berat=$db->escape_string($_POST["berat"]);
            $noTransaksi=$db->escape_string($_POST["noTransaksi"]);
            $total=$db->escape_string($_POST["total"]);
            $tanggal=$db->escape_string($_POST["tanggal"]);
            $sql="INSERT INTO transaksi (noTransaksi,tanggal,idPegawai,idPelanggan,kdPaket,berat,total)
                  VALUES (DEFAULT,NOW(),'".$_SESSION["idPegawai"]."','$idPelanggan','$kdPaket','$berat','$total')";
            $res=$db->query($sql);
            if($res) {
                if($db->affected_rows>0) {
                    ?>
                    <div class="error">
                        <i class="fa-solid fa-fw fa-circle-info" style="font-size:14px">&nbsp</i>
                        DATA BERHASIL DISIMPAN
                    </div>
                    <br>
                    <a href="transaksi.php" class="btn-kembali">View Transaksi</a>
                    <?php
                }
            } else {
                ?>
                <div class="error">
                    <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                    DATA GAGAL DISIMPAN KARENA ID PEGLANGGAN SUDAH TERDAFTAR
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
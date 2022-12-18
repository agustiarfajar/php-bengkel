<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>Hapus Pelanggan</title></head>
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
    <h2>Hapus Pelanggan</h2>
	<?php
    if(isset($_POST["btnhapus"])) {
        $db=dbConnect();
        if($db->connect_errno==0){
            $idPelanggan=$db->escape_string($_POST["idPelanggan"]);
            $sql="DELETE FROM pelanggan WHERE idPelanggan='$idPelanggan'";
            $res=$db->query($sql);
            if($res) {
                if($db->affected_rows>0) {
                    ?>
                    <div class="error">
                        <i class="fa-solid fa-fw fa-circle-info" style="font-size:14px">&nbsp</i>
                        DATA BERHASIL HAPUS
                    </div>
                    <br>
                    <a href="pelanggan.php" class="btn-kembali">View Pelanggan</a>
                    <?php
                } else {
                    ?>
                    <div class="error">
                        <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                        DATA TIDAK ADA. PENGHAPUSAN GAGAL
                    </div>
                    <br>
                    <a href="pelanggan.php" class="btn-kembali">View Pelanggan</a>
                    <?php
                }
            } else {
                ?>
                <div class="error">
                    <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                    DATA GAGAL DIHAPUS
                </div>
                <br>
                <a href="pelanggan.php" class="btn-kembali">View Pelanggan</a>
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
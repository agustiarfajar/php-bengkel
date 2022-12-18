<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>Hapus Pelanggan</title></head>
<style>
	body {
        background: #fff2f1;
        padding: 20px;
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
        padding-top:20px;
    }
    input {
        height:30px;
        margin-left:20px;
    }
	.main {
		padding: 20px;
        padding:20px;
        box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 12px;
        background:white;
        width: fit-content;
	}
    .td {
        height:60px;
        vertical-align: top;
    }
	.btn {
		background-color: black;
		color: white;
		text-align: center;
		padding: 10px;
		width: 110px;
		border-radius: 8px;
        border:0;
	}
	.btn:hover {
		background-color: purple;
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
<a href="pelanggan.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a>
<h2>Hapus Pelanggan</h2>
<?php
    if(isset($_GET["idPelanggan"])) {
        $db=dbConnect();
        $idPelanggan=$db->escape_string($_GET["idPelanggan"]);
        if($data=getDataPelanggan($idPelanggan)){
            ?>
            <div class="main">
                <form method="post" action="pelanggan-hapus-process.php" >
                    <table>
                        <tr>
                            <td class="td"><strong>ID Pelanggan</strong><br>
                            <input type="text" name="idPelanggan" size="50" maxlength="4"
                            value="<?php echo $data["idPelanggan"]; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="td"><strong>Nama Pelanggan</strong><br>
                            <input type="text" name="namaPelanggan" size="50" maxlength="30"
                            value="<?php echo $data["namaPelanggan"]; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="td"><strong>Jenis Kelamin</strong><br>
                            <select name="jk" style="margin-left:20px">
                                <option value="<?php echo $data["jk"]; ?>" selected><?php echo $data["jk"]; ?></option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="td"><strong>Alamat</strong><br>
                            <input type="text" name="alamat" size="50"
                            value="<?php echo $data["alamat"]; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="td"><strong>No. Telp</strong><br>
                            <input type="text" name="notelp" size="50" maxlength="13"
                            value="<?php echo $data["notelp"]; ?>" readonly></td>
                        </tr>
                    </table>
                    <br>
                    <table style="display:block">
                        <td width="375px" style="font-size:13px;"><strong>Apakah anda yakin ingin menghapus data ini?</strong></td>
                        <td><button type="submit" name="btnhapus" class="btn">Hapus</button></td>
                    </table>
                </form>
            </div>
            <?php
        } else {
            ?>
            <div class="error">
                <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                <?php echo"PELANGGAN DENGAN ID : $idPelanggan TIDAK ADA. PENGHAPUSAN DIBATALKAN"; ?>
            </div>
            <br>
            <a href="pelanggan.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a>
            <?php
        }
    } else {
        ?>
        <div class="error">
            <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
            ID PELANGGAN TIDAK ADA. PENGHAPUSAN DIBATALKAN
        </div>
        <br>
        <a href="pelanggan.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a>
        <?php
    }
?>
</body>
</html>

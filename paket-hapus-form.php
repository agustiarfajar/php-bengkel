<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>Hapus Paket</title></head>
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
<a href="paket.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a>
<h2>Hapus Paket Laundry</h2>
<?php
    if(isset($_GET["kdPaket"])) {
        $db=dbConnect();
        $kdPaket=$db->escape_string($_GET["kdPaket"]);
        if($data=getDataPaket($kdPaket)){
            ?>
            <div class="main">
                <form method="post" action="paket-hapus-process.php" >
                    <table>
                        <tr>
                            <td class="td"><strong>Kode Paket</strong><br>
                            <input type="text" name="kdPaket" size="50" maxlength="4"
                            value="<?php echo $data["kdPaket"]; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="td"><strong>Nama Paket</strong><br>
                            <input type="text" name="namaPaket" size="50" maxlength="30"
                            value="<?php echo $data["namaPaket"]; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="td"><strong>Harga</strong><br>
                            <input type="text" name="harga" size="50" maxlength="10"
                            value="<?php echo $data["harga"]; ?>" readonly>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table style="display:block">
                    <td style="font-size:13px;width:375px"><strong>Apakah anda yakin ingin menghapus data ini?</strong></td>
                        <td><button type="submit" name="btnhapus" class="btn">Hapus</button></td>
                    </table>
                </form>
            </div>
            <?php
        } else {
            ?>
            <div class="error">
                <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                <?php echo"PAKET DENGAN KODE : $kdPaket TIDAK ADA. PENGHAPUSAN DIBATALKAN"; ?>
            </div>
            <br>
            <a href="paket.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a>
            <?php
        }
    } else {
        ?>
        <div class="error">
            <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
            KODE PAKET TIDAK ADA. PENGHAPUSAN DIBATALKAN
        </div>
        <br>
        <a href="paket.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a>
        <?php
    }
?>
</body>
</html>

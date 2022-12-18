<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>Cari Paket</title></head>
<style>
	body {
        background: #fff2f1;
        padding: 10px;
		margin-left: 200px;
		position: relative;
    }
    h2 {
        position:relative;
        margin:auto;
        color:purple;
        text-align:left;
        font-weight:bold;
        display: block;
        width: 100%;
        padding-top:30px;
        padding-bottom:10px;
    }
	.main {
		padding: 20px;
		position: relative;
	}
	.table {
        padding:20px;
        box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 12px;
        background:white;
        margin-top: 10px;
    }
	.table thead {
		position: sticky;
		top:0;
		z-index:10;
		background:purple;
		color:white;
		font-weight:bold;
		font-size:16px;
		text-align:center;
	}
	.table th, .table td {
		border-bottom: 1px solid black;
		height: 40px;
		padding: 0px 10px 0px 10px;
	}
	.table tr, .table thead {
		display: table;
		width: 100%;
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
        margin-left:0;
        border: 2px solid red;
        font-size:10px;
        width:fit-content;
        font-weight:bold;
    }
</style>
<?php navigator();?>
<body>
<div class="main">
    <a href="paket.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a><br>
	<?php
    if (isset($_POST["btncari"])) {
        $db=dbConnect();
        $cari=$_POST["cari"];
        if($db->connect_errno==0){
            $sql="SELECT * FROM paket
                where kdPaket like '%$cari%' or namaPaket like '%$cari%'";
            $res=$db->query($sql);
            if($res) {
                ?>
                <h2>Hasil Pencarian "<?php echo $cari; ?>"</h2>
                <?php
                if($res->num_rows>0) {
                    ?>
                    Ditemukan sebanyak <?php echo $res->num_rows;?> data
                    <div class="table">
                        <div style="overflow-y:scroll;height:400px">
                            <table style="border-collapse:collapse;min-width:max-content">
                                <thead><tr>
                                    <th style="width:200px">Kode Paket</th>
                                    <th style="width:360px">Nama Paket</th>
                                    <th style="width:150px">Harga</th>
                                    <th style="width:250px">Aksi</th>
                                </tr></thead>
                            <?php
                            $data=$res->fetch_all(MYSQLI_ASSOC);
                            foreach($data as $barisdata){
                                ?>
                                <tr>
                                    <td align="center" style="width:200px"><?php echo $barisdata["kdPaket"];?></td>
                                    <td style="width:360px"><?php echo $barisdata["namaPaket"];?></td>
                                    <td align="right" style="width:150px">
                                        <?php echo number_format($barisdata["harga"],0,",",".");?>
                                    </td>
                                    <td align="center" style="width:125px">
                                        <a href="paket-edit-form.php?kdPaket=
                                            <?php echo $barisdata["kdPaket"]; ?>"
                                            class="aksi" align="center">
                                            <i class="fa-solid fa-pencil fa-fw"></i>
                                            EDIT
                                        </a>
                                    </td>
                                    <td align="center" style="width:125px">
                                        <a href="paket-hapus-form.php?kdPaket=
                                            <?php echo $barisdata["kdPaket"]; ?>"
                                            class="aksi">
                                            <i class="fa-solid fa-trash-can fa-fw"></i>
                                            HAPUS
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            $res->free();
                            ?>
                            </table>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="error">
                        <i class="fa-solid fa-fw fa-circle-info" style="font-size:14px">&nbsp</i>
                        DATA TIDAK DITEMUKAN
                    </div>
                    <br>
                    <a href="paket.php" class="btn-kembali">View Paket</a>
                    <?php
                }
            } else {
                ?>
                <div class="error">
                    <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                    <?php echo "GAGAL EKSEKUSI SQL QUERY".(DEVELOPMENT?" : ".$db->error:"")."<br>"; ?>
                </div>
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
	} else {
        ?>
        <div class="error">
            <i class="fa-solid fa-fw fa-circle-info" style="font-size:14px">&nbsp</i>
            ISI ID/NAMA PAKET TERLEBIH DAHULU
        </div>
        <?php
    }
	?>
</div>
</body>
</html>
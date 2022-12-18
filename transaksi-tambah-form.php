<?php include_once("functions.php"); $db=dbConnect(); ?>
<!DOCTYPE html>
<script src="jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>Tambah Transaksi</title></head>
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
<a href="transaksi.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a><br>
<h2>Tambah Transaksi</h2>
<div class="main">
    <form method="post" action="transaksi-tambah-process.php">
        <table>
            <tr>
                <td class="td"><strong>ID Pelanggan</strong><br>
                <select name="idPelanggan" style="margin-left:20px" required>
                    <option value="" selected disabled required>Pilih ID Pelanggan</option>
                    <?php
                        $datapelanggan=getListPelanggan();
                        foreach($datapelanggan as $data){
                            echo "<option value=\"".$data["idPelanggan"]."\">[".$data["idPelanggan"]."]".$data["namaPelanggan"]."</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td class="td"><strong>Kode Paket</strong><br>
                <select name="kdPaket" id="kdPaket" style="margin-left:20px" onchange="getHarga()" required>
                    <option value="" selected disabled required>Pilih Kode Paket</option>
                    <?php 
                        $res=$db->query("SELECT * FROM paket ORDER BY kdPaket");
                        $datapaket=$res->fetch_all(MYSQLI_ASSOC);
                        foreach($datapaket as $kd){
                            echo "<option data-harga='".$kd["harga"]."' value=\"".$kd["kdPaket"]."\">[".$kd["kdPaket"]."]".$kd["namaPaket"]."</option>";
                        }
                    ?>
                </select>
            </tr>
            <tr>
                <td class="td"><strong>Harga</strong><br>
                    <input type="text" name="harga" id="harga" style="width:100px">
                </td>
            </tr>
        </div>
            <tr>
                <td class="td"><strong>Berat (kg)</strong><br>
                <input type="number" step="0.1" min="0" name="berat" id="berat" style="width:100px" placeholder="0" required></td>
            </tr>
            <tr>
                <td class="td"><strong>Total</strong><br>
                <input type="text" name="total" id="total" style="width:100px" readonly>
                </td>
            </tr>
        </table>
        <br>
        <table style="display:block;width:350px;margin-left:80px">
            <tr>
            <td align="center"><button type="submit" name="btntambah" class="btn">Tambah</button></td>
            <td style="width:20px"></td>
            <td align="center"><button type="reset" class="btn">Clear</button></td>
            </tr>
        </table>
    </form>
</div>

<script>
    var harga = 0;
    function getHarga()
    {
       harga = $('#kdPaket').find(':selected').attr('data-harga');
       harga = parseFloat(harga);
       $('#harga').val(harga); 
    }
</script>
</body>
</html>

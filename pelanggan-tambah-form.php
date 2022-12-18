<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>Tambah Peelanggan</title></head>
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
<a href="pelanggan.php" class="btn-kembali"><i class="fa-solid fa-circle-chevron-left"></i>&nbspKembali</a><br>
<h2>Tambah Pelanggan</h2>
<div class="main">
    <form method="post" action="pelanggan-tambah-process.php">
        <table>
            <tr>
                <td class="td"><strong>ID Pelanggan</strong><br>
                <input type="text" name="idPelanggan" size="50" maxlength="4" placeholder="Masukkan ID pelanggan disini"
                oninput="this.value=this.value.toUpperCase()" pattern="[A-Z0-9]+" title="Isi dengan huruf kapital dan angka, tanpa spasi." required></td>
            </tr>
            <tr>
                <td class="td"><strong>Nama Pelanggan</strong><br>
                <input type="text" name="namaPelanggan" size="50" maxlength="30" placeholder="Masukkan nama pelanggan disini"
                pattern="[A-Za-z\s']+" title="Isi dengan huruf dan tanda ( ' )" required></td>
            </tr>
            <tr>
                <td class="td"><strong>Jenis Kelamin</strong><br>
                <select name="jk" style="margin-left:20px" required>
                    <option value="" selected disabled required>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                </td>
            </tr>
            <tr>
                <td class="td"><strong>Alamat</strong><br>
                <input type="text" name="alamat" size="50" placeholder="Masukkan alamat disini"
                pattern="[A-Za-z0-9\s./,]+" title="Isi dengan huruf, angka dan tanda [ ' . , / ]"required></td>
            </tr>
            <tr>
                <td class="td"><strong>No. Telp</strong><br>
                <input type="text" name="notelp" size="50" maxlength="13" placeholder="Masukkan no telp disini"
                pattern="[0-9]+" title="Isi dengan angka saja"required></td>
            </tr>
        </table>
        <br>
        <table style="display:block;margin-left:120px">
            <td><button type="submit" name="btntambah" class="btn">Tambah</button></td>
            <td style="width:20px"></td>
            <td><button type="reset" class="btn">Clear</button></td>
        </table>
    </form>
</div>
</body>
</html>

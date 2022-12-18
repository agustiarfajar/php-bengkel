<?php include_once("functions.php");?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<html><head><title>View Pelanggan</title></head>
<style>
	body {
        background: #fff2f1;
        padding: 0px 10px 10px 10px;
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
		max-width: fit-content;
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
	.btn-cari {
		background:black;
		color:white;
		border:0;
		padding:10px;
		border-radius:8px;
		width:50px;
	}
	.btn-cari:hover {
		background-color: purple;
	}
	.btn-tambah {
		background-color: black;
		color: white;
		text-align: center;
		padding: 10px;
		width: 110px;
		text-decoration: none;
		border-radius: 8px;
		float: right;
	}
	.btn-tambah:hover {
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
	<h2>Data Pelanggan</h2>
	<?php
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql="SELECT * FROM pelanggan";
		$res=$db->query($sql);
		if($res){
			?>
			<div>
				<div style="padding-top:10px; padding-bottom:10px">
					<form method="post" action="pelanggan-cari.php">
						<input type="text" name="cari" placeholder="Cari ID/Nama Pelanggan" style="width:400px;height:40px" required>
						<button type="submit" name="btncari" class="btn-cari">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
						<a href="pelanggan-tambah-form.php" class="btn-tambah"><i class="fa-solid fa-circle-plus"></i>&nbspTambah</a>
					</form>
				</div>
			</div>
			<div class="table">
				<div style="overflow:scroll;height:370px">
					<table style="border-collapse:collapse;min-width:max-content">
						<thead><tr>
							<th style="width:150px">ID Pelanggan</th>
							<th style="width:220px">Nama Pelanggan</th>
							<th style="width:150px">Jenis Kelamin</th>
							<th style="width:165px">Alamat</th>
							<th style="width:160px">Telp</th>
							<th style="width:250px">Aksi</th>
						</thead></tr>
					<?php
					$data=$res->fetch_all(MYSQLI_ASSOC);
					foreach($data as $barisdata){
						?>
						<tr>
							<td align="center" style="width:150px"><?php echo $barisdata["idPelanggan"];?></td>
							<td style="width:220px"><?php echo $barisdata["namaPelanggan"];?></td>
							<td align="center" style="width:150px"><?php echo $barisdata["jk"];?></td>
							<td style="width:165px"><?php echo $barisdata["alamat"];?></td>
							<td align="center"style="width:160px"><?php echo $barisdata["notelp"];?></td>
							<td align="center" style="width:125px">
								<a href="pelanggan-edit-form.php?idPelanggan=<?php echo $barisdata["idPelanggan"]; ?>" class="aksi" align="center">
									<i class="fa-solid fa-pencil fa-fw"></i>
									EDIT
								</a>
							</td>
							<td align="center" style="width:125px">
								<a href="pelanggan-hapus-form.php?idPelanggan=<?php echo $barisdata["idPelanggan"]; ?>" class="aksi">
									<i class="fa-solid fa-trash-can fa-fw"></i>
									HAPUS
								</a>
							</td>
						</tr>
						<?php
					}
					?>
					</table>
				</div>
			</div>
			<?php
			$res->free();
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
	?>	
</div>
</body>
</html>
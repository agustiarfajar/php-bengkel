<?php
	session_start();
	if(!isset($_SESSION["idPegawai"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<head><title>Dashboard</title></head>
<style>
    body {
        background: #fff2f1;
        padding: 20px;
		margin-left: 200px;
		position: relative;
    }
    p {
        position:relative;
        margin:auto;
        color:purple;
        text-align:left;
        font-weight:bold;
        display: block;
        width: 100%;
    }
    h2 {
        position:relative;
        margin:auto;
        margin-top: 20px;
        background: purple;
        color:white;
        text-align:center;
        font-weight:bold;
        display: block;
        width: 100%;
        border-radius: 12px;
        padding:10px;
    }
    .menu {
        padding:20px;
        box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 12px;
        background:white;
    }
    .sum {
        font-size:50px;
        width:300px;
    }
    .title {
        color:#CD5C5C;
        font-weight:bold;
    }
    .logo {
        color:purple;
        font-size:50px;
    }
</style>
<?php navigator();?>
<body>
<p>Selamat Datang, <?php echo $_SESSION["namaPegawai"]; ?> !</p>
<h2>DASHBOARD</h2><br>
<div style="position:relative;width:100%;">
    <div>
        <table>
            <tr>
                <td>
                    <div class="menu">
                        <table border="0">
                            <tr>
                                <td class="sum">
                                    <?php
                                        $db=dbConnect();
                                        $sql="SELECT * FROM paket";
		                                $res=$db->query($sql);
                                        $data=$res->fetch_all(MYSQLI_ASSOC);
                                        $jumlah = count($data);
                                        echo $jumlah;
                                    ?>
                                </td>
                                <td rowspan="2" class="logo"><i class="fa-solid fa-fw fa-boxes-stacked"></i></td>                                </td>
                            </tr>
                            <tr>
                                <td class="title">Paket Laundry</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="width:20px"></td>
                <td>
                    <div class="menu">
                        <table border="0">
                            <tr>
                                <td class="sum">
                                    <?php
                                        $db=dbConnect();
                                        $sql="SELECT * FROM pegawai";
		                                $res=$db->query($sql);
                                        $data=$res->fetch_all(MYSQLI_ASSOC);
                                        $jumlah = count($data);
                                        echo $jumlah;
                                    ?>
                                </td>
                                <td rowspan="2" class="logo"><i class="fa-solid fa-users"></i></td>
                            </tr>
                            <tr>
                                <td class="title">Pegawai</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="width:20px"></td>
                <td>
                    <div class="menu">
                        <table border="0">
                            <tr>
                                <td class="sum">
                                <?php
                                    $db=dbConnect();
                                    $sql="SELECT * FROM pelanggan";
		                            $res=$db->query($sql);
                                    $data=$res->fetch_all(MYSQLI_ASSOC);
                                    $jumlah = count($data);
                                    echo $jumlah;
                                ?>
                                </td>
                                <td rowspan="2" class="logo"><i class="fa-solid fa-address-book"></i></td>
                            </tr>
                            <tr>
                                <td class="title">Pelanggan</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="menu">
        <table border="0">
            <tr>
                <td class="sum">
                    
                </td>
                <td rowspan="2" class="logo"><i class="fa-solid fa-coins"></i></td>
            </tr>
            <tr>
                <td class="title">Pendapatan</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
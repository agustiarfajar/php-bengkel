<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="w3.css">
<style>
    .nav {
        background-color: black;
        color: violet;
        height: 100%;
        width: 200px;
        position: fixed;
        top: 0;
        left: 0;
        padding: 15px;
        font-size: 16px;
    }
    .nav-header {
        display: block;
        position: relative;
        margin: auto;
        background-image: linear-gradient(to right, indigo , salmon);
        color: white;
        padding: 10px;
        text-align: center;
        border-radius: 8px;
    }
    .nav-menu {
        text-decoration: none;
        display: block;
    }
    .nav-menu:hover {
        color: white;
        cursor: pointer;
    }
    .nav-credits {
        position: absolute;
        bottom:20px;
        font-size:12px;
        color:gray
    }
    .errorLogin {
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
<body>
    <?php

use JetBrains\PhpStorm\Language;

        define("DEVELOPMENT",TRUE);

        // koneksi database
        function dbConnect(){
            $db = new mysqli("localhost", "root", "", "tugas2atol");
            return $db;
        }

        // ambil data paket dari database
        function getDataPaket($kdPaket){
            $db=dbConnect();
            if($db->connect_errno==0){
                $res=$db->query("SELECT * FROM paket WHERE kdPaket = '$kdPaket'");
                if($res){
                    if($res->num_rows>0){
                        $data=$res->fetch_assoc();
                        $res->free();
                        return $data;
                    }
                    else
                        return FALSE;
                }
                else
                    return FALSE; 
            }
            else
                return FALSE;
        }
        function getListPaket() {
            $db=dbConnect();
            if($db->connect_errno==0){
                $res=$db->query("SELECT * FROM paket ORDER BY kdPaket");
                if($res){
                    $data=$res->fetch_all(MYSQLI_ASSOC);
                    $res->free();
                    return $data;
                }
                else
                    return FALSE; 
            }
            else
                return FALSE;
        }

        // ambil data pegawai dari database
        function getDataPegawai($idPegawai){
            $db=dbConnect();
            if($db->connect_errno==0){
                $res=$db->query("SELECT * FROM pegawai WHERE idPegawai = '$idPegawai'");
                if($res){
                    if($res->num_rows>0){
                        $data=$res->fetch_assoc();
                        $res->free();
                        return $data;
                    }
                    else
                        return FALSE;
                }
                else
                    return FALSE; 
            }
            else
                return FALSE;
        }
        function getListPegawai() {
            $db=dbConnect();
            if($db->connect_errno==0){
                $res=$db->query("SELECT * FROM pegawai ORDER BY idPegawai");
                if($res){
                    $data=$res->fetch_all(MYSQLI_ASSOC);
                    $res->free();
                    return $data;
                }
                else
                    return FALSE; 
            }
            else
                return FALSE;
        }

        // ambil data transaksi dari database
        function getDataTransaksi($noTransaksi){
            $db=dbConnect();
            if($db->connect_errno==0){
                $res=$db->query("SELECT t.noTransaksi, t.tanggal, a.namaPegawai,
                                 p.namaPelanggan, pk.namaPaket, t.berat, t.total
                                 FROM transaksi t JOIN pegawai a ON t.idPegawai = a.idPegawai 
                                 JOIN pelanggan p ON t.idPelanggan = p.idPelanggan 
                                 JOIN paket pk ON t.kdPaket = pk.kdPaket
                                 WHERE t.noTransaksi = '$noTransaksi'");
                if($res){
                    if($res->num_rows>0){
                        $data=$res->fetch_assoc();
                        $res->free();
                        return $data;
                    }
                    else
                        return FALSE;
                }
                else
                    return FALSE; 
            }
            else
                return FALSE;
        }

        // ambil data pelanggan dari database
        function getDataPelanggan($idPelanggan){
            $db=dbConnect();
            if($db->connect_errno==0){
                $res=$db->query("SELECT * FROM pelanggan WHERE idPelanggan = '$idPelanggan'");
                if($res){
                    if($res->num_rows>0){
                        $data=$res->fetch_assoc();
                        $res->free();
                        return $data;
                    }
                    else
                        return FALSE;
                }
                else
                    return FALSE; 
            }
            else
                return FALSE;
        }
        function getListPelanggan() {
            $db=dbConnect();
            if($db->connect_errno==0){
                $res=$db->query("SELECT * FROM pelanggan ORDER BY idPelanggan");
                if($res){
                    $data=$res->fetch_all(MYSQLI_ASSOC);
                    $res->free();
                    return $data;
                }
                else
                    return FALSE; 
            }
            else
                return FALSE;
        }

        // ambil data admin dari database
        function getDataAdmin($idPegawai){
            $db=dbConnect();
            if($db->connect_errno==0){
                $res=$db->query("SELECT * FROM pegawai WHERE idPegawai = '$idPegawai'");
                if($res){
                    if($res->num_rows>0){
                        $data=$res->fetch_assoc();
                        $res->free();
                        return $data;
                    }
                    else
                        return FALSE;
                }
                else
                    return FALSE; 
            }
            else
                return FALSE;
        }

        // navigasi menu
        function navigator(){
    ?>
        <div class="nav">
            <div class="nav-header">
                <table>
                    <tr>
                        <td>
                            <i class="fa-solid fa-fw fa-shirt"></i>
                            Flash Laundry
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <a href="index-dashboard.php" class="nav-menu"><i class="fa-solid fa-fw fa-house"></i>&nbsp&nbsp Home</a><br>
            <a href="paket.php" class="nav-menu"><i class="fa-solid fa-fw fa-boxes-stacked"></i>&nbsp&nbsp Paket Laundry</a><br>
            <a href="pegawai.php" class="nav-menu"><i class="fa-solid fa-fw fa-users"></i>&nbsp&nbsp Pegawai</a><br>
            <a href="pelanggan.php" class="nav-menu"><i class="fa-solid fa-fw fa-address-book"></i>&nbsp&nbsp Pelanggan</a><br>
            <a href="transaksi.php" class="nav-menu"><i class="fa-solid fa-fw fa-coins"></i>&nbsp&nbsp Transaksi</a><br>
            <a href="logout.php" class="nav-menu"><i class="fa-solid fa-fw fa-power-off"></i>&nbsp&nbsp Log Out</a>
            <div class="nav-credits">
                © 10120227<br>SALMA WAFA SADIYAH
            </div>
        </div>
    <?php
        }    

        // error pada login
        function errorLogin() {
            if (isset($_GET["error"])) {
                $error=$_GET["error"];
                if ($error==1) {
                    ?>
                    <div class="errorLogin">
                        <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                        <?php echo "ID PEGAWAI ATAU PASSWORD SALAH"; ?>
                    </div>
                    <?php
                } else if ($error==2) {
                    ?>
                    <div class="errorLogin">
                        <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                        <?php echo "ISI FORM LOGIN TERLEBIH DAHULU"; ?>
                    </div>
                    <?php
                } else if ($error==3) {
                    ?>
                    <div class="errorLogin">
                        <i class="fa-solid fa-fw fa-circle-exclamation" style="font-size:14px">&nbsp</i>
                        <?php echo "KONEKSI DATABASE GAGAL. SILAHKAN HUBUNGI ADMINISTRATOR"; ?>
                    </div>
                    <?php
                }
            }
        }
    ?>
</body>
</html>

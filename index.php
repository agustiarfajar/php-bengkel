<?php
    include_once("functions.php");
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style.css">
<head><title>Login</title></head>
<style>
    body {
        background: gainsboro;
        padding:20px;
    }
    .header {
        position: fixed;
        margin-left: 430px;
        margin-top: 100px;
        width: 400px;
        padding: 20px;
        background-image: linear-gradient(to right, indigo , salmon);
        color: white;
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .login-body {
        position: fixed;
        margin-left: 430px;
        margin-top: 178px;
        width: 400px;
        height: 200px;
        padding: 35px;
        background: white;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
        font-size: 16px;
        box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .login-btn {
        padding: 10px;
        background: black;
        color: white;
        border-radius: 8px;
        width: 100px;
        display: block;
        margin: auto;
    }
    .login-btn:hover {
        background: dimgray;
    }
</style>
<body>
    <form method="post" action="login.php">
        <?php errorLogin(); ?>
        <div class="header">
            <i class="fa-solid fa-fw fa-shirt"></i>
            Flash Laundry
        </div>
        <div class="login-body">
            <table>
                <tr>
                    <td>
                        <input type="text" name="idPegawai" placeholder="ID Pegawai" size="30" oninput="this.value=this.value.toUpperCase()"
                        value="<?php echo ($_SERVER["REMOTE_ADDR"]=="5.189.147.47"?"idPegawai":""); ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="password" placeholder="Password" size="30" oninput="this.value = this.value.toUpperCase()"
                        value="<?php echo ($_SERVER["REMOTE_ADDR"]=="5.189.147.47"?"pass":""); ?>">
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" name="btnlogin" value="Login" class="login-btn" align="center">
        </div>
    </form>
    <div style="position:absolute; bottom:0; font-size:12px; margin-left:20px">
        <p>© 10120227<br>SALMA WAFA SADIYAH</p>
    </div>
</body>
</html>
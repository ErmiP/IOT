<?php
include "../config/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - IOT Kandang Ayam</title>
    <?php
    include "../config/styles.php";
    ?>
</head>

<body id="login">
    <div class="contact-form">
        <img src="../img/logo/logo.png" class="avatar">
        <div class="text-center">
            <h3 class="font-weight-bold text-white">IOT Kandang Ayam</h3>
        </div>
        <br>
        <form class="user mb-5" action="../process/loginProcess.php" action="../process/loginProcess.php" method="post" onsubmit="return validateOnSubmit();">
            <div class="row form-group" style="color:#ffff;">
                <span><i class="fas fa-user"></i></span>&nbsp
                <label class="d-flex flex-column justify-content-center font-weight-bold " for="password"> Username</label>
                <div class="input-group">
                    <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" onkeyup="validateUsername(this)">
                </div>
            </div>
            <div class="row form-group" style="margin-top: 15px; color:#ffff;">
                <span><i class="fas fa-lock"></i></span>&nbsp
                <label class="d-flex flex-column justify-content-center font-weight-bold" for="password"> Password</label>
                <div class="input-group">
                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" onkeyup="validatePassword(this)">
                    <div class="input-group-append">
                        <span class="far fa-eye input-group-text form-control form-control-user" id="eye" onclick="showPassword();"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div id="parent-error" class="align-self-start">
                    <small class="rounded border border-danger text-danger align-self-start p-1 d-none mt-2" id="error-handling"></small>
                    <?php
                    if (isset($_GET["error"])) {
                        $error = $_GET["error"];
                    ?>
                        <small class="rounded border border-danger text-danger align-self-start p-1 d-flex mt-2" id="error-handling2">
                        <?php
                        echo $error;
                    }
                        ?>
                        </small>
                </div>
            </div>
            <input type="submit" name="submit" class="col-md-4-center btn btn-primary btn-user btn-block text-center" style="margin-top: 20px;" id="masuk" value="Login">
        </form>

    </div>
    <?php
    include "../config/scripts.php";
    ?>
</body>

</html>
<?php
include "../config/connection.php";

    if (isset($_POST["update"])){
        if ($_GET["module"]=="modalPengaturan" && $_GET["act"]=="edit"){

            if($_POST["id_levelnya"] == 'supervisor'){

                $nama_folderSupervisor = "img";
                $tmp = $_FILES["foto"]["tmp_name"];
                $fotoSupervisor = $_FILES["foto"]["name"];
                move_uploaded_file($tmp, "../attachment/$nama_folderSupervisor/$fotoSupervisor");
                
                if($fotoSupervisor != "" && $_POST["konfirmasiPassword"] == "") {
                    
                    $queryUploadSupervisor="UPDATE tabel_supervisor SET foto = '$fotoSupervisor' WHERE id_user = '$_POST[id_usernya]';";

                    if(mysqli_query($con, $queryUploadSupervisor)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }

                else if($fotoSupervisor != "" && $_POST["konfirmasiPassword"] != "") {

                    $querySupervisor="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                    $queryUploadSupervisor="UPDATE tabel_supervisor SET foto = '$fotoSupervisor' WHERE id_user = '$_POST[id_usernya]';";

                    if(mysqli_query($con, $querySupervisor) && mysqli_query($con, $queryUploadSupervisor)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }

                else if($fotoSupervisor == "" && $_POST["konfirmasiPassword"] != ""){

                    $querySupervisor="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                    if(mysqli_query($con, $querySupervisor)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }

            }

            else if($_POST["id_levelnya"] == 'operator'){

                $nama_folderOperator = "img";
                $tmp = $_FILES["foto"]["tmp_name"];
                $fotoOperator = $_FILES["foto"]["name"];
                move_uploaded_file($tmp, "../attachment/$nama_folderOperator/$fotoOperator");
                
                if($fotoOperator != "" && $_POST["konfirmasiPassword"] == "") {
                    
                    $queryUploadOperator="UPDATE tabel_operator SET foto = '$fotoOperator' WHERE id_user = '$_POST[id_usernya]';";

                    if(mysqli_query($con, $queryUploadOperator)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }

                else if($fotoOperator != "" && $_POST["konfirmasiPassword"] != "") {

                    $queryOperator="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                    $queryUploadOperator="UPDATE tabel_operator SET foto = '$fotoOperator' WHERE id_user = '$_POST[id_usernya]';";

                    if(mysqli_query($con, $queryOperator) && mysqli_query($con, $queryUploadOperator)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }

                else if($fotoOperator == "" && $_POST["konfirmasiPassword"] != ""){

                    $queryOperator="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                    if(mysqli_query($con, $queryOperator)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }
            }


            else if($_POST["id_levelnya"] == 'admin'){

                $nama_folderAdmin = "img";
                $tmp = $_FILES["foto"]["tmp_name"];
                $fotoAdmin = $_FILES["foto"]["name"];
                move_uploaded_file($tmp, "../attachment/$nama_folderAdmin/$fotoAdmin");
            
                if($fotoAdmin != "" && $_POST["konfirmasiPassword"] == "") {
                    
                    $queryUploadAdmin="UPDATE tabel_admin SET foto = '$fotoAdmin' WHERE id_user = '$_POST[id_usernya]';";

                    if(mysqli_query($con, $queryUploadAdmin)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }

                else if($fotoAdmin != "" && $_POST["konfirmasiPassword"] != "") {

                    $queryAdmin="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                    $queryUploadAdmin="UPDATE tabel_admin SET foto = '$fotoAdmin' WHERE id_user = '$_POST[id_usernya]';";

                    if(mysqli_query($con, $queryAdmin) && mysqli_query($con, $queryUploadAdmin)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }

                else if($fotoAdmin == "" && $_POST["konfirmasiPassword"] != ""){

                    $queryAdmin="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                    if(mysqli_query($con, $queryAdmin)){

                        header('location:../module/index.php?module=home');
                    }

                    else{
                        echo("Error description: " . mysqli_error($con));
                    }
                }
            }
        }
    }
?>


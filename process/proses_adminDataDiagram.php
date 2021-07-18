<?php
include "../config/connection.php";

function linkFotoAdmin($Foto)
{
    $ling = "";

    if ($Foto == null) {
        $ling = "../attachment/img/avatar.jpeg";
    } else if ($Foto != null) {
        $link = "../attachment/img/";
        $ling = ($link . $Foto);
    }

    return $ling;
}

if (isset($_POST["tambahDataAdmin"]) || isset($_POST["editDataAdmin"]) || isset($_POST["hapusDataAdmin"])) {
    if ($_GET["module"] == "dataAdmin" && $_GET["act"] == "tambah") {
        $nama_folder = "img";
        $tmp = $_FILES["fileid2"]["tmp_name"];
        $nama_file = $_FILES["fileid2"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

        $query1 = "INSERT INTO tabel_user (username, password, level) values (
                '$_POST[usernameAdminAdmin]',
                '$_POST[passwordAdminAdmin]',
                'admin'
            ); ";

        $query2 = "INSERT INTO tabel_admin (
                id_user,
               
                nama,
               
                foto,
                jenis_kelamin,
                waktu_tambah
            )

            values(  
                (select id_user from tabel_user where username='$_POST[usernameAdminAdmin]'),
                
                '$_POST[namaAdminAdmin]',
                
                '$nama_file',
                '$_POST[jkAdminAdmin]',
                curdate()
            );";

        if (mysqli_query($con, $query1) and mysqli_query($con, $query2)) {
            header('location:../module/index.php?module=' . $_GET["module"]);
        } else {
            echo ("Error description: " . mysqli_error($con));
        }
    } else if ($_GET["module"] == "dataAdmin" && $_GET["act"] == "edit") {
        $update = $_POST["id_userUpdate"];
        $id_adminUpdate = $_POST["id_adminUpdate"];
        $nama_folder = "img";
        $tmp = $_FILES["fileid3"]["tmp_name"];
        $namanya_file = $_FILES["fileid3"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$namanya_file");

        if ($namanya_file != "") {
            $query9 = "UPDATE tabel_user 
                set username='$_POST[usernameAdminAdmin2]',
                password='$_POST[passwordAdminAdmin2]'
                where id_user= '$update';";

            $query10 = "UPDATE tabel_admin
                set 
                nama = '$_POST[namaAdminAdmin2]',
                
                foto = '$namanya_file',
                jenis_kelamin = '$_POST[jkAdminAdmin2]',
                waktu_edit = curdate()
                where id_user='$update';";

            if (mysqli_query($con, $query9) && mysqli_query($con, $query10)) {
                header('location:../module/index.php?module=' . $_GET["module"]);
            } else {
                echo ("Error description: " . mysqli_error($con));
            }
        } else if ($namanya_file == "") {
            $query9 = "UPDATE tabel_user 
                set username='$_POST[usernameAdminAdmin2]',
                password='$_POST[passwordAdminAdmin2]'
                where id_user= '$update';";

            $query10 = "UPDATE tabel_admin
                set 
                nama = '$_POST[namaAdminAdmin2]',
                
                jenis_kelamin = '$_POST[jkAdminAdmin2]',
                waktu_edit = curdate()
                where id_user='$update';";

            if (mysqli_query($con, $query9) && mysqli_query($con, $query10)) {
                header('location:../module/index.php?module=' . $_GET["module"]);
            } else {
                echo ("Error description: " . mysqli_error($con));
            }
        }
    } else if ($_GET["module"] == "dataAdmin" && $_GET["act"] == "hapus") {
        $delete = $_POST['id_user'];
        $idnya = $_POST['id_admin'];
        $queryDeleteAdmin = "DELETE FROM tabel_admin WHERE id_admin='$idnya';";
        $queryDeleteUser = "DELETE FROM tabel_user WHERE id_user='$delete';";

        if (mysqli_query($con, $queryDeleteAdmin) && mysqli_query($con, $queryDeleteUser)) {
            header('location:../module/index.php?module=' . $_GET["module"]);
        } else {
            echo ("Error description: " . mysqli_error($con));
        }
    }
}

if (isset($_POST["editDataAdmin_idAdmin"])) {
    $editAdmin = "SELECT ta.*, ta.id_admin ,ta.nama AS nama_lengkap ,
        tu.* FROM tabel_admin ta, tabel_user tu 
        WHERE ta.id_user = tu.id_user 
        AND ta.id_admin = $_POST[editDataAdmin_idAdmin]";
    $resultEditAdmin = mysqli_query($con, $editAdmin);

    if (mysqli_num_rows($resultEditAdmin) > 0) {
        $rowEditAdmin = mysqli_fetch_assoc($resultEditAdmin);
        $output = "";
        $output .= "      
            <div class='row' id='modail'>
                <div class='col-sm-6'>
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <input type='hidden' name='id_userUpdate' value=" . $rowEditAdmin["id_user"] . ">
                            <input type='hidden' name='id_adminUpdate' value=" . $rowEditAdmin["id_admin"] . ">               
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='username' style='font-weight: bold'>USERNAME</label>
                            <input type='text' class='form-control' placeholder='USERNAME' id='usernameAdminAdmin2' name='usernameAdminAdmin2' value='" . $rowEditAdmin["username"] . "' required />
                        </div>
                        <div class='col-sm-12'>
                            <div id='usernameAdminAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='password' style='font-weight: bold'>PASSWORD</label>
                            <div class='input-group'>
                                <input type='password' class='form-control' placeholder='**********' name='passwordAdminAdmin2' id='passwordAdminAdmin2' placeholder='**********' value='" . $rowEditAdmin["password"] . "' required />
                                <div class='input-group-append'>
                                    <span class='far fa-eye input-group-text form-control' id='eyeAdmin2' onclick='showPasswordAdmin2();'></span>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-12'>
                            <div id='passwordAdminAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='gambar' style='font-weight: bold'>GAMBAR</label>
                            <div class='input-group col-sm-10'>
                                <img src='" . linkFotoAdmin($rowEditAdmin["foto"]) . "' id='fotoPrevAdminAdmin2' height='200px' width='200px'>
                            </div>
                            <div class='col-md-2'></div>
                            <div class='col-md-10'>
                                <br>
                                <input id='fileid3' type='file' name='fileid3' onchange='preview_imagesAdmin6(event);'  hidden />
                                <input id='buttonid3' type='button' value='Load Gambar' class='btn btn-loading btn-primary tmbl-loading ml-2'  />
                            </div>
                            <div class='col-sm-12'>
                                <div id='fileidAdminAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                            </div>                           
                        </div>
                    </div>
                </div>
                <div class='col-sm-6'>
                    
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nama' style='font-weight: bold'>NAMA LENGKAP</label>
                            <input type='text' class='form-control' placeholder='NAMA ADMIN' id='namaAdminAdmin2' name='namaAdminAdmin2' value='" . $rowEditAdmin['nama_lengkap'] . "' required />
                        </div>
                        <div class='col-sm-12'>
                            <div id='namaAdminAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='password' style='font-weight: bold'>JENIS KELAMIN</label>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input form-control-user' type='radio' name='jkAdminAdmin2' id='jkAdminAdmin3' value='Laki-Laki'>
                                <label class='form-check-label' for='jkAdminAdmin3'>Laki-Laki</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jkAdminAdmin2' id='jkAdminAdmin4' value='Perempuan'>
                                <label class='form-check-label' for='jkAdminAdmin4'>Perempuan</label>                                
                            </div>
                        </div>
                    </div>
                    
                </div> 
            </div>
            <hr>
           <div class='modal-footer border-0 '>
                <button class='btn btn-danger' data-dismiss='modal'><i class='fa fa-times'></i> Tutup</button>
                <button class='btn btn-primary' name='editDataAdmin' type='submit' onclick='ValidasiEditAdmin(); preventDefaultActionAdmin2(event);'><i class='fa fa-check'></i> Simpan</button>
            </div>
                            
                  
                                        
            <script>
                document.getElementById('modail').addEventListener('load', setupAdmin3());
                
                function setup3() {
                    document.getElementById('buttonid3').addEventListener('click', openDialog2);
                    function openDialog2() {
                        document.getElementById('fileid3').click();
                    }
                }
            </script>
            ";
        echo $output;
    } else {
        echo $output .= "Data Kosong";
    }
}

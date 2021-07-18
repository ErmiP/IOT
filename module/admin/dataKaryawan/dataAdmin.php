<?php
include "../config/connection.php";
include "../process/proses_adminDataAdmin.php";
?>

<body onload="setupAdmin2();">
    <div class="container-fluid" id="dataKaryawan" onload="setupAdmin2();">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Data Pengguna</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengguna</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataAdmin.php?module=dataAdmin&act=tambah" id="formDataAdminAdmin" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="username" style="font-weight: bold">USERNAME</label>
                                    <input type="text" class="form-control form-control-user" placeholder="USERNAME" id="usernameAdminAdmin" name="usernameAdminAdmin" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="usernameAdminAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="passwordAdminAdmin" style="font-weight: bold">PASSWORD</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-user" name="passwordAdminAdmin" id="passwordAdminAdmin" placeholder="**********" required>
                                        <div class="input-group-append">
                                            <span class="far fa-eye input-group-text form-control form-control-user" id="eyeAdmin" onclick="showPasswordAdmin();"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div id="passwordAdminAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="gambar" style="font-weight: bold">GAMBAR</label>
                                    <div class="input-group col-sm-10">
                                        <img src="../attachment/img/avatar.jpeg" id="fotoPrevAdminAdmin3" height="200px" width="200px">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10 ml-4">
                                        <br>
                                        <input id='fileid2' type='file' name='fileid2' onchange="preview_imagesAdmin22(event);" hidden required />
                                        <input id='buttonid2' type='button' value='Load Gambar' class="btn btn-loading btn-primary tmbl-loading ml-3" />
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div id="fileidAdminAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nama" style="font-weight: bold">NAMA LENGKAP</label>
                                    <input type="text" class="form-control form-control-user" placeholder="NAMA LENGKAP" id="namaAdminAdmin" name="namaAdminAdmin" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="namaAdminAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">JENIS KELAMIN</label>
                                    <div class="form-check form-check-inline ml-2">
                                        <input class="form-check-input form-control-user" type="radio" name="jkAdminAdmin" id="jkAdminAdmin1" value="Laki-Laki">
                                        <label class="form-check-label" for="jkAdminAdmin1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jkAdminAdmin" id="jkAdminAdmin2" value="Perempuan">
                                        <label class="form-check-label" for="jkAdminAdmin2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <button type="submit" class="btn btn-success btn-icon-split float-right" name="tambahDataAdmin" onclick="ValidasiTambahAdmin(); preventDefaultActionAdmin(event);">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Gambar</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryTampilData = "SELECT ta.*, ta.nama AS nama_lengkap , tu.* FROM tabel_admin ta, tabel_user tu WHERE 
                                    ta.id_user = tu.id_user;
                                    ";

                            $resultTampilData = mysqli_query($con, $queryTampilData);
                            $index = 1;

                            if (mysqli_num_rows($resultTampilData) > 0) {
                                while ($rowTampilData = mysqli_fetch_assoc($resultTampilData)) {
                            ?>
                                    <tr class="text-center" id-admin="<?php echo $rowTampilData["id_admin"] ?>">
                                        <td><?php echo $index; ?></td>
                                        <td class="usernameAdmin"><?php echo $rowTampilData["username"]; ?></td>
                                        <td class="passwordAdmin">**********</td>
                                        <td class="fotoAdmin"><img src="../attachment/img/<?php echo ($rowTampilData['foto'] == null) ? 'avatar.jpeg' : $rowTampilData['foto']; ?>" style="width:50px;height:50px;border-radius:50%;"></td>
                                        <td class="namaAdmin"><?php echo $rowTampilData["nama_lengkap"]; ?></td>
                                        <td class="jkAdmin"><?php echo $rowTampilData["jenis_kelamin"]; ?></td>

                                        <td>
                                            <button type="button" class="btn btn-primary edit-dataAdmin-admin" data-toggle="modal" data-target="#editDataAdminModal" id_userEdit="<?php echo $rowTampilData["id_user"]; ?>" id_adminEdit="<?php echo $rowTampilData["id_admin"]; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <p></p>
                                            <button type="button" class="btn btn-danger hapus-dataAdmin-admin" data-toggle="modal" data-target="#hapusDataAdminModal" id_user="<?php echo $rowTampilData["id_user"]; ?>" id_admin="<?php echo $rowTampilData["id_admin"]; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                    $index++;
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editDataAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-admin border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataAdmin.php?module=dataAdmin&act=edit" id="formEditDataAdminAdmin" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" id="id_userUpdate">
                        <input type="hidden" name="id_admin" id="id_adminUpdate">
                        <div class="container-fluid" id="edit-dataAdmin"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataAdmin.php?module=dataAdmin&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_user" id="id_userHapus">
                        <input type="hidden" name="id_admin" id="id_adminHapus">
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataAdmin" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
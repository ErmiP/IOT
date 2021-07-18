<?php
session_start();
include "../config/connection.php";
include "../process/proses_modalPengaturan.php";

if (isset($_SESSION["id"])) {
  $level = $_SESSION['level'];
  $idUser = $_SESSION['id'];
} else {
  $message = "Login terlebih dahulu!";
  echo ("<script LANGUAGE='JavaScript'>
      window.alert('$message');
      window.location.href='../';
      </script>");
}

$queryModalPengaturan = "SELECT * FROM tabel_user WHERE id_user = '$idUser'";
$resultModalPengaturan = mysqli_query($con, $queryModalPengaturan);

$item = '';
if (mysqli_num_rows($resultModalPengaturan) == 1) {
  $item = mysqli_fetch_assoc($resultModalPengaturan);
}
?>

<?php
switch ($level) {
  case 'admin':
    $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_admin b WHERE a.id_user=$idUser and a.id_user=b.id_user";
    $resultUser = mysqli_query($con, $queryUser);
    $rowUser = mysqli_fetch_assoc($resultUser);
    $namaUser = $rowUser["nama"];
    break;
  default:
    $namaUser = "User tidak ditemukan";
    break;
}
?>

<?php
function active($currect_page)
{
  $url = $_SERVER['REQUEST_URI'];

  if ($currect_page == $url) {
    echo 'active';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>IOT Kandang Ayam</title>
  <?php
  include "../config/styles.php";
  ?>
</head>

<body id="home">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?module=home">
        </br>
        <div class="sidebar-brand-icon">
          <img src="../img/logo/logo.png" width="40" height="45">
        </div>
        <div class="sidebar-brand-text mx-3">Kandang Ayam Pintar</div>
      </a>
      </br></br>

      <div class="sidebar-heading">Dasboard</div>
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=home">
          <i class="fas fa-fw fa-th"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- <hr class="sidebar-divider">
      <div class="sidebar-heading">Data Diagram</div>
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=dataDiagram" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-industry"></i>
          <span>Data Diagram</span>
        </a>
      </li> -->

      <hr class="sidebar-divider">
      <div class="sidebar-heading">Menejemen Kandang</div>
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=dataInputAyam" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-fw fa-plus-square"></i>
          <span>Menejemen Ayam</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">History</div>
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=dataHistory" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-server"></i>
          <span>History Kandang</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">Kontrol Manual</div>
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=manualKontrol" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-cog"></i>
          <span>Kontrol Manual</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="mr-2 img-profile rounded-circle" src="../attachment/img/<?php echo ($rowUser['foto'] == null) ? 'avatar.jpeg' : $rowUser['foto']; ?>">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ($namaUser); ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php
                if ($level == "admin") {
                ?>
                  <a class="dropdown-item" href="index.php?module=profileAdmin">
                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>Profile Admin
                  </a>
                <?php
                }
                ?>
                <a class="dropdown-item" href="index.php?module=setting" data-target="#editPengaturan" data-toggle="modal">
                  <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          <?php
          $module = $_GET['module'];
          if ($level == "admin") {
            switch ($module) {
              case "home":
                include "admin/home.php";
                break;
              case "dataAdmin":
                include "admin/dataKaryawan/dataAdmin.php";
                break;
              case "dataDiagram":
                include "admin/dataDiagram/dataDiagram.php";
                break;
              case "dataInputAyam":
                include "admin/dataInput/dataInputAyam.php";
                break;
              case "dataHistory":
                include "admin/dataHistory/dataHistory.php";
                break;
              case "profileAdmin":
                include "admin/profile/profileAdmin.php";
                break;
              case "manualKontrol":
                include "admin/manualKontrol/manualKontrol.php";
                break;

              default:
                include "404.php";
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#home">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="editPengaturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-editPengaturan border-0">
          <h5 class="modal-title text-white w-100 text-center">Pengaturan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <input type="hidden" id="passwordModal" value="<?php echo $item['password'] ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <center><img src="../attachment/img/<?php echo ($rowUser['foto'] == null) ? 'avatar.jpeg' : $rowUser['foto']; ?>" id="fotoPrev" height="150px" width="150px" class="rounded-circle" /></center>
              <br>
              <center><?php echo ($namaUser); ?></center>
              <br>
              <form action="../process/proses_modalPengaturan.php?module=modalPengaturan&act=edit" id="formModalPengaturan2" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                  <input type="hidden" name="id_usernya" id="id_usernya" value="<?php echo $idUser ?>">
                  <input type="hidden" name="id_levelnya" id="id_levelnya" value="<?php echo $level ?>">
                  <label class="col-sm-3 small d-flex flex-column justify-content-center" for="foto" style="font-weight: bold">GANTI FOTO</label>
                  <div class="input-group col-sm-9">
                    <input type="file" id="foto" name="foto" onblur="reset_Blank(); reset_Size(); reset_Check();" onchange="preview_image(event);" accept="image/*">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 small d-flex flex-column justify-content-center" for="passwordLama" style="font-weight: bold">PASSWORD LAMA</label>
                  <div class="col-sm-9 input-group">
                    <input type="password" class="form-control form-control-user" name="passwordLama" id="passwordLama" placeholder="Password Lama" onblur="reset_Blank();">
                    <div class="input-group-append">
                      <span class="far fa-eye input-group-text form-control form-control-user" id="eyeA" onclick="showPasswordLama();"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 small d-flex flex-column justify-content-center" for="passwordBaru" style="font-weight: bold">PASSWORD BARU</label>
                  <div class="col-sm-9 input-group">
                    <input type="password" class="form-control form-control-user" id="passwordBaru" placeholder="Password Baru" name="passwordBaru" onblur="reset_Blank();">
                    <div class="input-group-append">
                      <span class="far fa-eye input-group-text form-control form-control-user" id="eyeB" onclick="showPasswordBaru();"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 small d-flex flex-column justify-content-center" for="konfirmasiPassword" style="font-weight: bold">KONFIRMASI PASSWORD</label>
                  <div class="col-sm-9 input-group">
                    <input type="password" class="form-control form-control-user" id="konfirmasiPassword" placeholder="Konfirmasi Password" name="konfirmasiPassword" onblur="reset_Blank();">
                    <div class="input-group-append">
                      <span class="far fa-eye input-group-text form-control form-control-user" id="eyeC" onclick="showPasswordKonfirmasi();"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <div id="Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
                    <div id="fotoSize" class="small d-flex flex-column justify-content-center text-danger"></div>
                    <div id="fotoType" class="small d-flex flex-column justify-content-center text-danger"></div>
                    <div id="konfirmasipasswordSalah" class="small d-flex flex-column justify-content-center text-danger"></div>
                    <div id="konfirmasipasswordLamaSalah" class="small d-flex flex-column justify-content-center text-danger"></div>
                  </div>
                </div>
                <div class="modal-footer border-0">
                  <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                  <button class="btn btn-primary" name="update" type="submit" onclick="showFilesSize(event);"><i class="fa fa-check"></i> Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../process/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script>

  </script>
  <?php
  include "../config/scripts.php";
  ?>

</body>

</html>
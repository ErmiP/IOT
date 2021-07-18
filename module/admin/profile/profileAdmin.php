<?php
include "../config/connection.php";
include "../process/proses_dashboardAdmin.php";
?>
<div class="container-fluid" id="dataKaryawan">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Profil Peternak</h6>
    </div>
    <div class="card-body">
      <?php
      $resultTampilProfilAdmin = tampilProfilAdmin($con, $idUser);
      if (mysqli_num_rows($resultTampilProfilAdmin) > 0) {
        while ($row = mysqli_fetch_assoc($resultTampilProfilAdmin)) {
      ?>
          <div class="row">
            <div class="col-lg-4">
              <center><img src="../attachment/img/<?php echo ($row['foto'] == null) ?
                                                    'avatar.jpeg' : $row['foto']; ?>" height="250px" width="250px;"></center>
            </div>
            <div class="col-lg-5">
              <div class="p-5">
                <div class="text">
                  <h6 class="text-gray-900 mb-4">Nama Peternak : <?= $row["nama"] ?> </h6>
                </div>
                <div class="text">
                  <h6 class="text-gray-900 mb-4">Jenis Kelamin : <?= $row["jenis_kelamin"]; ?> </h6>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</div>
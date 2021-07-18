<?php

include "../config/connection.php";
//include "../process/proses_adminDataHistory.php";
include "../process/proses_adminDataInput.php";
?>

<body>
    <div class="container-fluid" id="dataHistory">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History Kandang</span>
                </li>
            </ol>
        </nav>

        <!-- Data Input Ayam -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Ayam</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form class="user" action="../process/proses_adminDataInput.php?module=dataInputAyam&act=tambah" method="POST">
                        <div class="form-group row float-right" style="margin-right: .75rem;">
                            <div class="col-sm-9">
                                <select class="form-control" id="jenis_kandang" name="jenis_kandang">
                                    <option hidden selected disabled>Cari Kandang 1/2</option>
                                    <option value="Kandang 1">Kandang 1</option>
                                    <option value="Kandang 2">Kandang 2</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-warning btn-icon-split mb-2 mb-sm-0" name="search" id="search">
                                    <span class="text">Cari</span>
                                </button>
                            </div>
                        </div>
                </form>
                <?php
                    $jenis_kandang="";
                        if (isset($_POST['search'])) {
                                        $jenis_kandang = $_POST['jenis_kandang'];
                                    }
                    $resultTampilDataAyam = tampilDataAyam($con);
                    $index = 1;
                    if (mysqli_num_rows($resultTampilDataAyam) > 0) {
                ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No. </th>
                                <th>Periode</th>
                                <th>Jenis Kandang</th>
                                <th>Umur Ayam Awal</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Tanggal Sekarang</th>
                                <th>Umur Skrng</th>
                                <th>Sisa Hari</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($resultTampilDataAyam)) {
                        ?>
                            <tr class="text-center" id="tr">
                                <td><?= $index ?></td>
                                <td>Periode <?= $row["sample_ayam"] ?></td>
                                <td><?= $row["jenis_kandang"] ?></td>
                                <td><?= $row["umur_ayam_awal"] ?> hari</td>
                                <td><?= $row["tanggal_mulai"] ?></td>
                                <td>
                                    <!-- Tanggal Selesai -->
                                    <?php
                                        if($row["status"] == "Aktif" && $row["tanggal_selesai"] == NULL){
                                            $time_mulai = strtotime($row["tanggal_mulai"]);
                                            $a = 40 -  $row["umur_ayam_awal"];
                                            
                                            $time_selesai = date('Y-m-d', strtotime("$a days", $time_mulai)); 

                                            echo $time_selesai; 
                                        } elseif($row["status"] == "Aktif" && $row["tanggal_selesai"] != NULL){
                                            $time_mulai = strtotime($row["tanggal_mulai"]);
                                            $a = 40 -  $row["umur_ayam_awal"];
                                            
                                            $time_selesai = date('Y-m-d', strtotime("$a days", $time_mulai)); 

                                            echo $time_selesai; 
                                        }
                                        elseif($row["status"] == "Selesai" && $row["tanggal_selesai"] != NULL){
                                            $time_mulai = strtotime($row["tanggal_mulai"]);
                                            $a = 40 -  $row["umur_ayam_awal"];
                                            
                                            $time_selesai = date('Y-m-d', strtotime("$a days", $time_mulai)); 

                                            echo $row["tanggal_selesai"];
                                        }
                                    ?>
                                </td>
                                <td>
                                    <!-- Tanggal Sekarang -->
                                    <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $date = new DateTime('now');
                                        echo $date->format('Y-m-d');
                                    ?>
                                </td>
                                <td>
                                    <!-- Umur Sekarang -->
                                    <?php
                                        $selisih1 = strtotime($date->format('Y-m-d')) - strtotime($row["tanggal_mulai"]);
                                        $selisihhari = floor($selisih1 / (60 * 60 * 24));
                                        $umursekarang = $row["umur_ayam_awal"] + $selisihhari;

                                        echo "$umursekarang Hari";

                                        // $query9 = "UPDATE tabel_input SET umur_sekarang = '$umurSekarang' WHERE id_ayam = 92 ";
                                        // $result = mysqli_query($con, $query9);
                                    ?>
                                </td>
                                <td>
                                    <!-- Sisa Hari -->
                                    <?php
                                        if($row["status"] == "Aktif"){
                                            $b = strtotime($time_selesai) - strtotime($date->format('Y-m-d'));
                                            $c = floor($b / (60 * 60 * 24));

                                            echo "$c Hari";
                                        }
                                        elseif($row["status"] == "Selesai"){
                                            echo "0 Hari";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <!-- Action -->
                                    <form class="user" action="../process/proses_adminDataInput.php?module=dataInputAyam&act=update" method="POST">
                                        <?php 
                                            if ($row["tanggal_selesai"] == NULL ) { 
                                            ?> 
                                                <input type="hidden" class="form-control form-control-user" placeholder="Input Umur Ayam" name="id_ayam" value="<?= $row["id_ayam"] ?>">
                                                <button type="submit" class="btn btn-danger btn-icon-split mb-2 mb-sm-0" name="updateDataInputAyam" onclick="stateOff1();">
                                                    <span class=" text">Selesai</span>
                                                </button>
                                            <?php
                                            } else if ($row["tanggal_selesai"] != NULL) {
                                            ?>
                                                <button type="submit" class="btn btn-danger btn-icon-split mb-2 mb-sm-0" name="updateDataInputAyam" disabled>
                                                    <span class="text">Selesai</span>
                                                </button>
                                            <?php
                                            }else if (empty($c) && $row["tanggal_selesai"] == NULL) {
                                            ?>
                                                <button type="submit" class="btn btn-danger btn-icon-split mb-2 mb-sm-0" name="updateDataInputAyam" disabled>
                                                    <span class="text">Selesai</span>
                                                    </button>
                                            <?php
                                            } 
                                            ?>
                                    </form>
                                </td>
                                <td>
                                    <!-- Status --> 
                                    <?php 
                                        if ($row["status"] == "Aktif") {
                                        ?> 
                                            <span class=" text">Aktif</span>
                                        <?php
                                        } else if ($row["status"] == "Selesai") {
                                        ?>
                                            <span class=" text">Selesai</span>
                                        <?php
                                        } ?>
                                </td>
                            </tr>
                            <?php
                                $index++;
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    } else {
                    ?>
                    <div class="text-center">
                        <p class="text-muted">Data History Kosong</p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
error_reporting(0);
include "../config/connection.php";
include "../process/proses_adminDataScoreSafety.php";
?>

<body>
    <div class="container-fluid" id="dataScore">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home"><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-trophy"></i>
                    <span>Input Data Ayam</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input Data Ayam</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataScoreSafety.php?module=dataScoreSafety&act=tambah" method="POST">

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="poinSafety" style="font-weight: bold">TOTAL POIN</label>
                            <input type="number" class="form-control form-control-user" placeholder="TOTAL POIN" id="poinSafety" name="poinSafety" required>
                        </div>
                        <div class="col-sm-12">
                            <div id="poinSafetyBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiSafety" style="font-weight: bold">TOTAL NILAI</label>
                            <input type="number" class="form-control form-control-user" placeholder="TOTAL NILAI" id="nilaiSafety" name="nilaiSafety" required>
                        </div>
                        <div class="col-sm-12">
                            <div id="nilaiSafetyBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateSafety" style="font-weight: bold">TANGGAL ASSESMENT</label>
                            <div class="input-group date" id="datepickerTanggalTraining" data-provide="datepicker">
                                <input type="text" id="dateSafety" class="form-control form-control-user datepicker" placeholder="TANGGAL ASSESMENT" name="dateSafety" required>
                                <div class="input-group-addon">
                                    <span class="far fa-calendar-alt input-group-text form-control form-control-user" aria-hidden="true">
                                        <!-- <i class='far fa-calendar-alt' aria-hidden="true"></i> -->
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div id="dateSafetyBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split mb-2 mb-sm-0" name="tambahDataScoreSafety" onclick="ValidasiTambahScoreSafety();">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Nilai Safety Online</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-icon-split mr-2 mb-sm-0" name="printDataScoreSafety" data-toggle="modal" data-target="#printDataScoreSafetyModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Print Data</span>
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Total Poin</th>
                                <th>Total Nilai</th>
                                <th>Tanggal Assessment</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryTampilData = "SELECT tss.*, tp.id_operator, tp.nama AS nama_operator FROM tabel_score_safety tss, tabel_operator tp WHERE tss.id_operator = tp.id_operator;
                                    ";

                            $resultTampilData = mysqli_query($con, $queryTampilData);
                            $index = 1;

                            if (mysqli_num_rows($resultTampilData) > 0) {
                                while ($rowTampilData = mysqli_fetch_assoc($resultTampilData)) {
                            ?>
                                    <tr class="text-center" id-score-safety="<?php echo $rowTampilData["id_score_safety"] ?>">
                                        <td><?php echo $index; ?></td>
                                        <td class="kategoriMateri"><?php echo $rowTampilData["nama_operator"]; ?></td>
                                        <td class="judulMateri"><?php echo $rowTampilData["poin"]; ?></td>
                                        <td class="fileMateri"><?php echo $rowTampilData["nilai"]; ?></td>
                                        <td class="fileMateri"><?php echo $rowTampilData["tanggal_training"]; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning info-dataScoreSafety-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#infoDataScoreSafetyModal" id_scoreSafetyInfo="<?php echo $rowTampilData["id_score_safety"]; ?>">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary edit-dataScoreSafety-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#editDataScoreSafetyModal" id_scoreSafetyEdit="<?php echo $rowTampilData["id_score_safety"]; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger hapus-dataScoreSafety-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#hapusDataScoreSafetyModal" id_score_safety="<?php echo $rowTampilData["id_score_safety"]; ?>">
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
    <div class="modal fade" id="editDataScoreSafetyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreSafety border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Nilai Safety Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreSafety.php?module=dataScoreSafety&act=edit" method="POST">
                        <input type="hidden" name="id_score_safety" id="id_scoreSafetyUpdate">
                        <div class="container-fluid" id="edit-dataScoreSafety"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreSafetyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreSafety.php?module=dataScoreSafety&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_safety" id="id_scoreSafetyHapus">
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataMateriSafety" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="infoDataScoreSafetyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreSafetyInfo border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Nilai Safety Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="info-dataScoreSafety"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form method="POST" action="../process/report_filterAdminDataScoreSafety.php" target="_blank">
        <div class="modal fade" id="printDataScoreSafetyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><small>PRINT FILTER DATE</small></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Star Date</label>
                            <input type="date" name="from" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">End Date</label>
                            <input type="date" name="end" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            <button class="btn btn-primary" type="submit" name="submit" value="proses" onclick="return valid();"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end modal-->
</body>
<?php
error_reporting(0);
include "../config/connection.php";
include "../process/proses_adminDataScoreQuality.php";
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
                    <span>History Kandang</span>
                </li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">History Kandang</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-icon-split mr-2 mb-sm-0" name="printDataScoreQuality" data-toggle="modal" data-target="#printDataScoreQualityModall">
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
                                <th>Total Nilai</th>
                                <th>Total Poin</th>
                                <th>Tanggal Assessment</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryTampilData = "SELECT tsq.*, tp.id_operator, tp.nik, tp.nama AS nama_operator 
                                FROM tabel_score_quality tsq, tabel_operator tp WHERE tsq.id_operator = tp.id_operator;
                                    ";

                            $resultTampilData = mysqli_query($con, $queryTampilData);
                            $index = 1;

                            if (mysqli_num_rows($resultTampilData) > 0) {
                                while ($rowTampilData = mysqli_fetch_assoc($resultTampilData)) {
                            ?>
                                    <tr class="text-center" id-score-quality="<?php echo $rowTampilData["id_score_quality"] ?>">
                                        <td><?php echo $index; ?></td>
                                        <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                                        <td class="kategoriMateri"><?php echo $rowTampilData["nama_operator"]; ?></td>
                                        <td class="judulMateri"><?php echo $rowTampilData["poin"]; ?></td>
                                        <td class="fileMateri"><?php echo $rowTampilData["nilai"]; ?></td>
                                        <td class="fileMateri"><?php echo $rowTampilData["tanggal_training"]; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning info-dataScoreQuality-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#infoDataScoreQualityModal" id_scoreQualityInfo="<?php echo $rowTampilData["id_score_quality"]; ?>">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary edit-dataScoreQuality-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#editDataScoreQualityModal" id_scoreQualityEdit="<?php echo $rowTampilData["id_score_quality"]; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger hapus-dataScoreQuality-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#hapusDataScoreQualityModall" id_score_quality="<?php echo $rowTampilData["id_score_quality"]; ?>">
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
    <div class="modal fade" id="editDataScoreQualityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreQuality border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Nilai Quality Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreQuality.php?module=dataScoreQuality&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_score_quality" id="id_scoreQualityUpdate">
                        <div class="container-fluid" id="edit-dataScoreQuality"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreQualityModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreQuality.php?module=dataScoreQuality&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_quality" id="id_scoreQualityHapus">
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataScoreQuality" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="infoDataScoreQualityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreQualityInfo border-0">
                    <h5 class="modal-title text-white w-100 text-center">Data Nilai Quality Detail Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="info-dataScoreQuality"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form method="POST" action="../process/report_filterAdminDataScoreQuality.php" target="_blank">
        <div class="modal fade" id="printDataScoreQualityModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
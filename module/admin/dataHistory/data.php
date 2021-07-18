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
            <!-- <th>Umur Skrng</th> -->
            <th>Sisa Hari</th>
            <th>Action</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../../config/connection.php";
        $s_jenis_kandang = "";
        if (isset($_POST['jenis_kandang'])) {
            $s_jenis_kandang = $_POST['jenis_kandang'];
        }
        $search_jenis_kandang = '%' . $s_jenis_kandang . '%';
        $index = 1;
        $query = "SELECT * FROM tabel_input WHERE jenis_kandang LIKE ? ORDER BY id_ayam ASC";
        $dewan1 = $con->prepare($query);
        $dewan1->bind_param('s', $search_jenis_kandang);
        $dewan1->execute();
        $res1 = $dewan1->get_result();
        if ($res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                $id_ayam = $row['id_ayam'];
                $sample_ayam = $row['sample_ayam'];
                $jenis_kandang = $row['jenis_kandang'];
                $umur_ayam_awal = $row['umur_ayam_awal'];
                $tanggal_mulai = $row['tanggal_mulai'];
                $tanggal_selesai = $row['tanggal_selesai'];
                $status = $row['status'];

        ?>
                <tr class="text-center" id="tr">
                    <td><?php echo $index++; ?></td>
                    <td>Periode <?= $row["sample_ayam"] ?></td>
                    <td><?php echo $jenis_kandang; ?></td>
                    <td><?php echo $umur_ayam_awal; ?> hari</td>
                    <td><?= $row["tanggal_mulai"] ?></td>
                    <td>
                        <!-- Tanggal Selesai -->
                        <?php
                        if ($row["status"] == "Aktif" && $row["tanggal_selesai"] == NULL) {
                            $time_mulai = strtotime($row["tanggal_mulai"]);
                            $a = 40 -  $row["umur_ayam_awal"];

                            $time_selesai = date('Y-m-d', strtotime("$a days", $time_mulai));

                            echo $time_selesai;
                        } elseif ($row["status"] == "Aktif" && $row["tanggal_selesai"] != NULL) {
                            $time_mulai = strtotime($row["tanggal_mulai"]);
                            $a = 40 -  $row["umur_ayam_awal"];

                            $time_selesai = date('Y-m-d', strtotime("$a days", $time_mulai));

                            echo $time_selesai;
                        } elseif ($row["status"] == "Selesai" && $row["tanggal_selesai"] != NULL) {
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
                    <!-- <td>
                        Umur Sekarang
                        <?php
                        $selisih1 = strtotime($date->format('Y-m-d')) - strtotime($row["tanggal_mulai"]);
                        $selisihhari = floor($selisih1 / (60 * 60 * 24));
                        $umursekarang = $row["umur_ayam_awal"] + $selisihhari;

                        echo "$umursekarang Hari";

                        // $query9 = "UPDATE tabel_input SET umur_sekarang = '$umurSekarang' WHERE id_ayam = 92 ";
                        // $result = mysqli_query($con, $query9);
                        ?>
                    </td> -->
                    <td>
                        <!-- Sisa Hari -->
                        <?php
                        if ($row["status"] == "Aktif") {
                            $b = strtotime($time_selesai) - strtotime($date->format('Y-m-d'));
                            $c = floor($b / (60 * 60 * 24));

                            echo "$c Hari";
                        } elseif ($row["status"] == "Selesai") {
                            echo "0 Hari";
                        }
                        ?>
                    </td>
                    <td>
                        <!-- Action -->
                        <form class="user" action="../process/proses_adminDataInput.php?module=dataInputAyam&act=update" method="POST">
                            <?php
                            if ($row["tanggal_selesai"] == NULL) {
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
                            } else if (empty($c) && $row["tanggal_selesai"] == NULL) {
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
            <?php }
        } else { ?>
            <tr>
                <td colspan='11'>Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
    <table>

        <script>
            // Call the dataTables jQuery plugin
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    searching: false
                });
            });
        </script>
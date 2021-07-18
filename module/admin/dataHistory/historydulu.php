<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">History Kandang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php
                    $resultTampilDataHistory =tampilDataHistory ($con);
                    $index=1;
                    if (mysqli_num_rows($resultTampilDataHistory ) > 0){
                ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No. </th>
                                <th>Umur</th>
                                <th>Suhu</th>
                                <th>Kelembaban</th>
                                <th>Kipas</th>
                                <th>Pompa</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($resultTampilDataHistory)) {
                        ?>
                            <tr class="text-center">
                                <td><?= $index?></td>
                                <td><?= $row["umur"]?></td>
                                <td><?= $row["suhu"]?></td>
                                <td><?= $row["kelembapan"]?></td>
                                <td><?= $row["kipas"]?></td>
                                <td><?= $row["pompa"]?></td>
                                <td><?= $row["tanggal"]?></td>
                            </tr>
                        <?php
                            $index++;
                            }
                        ?>
                        </tbody>
                    </table>
                    <?php
                        }else{
                    ?>
                        <div class="text-center">
                            <p class="text-muted">Data Jabatan kosong</p>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
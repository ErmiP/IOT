<?php
include "../config/connection.php";

function tampilDataAyam($con)
{
    $tampilDataAyam = "select * from tabel_input";
    $resultTampilDataAyam = mysqli_query($con, $tampilDataAyam);
    return $resultTampilDataAyam;
}

if (isset($_POST["tambahInputAyam"]) || isset($_POST["updateDataInputAyam"])) {
    if ($_GET["module"] == "dataInputAyam" && $_GET["act"] == "tambah") {
        $jenisKandang = $_POST['jenis_kandang'];
        $sample = $_POST['sample_ayam'];
        $sample = 1;
        $kandang1 = mysqli_query($con, "SELECT Max(sample_ayam) FROM tabel_input WHERE jenis_kandang LIKE 'Kandang 1'");
	    $row = mysqli_fetch_array($kandang1);
        $hasil1 = $row[0] + $sample;

        $kandang2 = mysqli_query($con, "SELECT Max(sample_ayam) FROM tabel_input WHERE jenis_kandang LIKE 'Kandang 2'");
	    $row1 = mysqli_fetch_array($kandang2);
        $hasil2 = $row1[0] + $sample;

        switch ($jenisKandang) {
            case 'Kandang 1':
                $periodeHasil = $hasil1; 
                break;
            case 'Kandang 2':
                $periodeHasil = $hasil2; 
                break;
            default:
                break;
        }
        
        $query2 = "INSERT INTO tabel_input (
                sample_ayam,
                jenis_kandang,
                umur_ayam_awal,
                tanggal_mulai,
                tanggal_selesai,
                status
            )
            values(  
                '$periodeHasil',
                '$jenisKandang',
                '$_POST[pubm]',
                CURRENT_TIMESTAMP,
                NULL,
                'Aktif' 
            );";

        // $query5 = "INSERT INTO tabel_input (tanggal_selesai) VALUES ('$time_selesai')";
        // $result = mysqli_query($con, $query5);

        if (mysqli_query($con, $query2)) {
            header('location:../module/index.php?module=' . $_GET["module"]);
        } else {
            echo ("Error description: " . mysqli_error($con));
        }
    } else if ($_GET["module"] == "dataInputAyam" && $_GET["act"] == "update") {
        session_start();

        $UpdateDataInputAyamQuery = "UPDATE tabel_input SET tanggal_selesai = CURRENT_TIMESTAMP, status = 'Selesai' WHERE id_ayam = ('$_POST[id_ayam]')";
        mysqli_query($con, $UpdateDataInputAyamQuery);
        header('location:../module/index.php?module=dataHistory');
    }
}

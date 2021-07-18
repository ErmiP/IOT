<?php
include "../config/connection.php";

function tampilDataHistory($con)
{
    $tampilDataHistory = "select * from tabel_sensor";
    $resultTampilDataHistory = mysqli_query($con, $tampilDataHistory);
    return $resultTampilDataHistory;
}

?>
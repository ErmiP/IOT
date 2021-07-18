<?php
include "../config/connection.php";

function jumlah($con, $tabel)
{
  $jumlah = "select count(*) as jumlah from $tabel";
  $resultJumlah = mysqli_query($con, $jumlah);
  return $resultJumlah;
}

function tampilProfilAdmin($con, $idUser)
{

  $tampilProfilAdmin = "SELECT ta.*, tu.* FROM tabel_admin ta, tabel_user tu 
        WHERE ta.id_user = tu.id_user and tu.id_user = '$idUser'";
  $resultTampilProfilAdmin = mysqli_query($con, $tampilProfilAdmin);
  return $resultTampilProfilAdmin;
}

function tampilHistoryKandang($con){
  $tampilHistoryKandang = "SELECT * FROM tabel_input WHERE status = 'Aktif' ORDER BY id_ayam DESC LIMIT 1";
  $resultTampilHistoryKandang = mysqli_query($con, $tampilHistoryKandang);
  return $resultTampilHistoryKandang;
}
<?php
error_reporting(0);
include "../config/connection.php";
include "../process/proses_adminDataInput.php";
?>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.2.0/mqttws31.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.2.0/mqttws31.js" type="text/javascript"></script>
    <script src="../../../paho.js" type="text/javascript"></script>
    <script src="../../../fuzzy.js" type="text/javascript"></script>
</head>

<body onload="startConnect()">
    <div class="container-fluid" id="dataInput">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-plus-square"></i>
                    <span>Menejemen Data Ayam</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penentuan Jadwal Pembesaran Ayam</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataInput.php?module=dataInputAyam&act=tambah" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiSafety" style="font-weight: bold">Pilih Kandang</label>
                            <select class="custom-select-dataInput" id="jenisKandang" name="jenis_kandang">
                                <option hidden selected disabled>Kandang 1/2</option>
                                <option value="Kandang 1">Kandang 1</option>
                                <option value="Kandang 2">Kandang 2</option>
                            </select>
                            <div class="col-sm-12">
                                <div id="nilaiSafetyBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-sm-12 small d-flex flex-column justify-content-center" for="pubm" style="font-weight: bold">Penentuan Awal Umur Ayam, hari ke -</label>
                            <input type="text" class="form-control form-control-user" placeholder="Input Umur Ayam, hari ke - " id="pubm" name="pubm" required>
                        </div>
                    </div>

                    <hr>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-icon-split mb-2 mb-sm-0" onclick="startPublish(); stateA()" name=" tambahInputAyam" id="btnSubmit">
                            <span class="text">Mulai</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
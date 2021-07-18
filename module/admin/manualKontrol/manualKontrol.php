<?php
include "../config/connection.php";
include "../process/proses_adminDataInput.php";
?>

<head>
    <script>
        window.onload = function() {
            startConnect();

        };

        function refreshPage() {
            window.location.href = "../module/index.php?module=manualKontrol";
        }
    </script>
</head>

<body>
    <div class="container-fluid" id="dataInput">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kontrol Manual</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kontrol Manual</h6>
            </div>
            <div class="card-body">

                <form class="user">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <!-- <input type="button" onclick="startConnect()" value="Connect"> -->
                            <button type="button" class="btn btn-success btn-icon-split mb-2 mb-sm-0" onclick="stateOn(); refreshPage();">
                                <span class="text">ON</span>
                            </button>

                            <script>
                                function stateOn() {
                                    onMessage = new Paho.MQTT.Message("true");
                                    onMessage.destinationName = "iotdashboard.ayam@gmail.com/manual";
                                    client.send(onMessage);
                                    console.log("true");

                                    alert('Manual Kontrol Aktif');
                                }
                            </script>

                            <button type="button" class="btn btn-danger btn-icon-split mb-2 mb-sm-0" onclick="stateOff(); refreshPage();">
                                <span class="text">OFF</span>
                            </button>
                            <script>
                                function stateOff() {
                                    ofMessage = new Paho.MQTT.Message("false");
                                    ofMessage.destinationName = "iotdashboard.ayam@gmail.com/manual";
                                    client.send(ofMessage);
                                    console.log("false");

                                    alert('Manual Kontrol Mati');
                                }
                            </script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiSafety" style="font-weight: bold">Kipas</label>
                            <select class="form-control" id="kipasKontrol" name="kipasKontrol">
                                <option hidden selected disabled>10-100</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="60">60</option>
                                <option value="70">70</option>
                                <option value="80">80</option>
                                <option value="90">90</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <div id="nilaiSafetyBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiSafety" style="font-weight: bold">Pompa</label>
                            <select class="form-control" id="pompaKontrol" name="pompaKontrol">
                                <option hidden selected disabled>ON/OFF</option>
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <div id="nilaiSafetyBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-icon-split mb-2 mb-sm-0" onclick="startPublishKontrol(); alert('Berhasil Publish'); refreshPage();">
                            <span class="text">Publish</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
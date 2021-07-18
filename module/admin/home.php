<?php
include "../config/connection.php";
include "../process/proses_dashboardAdmin.php";
?>

<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/luxon@1.27.0/build/global/luxon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0/dist/chartjs-adapter-luxon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@2.0.0/dist/chartjs-plugin-streaming.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.2.0/mqttws31.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.2.0/mqttws31.js" type="text/javascript"></script>
  <script src="../fuzzy.js" type="text/javascript"></script>
  <script src="../paho.js" type="text/javascript"></script>

  <script>
    window.onload = function() {
      startConnect();
      stateA();
    };
  </script>

<body>
  <div class="container-fluid" id="dataKaryawan">
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                  Suhu
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <div id="messages" class="row text-md ml-1">
                    <div id="suhu1"></div>
                    <div>°C</div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-temperature-low fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-success text-uppercase mb-1">Kelembaban</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <div id="messages1" class="row text-md ml-1">
                    <span> </span>
                    <div id="kelembaban1"></div>
                    <div> %</div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-tint fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Kecepatan Kipas</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <div id="messages2" class="row text-md ml-1">
                    <span> </span>
                    <div id="kipas1"></div>
                    <div> %</div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-fan fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">Pompa</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <div id="messages3" class="row text-md ml-1">
                    <span> </span>
                    <div id="pompa1"></div>
                    <div> </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-gas-pump fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">Umur Ayam Sekarang</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <div id="messages3" class="row text-md ml-1">
                    <span> </span>
                    <div></div>
                    <div id="umur_sekarang">
                      <?php
                      $resultTampilHistoryKandang = tampilHistoryKandang($con);
                      $rowUmur = mysqli_fetch_assoc($resultTampilHistoryKandang);

                      date_default_timezone_set('Asia/Jakarta');
                      $date = new DateTime('now');

                      $selisih1 = strtotime($date->format('Y-m-d')) - strtotime($rowUmur["tanggal_mulai"]);
                      $selisihhari = floor($selisih1 / (60 * 60 * 24));
                      $umursekarang = $rowUmur["umur_ayam_awal"] + $selisihhari;

                      if ($rowUmur["umur_ayam_awal"] == NULL) {
                        echo "";
                      } else {
                        echo "$umursekarang Hari";
                      }
                      ?>
                      <script>
                        function stateA() {
                          var um = <?php echo ($umursekarang); ?>;
                          // UmurMessages = document.getElementsById("umur_sekarang").value;
                          umurM = new Paho.MQTT.Message(um.toString());
                          umurM.destinationName = "iotdashboard.ayam@gmail.com/umur_sekarang";
                          client.send(umurM);
                          console.log('umur' + um);
                        }
                        setInterval(stateA, 6000);
                      </script>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-kiwi-bird fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">Sisa Hari</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <div id="messages3" class="row text-md ml-1">
                    <span> </span>
                    <div id="sisahari"></div>
                    <div>
                      <?php
                      $resultTampilHistoryKandang = tampilHistoryKandang($con);
                      $rowSisa = mysqli_fetch_assoc($resultTampilHistoryKandang);

                      date_default_timezone_set('Asia/Jakarta');
                      $date = new DateTime('now');

                      $time_mulai = strtotime($rowSisa["tanggal_mulai"]);
                      $a = 40 -  $rowSisa["umur_ayam_awal"];
                      $time_selesai = date('Y-m-d', strtotime("$a days", $time_mulai));

                      $b = strtotime($time_selesai) - strtotime($date->format('Y-m-d'));
                      $c = floor($b / (60 * 60 * 24));

                      if ($rowSisa["umur_ayam_awal"] == NULL) {
                        echo "";
                      } else {
                        echo "$c Hari";
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Realtime Chart Suhu & Kelembaban</h6>
          </div>
          <div class="card-body">

            <canvas id="myChart"></canvas>

          </div>
        </div>
      </div>
    </div>

    <body>
<?php
include "../config/connection.php";
include "../process/proses_dashboardAdmin.php";
?>

<head>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
</head>

<body>
    <div class="container-fluid" id="dataDiagram">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-industry"></i>
                    <span>Data Diagram</span>
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-sm-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Suhu Harian</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 p-0">
                            <canvas id="myAreaChart" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kelembaban Harian</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 p-0">
                            <canvas id="myBarChart" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <body>
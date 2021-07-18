<?php

include "../config/connection.php";
//include "../process/proses_adminDataHistory.php";
include "../process/proses_adminDataInput.php";
?>

<body>
    <div class="container-fluid" id="dataHistory">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History Kandang</span>
                </li>
            </ol>
        </nav>

        <!-- Data Input Ayam -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Ayam</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="form-group row float-right" style="margin-right: .75rem;">
                        <div class="col-sm-9">
                            <select class="custom-select-dataHistory" id="s_jenis_kandang" name="s_jenis_kandang">
                                <option value ="">Cari Kandang 1/2</option>
                                <option value="Kandang 1">Kandang 1</option>
                                <option value="Kandang 2">Kandang 2</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-warning btn-icon-split mb-2 mb-sm-0" name="search" id="search">
                                <span class="text">Cari</span>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="data">
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
		$(document).ready(function(){
            $('.data').load("admin/dataHistory/data.php");
		    $("#search").click(function(){
		    	var jenis_kandang= $("#s_jenis_kandang").val();
		    	$.ajax({
		            type: 'POST',
                    url: "admin/dataHistory/data.php",
		            data: {jenis_kandang: jenis_kandang},
		            success: function(hasil) {
		                $('.data').html(hasil);
		            }
		        });
		    });
		});
	</script>
</body>
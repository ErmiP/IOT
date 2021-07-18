$(function () {
    $('#datepickerTanggalTraining').datepicker();
});

$(function () {
    $('#datepickerTanggalTrainingEdit').datepicker();
});

$(".edit-dataScoreSafety-admin").click(function () {
    var id_scoreSafetyEdit = $(this).attr("id_scoreSafetyEdit");

    $.ajax({
        url: "../process/proses_adminDataScoreSafety.php",
        method: "post",
        data: {
            editDataScoreSafety_idScoreSafety: id_scoreSafetyEdit
        },
        success: function (data) {
            $("#id_scoreSafetyUpdate").val(id_scoreSafetyEdit);
            $("#edit-dataScoreSafety").html(data);
            $("#editDataScoreSafetyModal").modal("show");
        }
    });
});

$(".hapus-dataScoreSafety-admin").click(function () {
    var id_score_safety = $(this).attr("id_score_safety");

    $('#id_scoreSafetyHapus').val(id_score_safety);

    $('#hapusDataScoreSafetyModal').modal("show");
});

$(".info-dataScoreSafety-admin").click(function () {
    var id_scoreSafetyInfo = $(this).attr("id_scoreSafetyInfo");

    $.ajax({
        url: "../process/proses_adminDataScoreSafety.php",
        method: "post",
        data: {
            infoDataScoreSafety_idScoreSafety: id_scoreSafetyInfo
        },
        success: function (data) {
            $("#info-dataScoreSafety").html(data);
            $("#infoDataScoreSafetyModal").modal("show");
        }
    });
});

$(".edit-dataScoreSafetyDetail-admin").click(function () {
    var id_scoreSafetyDetailEdit = $(this).attr("id_scoreSafetyDetailEdit");

    $.ajax({
        url: "../process/proses_adminDataScoreSafetyDetail.php",
        method: "post",
        data: {
            editDataScoreSafetyDetail_idScoreSafety: id_scoreSafetyDetailEdit
        },
        success: function (data) {
            $("#id_scoreSafetyDetailUpdate").val(id_scoreSafetyDetailEdit);
            $("#edit-dataScoreSafetyDetail").html(data);
            $("#editDataScoreSafetyDetailModal").modal("show");
        }
    });
});

$(".hapus-dataScoreSafetyDetail-admin").click(function () {
    var id_score_safety_detail = $(this).attr("id_score_safety_detail");

    $('#id_scoreSafetyDetailHapus').val(id_score_safety_detail);

    $('#hapusDataScoreSafetyDetailModal').modal("show");
})

function ValidasiTambahScoreSafety() {
    var poinSafety = document.getElementById("poinSafety").value;
    var nilaiSafety = document.getElementById("nilaiSafety").value;
    var dateSafety = document.getElementById("dateSafety").value;

    if (poinSafety == "") {
        document.getElementById("poinSafetyBlank").innerHTML = "*Masukkan Data Total Poin Safety";
    }

    else if (poinSafety != "") {
        document.getElementById("poinSafetyBlank").innerHTML = "";
    }
    if (nilaiSafety == "") {
        document.getElementById("nilaiSafetyBlank").innerHTML = "*Masukkan Data Total Nilai Safety";
    }

    else if (nilaiSafety != "") {
        document.getElementById("nilaiSafetyBlank").innerHTML = "";
    }
    if (dateSafety == "") {
        document.getElementById("dateSafetyBlank").innerHTML = "*Masukkan Data Tanggal Safety";
    }

    else if (dateSafety != "") {
        document.getElementById("dateSafetyBlank").innerHTML = "";
    }
}

function ValidasiEditScoreSafety() {
    var poinSafetyEdit = document.getElementById("poinSafetyEdit").value;
    var nilaiSafetyEdit = document.getElementById("nilaiSafetyEdit").value;
    var dateSafetyEdit = document.getElementById("dateSafetyEdit").value;

    if (poinSafetyEdit == "") {
        document.getElementById("poinSafetyEditBlank").innerHTML = "*Masukkan Data Total Poin Safety";
    }

    else if (poinSafetyEdit != "") {
        document.getElementById("poinSafetyEditBlank").innerHTML = "";
    }
    if (nilaiSafetyEdit == "") {
        document.getElementById("nilaiSafetyEditBlank").innerHTML = "*Masukkan Data Total Nilai Safety";
    }

    else if (nilaiSafetyEdit != "") {
        document.getElementById("nilaiSafetyEditBlank").innerHTML = "";
    }
    if (dateSafetyEdit == "") {
        document.getElementById("dateSafetyEditBlank").innerHTML = "*Masukkan Data Tanggal Safety";
    }

    else if (dateSafetyEdit != "") {
        document.getElementById("dateSafetyEditBlank").innerHTML = "";
    }
}

function ValidasiTambahScoreSafetyDetail() {
    var smk3Detail= document.getElementById("smk3Detail").value;
    var eaHiraDetail = document.getElementById("eaHiraDetail").value;
    var movForkliftDetail = document.getElementById("movForkliftDetail").value;
    var conSpaceDetail = document.getElementById("conSpaceDetail").value;
    var lotoDetail = document.getElementById("lotoDetail").value;
    var apdDetail = document.getElementById("apdDetail").value;
    var bbsDetail = document.getElementById("bbsDetail").value;
    var fireFightingDetail = document.getElementById("fireFightingDetail").value;
    var wahDetail = document.getElementById("wahDetail").value;
    var environmentDetail = document.getElementById("environmentDetail").value;
    var p3kDetail = document.getElementById("p3kDetail").value;

    if (smk3Detail == "") {
        document.getElementById("smk3DetailBlank").innerHTML = "*Masukkan Nilai SMK3";
    }

    else if (smk3Detail != "") {
        document.getElementById("smk3DetailBlank").innerHTML = "";
    }
    if (eaHiraDetail == "") {
        document.getElementById("ea-hiraDetailBlank").innerHTML = "*Masukkan Nilai EA-HIRA";
    }

    else if (eaHiraDetail != "") {
        document.getElementById("ea-hiraDetailBlank").innerHTML = "";
    }
    if (movForkliftDetail == "") {
        document.getElementById("movForkliftDetailBlank").innerHTML = "*Masukkan Nilai MOVEMENT FORKLIFT";
    }

    else if (movForkliftDetail != "") {
        document.getElementById("movForkliftDetailBlank").innerHTML = "";
    }
    if (conSpaceDetail == "") {
        document.getElementById("conSpaceDetailBlank").innerHTML = "*Masukkan Nilai CONFINED SPACE";
    }

    else if (conSpaceDetail != "") {
        document.getElementById("conSpaceDetailBlank").innerHTML = "";
    }
    if (lotoDetail == "") {
        document.getElementById("lotoDetailBlank").innerHTML = "*Masukkan Nilai LOTO ";
    }

    else if (lotoDetail != "") {
        document.getElementById("lotoDetailBlank").innerHTML = "";
    }
    if (apdDetail == "") {
        document.getElementById("apdDetailBlank").innerHTML = "*Masukkan Nilai APD";
    }

    else if (apdDetail != "") {
        document.getElementById("apdDetailBlank").innerHTML = "";
    }
    if (bbsDetail == "") {
        document.getElementById("bbsDetailBlank").innerHTML = "*Masukkan Nilai BBS";
    }

    else if (bbsDetail != "") {
        document.getElementById("bbsDetailBlank").innerHTML = "";
    }
    if (fireFightingDetail == "") {
        document.getElementById("fireFightingDetailBlank").innerHTML = "*Masukkan Nilai FIRE FIGHTING";
    }

    else if (fireFightingDetail != "") {
        document.getElementById("fireFightingDetailBlank").innerHTML = "";
    }
    if (wahDetail == "") {
        document.getElementById("wahDetailBlank").innerHTML = "*Masukkan Nilai WAH";
    }

    else if (wahDetail != "") {
        document.getElementById("wahDetailBlank").innerHTML = "";
    }
    if (environmentDetail == "") {
        document.getElementById("environmentDetailBlank").innerHTML = "*Masukkan Nilai ENVIRONMENT";
    }

    else if (environmentDetail != "") {
        document.getElementById("environmentDetailBlank").innerHTML = "";
    }
    if (p3kDetail == "") {
        document.getElementById("p3kDetailBlank").innerHTML = "*Masukkan Nilai P3K";
    }

    else if (p3kDetail != "") {
        document.getElementById("p3kDetailBlank").innerHTML = "";
    }
}

function ValidasiEditScoreSafetyDetail() {
    var smk3SafetyEditDetail= document.getElementById("smk3SafetyEditDetail").value;
    var eaHiraSafetyEditDetail = document.getElementById("eaHiraSafetyEditDetail").value;
    var movForkliftSafetyEditDetail = document.getElementById("movForkliftSafetyEditDetail").value;
    var conSpaceSafetyEditDetail = document.getElementById("conSpaceSafetyEditDetail").value;
    var lotoSafetyEditDetail = document.getElementById("lotoSafetyEditDetail").value;
    var apdSafetyEditDetail = document.getElementById("apdSafetyEditDetail").value;
    var bbsSafetyEditDetail = document.getElementById("bbsSafetyEditDetail").value;
    var fireFightingSafetyEditDetail = document.getElementById("fireFightingSafetyEditDetail").value;
    var wahSafetyEditDetail = document.getElementById("wahSafetyEditDetail").value;
    var environmentSafetyEditDetail = document.getElementById("environmentSafetyEditDetail").value;
    var p3kSafetyEditDetail = document.getElementById("p3kSafetyEditDetail").value;

    if (smk3SafetyEditDetail == "") {
        document.getElementById("smk3SafetyEditDetailBlank").innerHTML = "*Masukkan Nilai SMK3";
    }

    else if (smk3SafetyEditDetail != "") {
        document.getElementById("smk3SafetyEditDetailBlank").innerHTML = "";
    }
    if (eaHiraSafetyEditDetail == "") {
        document.getElementById("eaHiraSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai EA-HIRA";
    }

    else if (eaHiraSafetyEditDetail != "") {
        document.getElementById("eaHiraSafetyEditDetailBlank").innerHTML = "";
    }
    if (movForkliftSafetyEditDetail == "") {
        document.getElementById("movForkliftSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai MOVEMENT FORKLIFT";
    }

    else if (movForkliftSafetyEditDetail != "") {
        document.getElementById("movForkliftSafetyEditDetailBlank").innerHTML = "";
    }
    if (conSpaceSafetyEditDetail == "") {
        document.getElementById("conSpaceSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai CONFINED SPACE";
    }

    else if (conSpaceSafetyEditDetail != "") {
        document.getElementById("conSpaceSafetyEditDetailBlank").innerHTML = "";
    }
    if (lotoSafetyEditDetail == "") {
        document.getElementById("lotoSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai LOTO ";
    }

    else if (lotoSafetyEditDetail != "") {
        document.getElementById("lotoSafetyEditDetailBlank").innerHTML = "";
    }
    if (apdSafetyEditDetail== "") {
        document.getElementById("apdSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai APD";
    }

    else if (apdSafetyEditDetail != "") {
        document.getElementById("apdSafetyEditDetailBlank").innerHTML = "";
    }
    if (bbsSafetyEditDetail == "") {
        document.getElementById("bbsSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai BBS";
    }

    else if (bbsSafetyEditDetail != "") {
        document.getElementById("bbsSafetyEditDetailBlank").innerHTML = "";
    }
    if (fireFightingSafetyEditDetail == "") {
        document.getElementById("fireFightingSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai FIRE FIGHTING";
    }

    else if (fireFightingSafetyEditDetail != "") {
        document.getElementById("fireFightingSafetyEditDetailBlank").innerHTML = "";
    }
    if (wahSafetyEditDetail == "") {
        document.getElementById("wahSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai WAH";
    }

    else if (wahSafetyEditDetail != "") {
        document.getElementById("wahSafetyEditDetailBlank").innerHTML = "";
    }
    if (environmentSafetyEditDetail == "") {
        document.getElementById("environmentSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai ENVIRONMENT";
    }

    else if (environmentSafetyEditDetail != "") {
        document.getElementById("environmentSafetyEditDetailBlank").innerHTML = "";
    }
    if (p3kSafetyEditDetail == "") {
        document.getElementById("p3kSafetyEditDetailBlank").innerHTML = "*Masukkan Nilai P3K";
    }

    else if (p3kSafetyEditDetail != "") {
        document.getElementById("p3kSafetyEditDetailBlank").innerHTML = "";
    }
}
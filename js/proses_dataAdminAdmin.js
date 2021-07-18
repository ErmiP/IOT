$(".edit-dataAdmin-admin").click(function () {
    var id_userEdit = $(this).attr("id_userEdit");
    var id_adminEdit = $(this).attr("id_adminEdit");

    $.ajax({
        url: "../process/proses_adminDataAdmin.php",
        method: "post",
        data: {
            editDataAdmin_idUser: id_userEdit,
            editDataAdmin_idAdmin: id_adminEdit
        },
        success: function (data) {
            $("#id_userUpdate").val(id_userEdit);
            $("#id_adminUpdate").val(id_adminEdit);
            $("#edit-dataAdmin").html(data);
            $("#editDataAdminModal").modal("show");
        }
    });
});

$(".hapus-dataAdmin-admin").click(function () {
    var id_user = $(this).attr("id_user");
    var id_admin = $(this).attr("id_admin");
    $('#id_userHapus').val(id_user);
    $('#id_adminHapus').val(id_admin);
    $('#hapusDataAdminModal').modal("show");
})

function showPasswordAdmin() {
    var password = document.getElementById("passwordAdminAdmin");
    if (password.type == "password") {
        password.type = "text";
    } 
    else {
        password.type = "password";
    }

    var eye = document.getElementById("eyeAdmin").classList;
    if (eye.contains("fa-eye")) {
        eye.remove("fa-eye");
        eye.add("fa-eye-slash");
    } 
    else {
        eye.remove("fa-eye-slash");
        eye.add("fa-eye");
    }
}

function setupAdmin2() {
    document.getElementById('buttonid2').addEventListener('click', openDialog);
    function openDialog() {
        document.getElementById('fileid2').click();
    }
}

function preview_imagesAdmin22(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById("fotoPrevAdminAdmin3");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function preventDefaultActionAdmin(event) {
    var input, file;
    input = document.getElementById("fileid2");
    file = input.files[0];
    if (file.size > 1000000) {
        event = event || window.event;
        document.getElementById("fileidAdminAdminBlank").innerHTML = "*Ukuran melebihi 1 MB";
        if (event.preventDefault) {
            event.preventDefault();
        }
        else {
            event.returnValue = false;
        }
    }
    else if (file.size < 1000000) {
        document.getElementById("fileidAdminAdminBlank").innerHTML = "";
    }
}

function ValidasiTambahAdmin() {
    var usernameAdminAdmin = document.getElementById("usernameAdminAdmin").value;
    var passwordAdminAdmin = document.getElementById("passwordAdminAdmin").value;
    var fileid2 = document.getElementById("fileid2").value;
    var namaAdminAdmin = document.getElementById("namaAdminAdmin").value;
    if (usernameAdminAdmin == "") {
        document.getElementById("usernameAdminAdminBlank").innerHTML = "*Masukkan Username Admin";
    }
    else if (usernameAdminAdmin != "") {
        document.getElementById("usernameAdminAdminBlank").innerHTML = "";
    }
    
    if (passwordAdminAdmin == "") {
        document.getElementById("passwordAdminAdminBlank").innerHTML = "*Masukkan Password Admin";
    }
    else if (passwordAdminAdmin != "") {
        document.getElementById("passwordAdminAdminBlank").innerHTML = "";
    }

    if (fileid2 == "") {
        document.getElementById("fileidAdminAdminBlank").innerHTML = "*Upload File Gambar Admin";
    }
    else if (fileid2 != "") {
        document.getElementById("fileidAdminAdminBlank").innerHTML = "";
    }

    if (namaAdminAdmin == "") {
        document.getElementById("namaAdminAdminBlank").innerHTML = "*Masukkan Nama Admin";
    }
    else if (namaAdminAdmin != "") {
        document.getElementById("namaAdminAdminBlank").innerHTML = "";
    }
}

function setupAdmin3() {
    document.getElementById('buttonid3').addEventListener('click', openDialog2);
    function openDialog2() {
        document.getElementById('fileid3').click();
    }
}

function preview_imagesAdmin6(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById("fotoPrevAdminAdmin2");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function preventDefaultActionAdmin2(event) {
    var input2, file2;
    input2 = document.getElementById("fileid3");
    file2 = input2.files[0];
    if (file2.size > 1000000) {
        event = event || window.event;
        document.getElementById("fileidAdminAdminBlank2").innerHTML = "*Ukuran melebihi 1 MB";
        if (event.preventDefault) {
            event.preventDefault();
        }
        else {
            event.returnValue = false;
        }
    }
    else if (file.size < 1000000) {
        document.getElementById("fileidAdminAdminBlank2").innerHTML = "";
    }
}

function showPasswordAdmin2() {
    var password = document.getElementById("passwordAdminAdmin2");
    if (password.type == "password") {
        password.type = "text";
    } 
    else {
        password.type = "password";
    }

    var eye = document.getElementById("eyeAdmin2").classList;
    if (eye.contains("fa-eye")) {
        eye.remove("fa-eye");
        eye.add("fa-eye-slash");
    } 
    else {
        eye.remove("fa-eye-slash");
        eye.add("fa-eye");
    }
}

function ValidasiEditAdmin() {
    var usernameAdminAdmin2 = document.getElementById("usernameAdminAdmin2").value;
    var passwordAdminAdmin2 = document.getElementById("passwordAdminAdmin2").value;
    var namaAdminAdmin2 = document.getElementById("namaAdminAdmin2").value;

    if (usernameAdminAdmin2 == "") {
        document.getElementById("usernameAdminAdminBlank2").innerHTML = "*Masukkan Username Admin";
    }
    else if (usernameAdminAdmin2 != "") {
        document.getElementById("usernameAdminAdminBlank2").innerHTML = "";
    }

    if (passwordAdminAdmin2 == "") {
        document.getElementById("passwordAdminAdminBlank2").innerHTML = "*Masukkan Password Admin";
    }
    else if (passwordAdminAdmin2 != "") {
        document.getElementById("passwordAdminAdminBlank2").innerHTML = "";
    }

    if (namaAdminAdmin2 == "") {
        document.getElementById("namaAdminAdminBlank2").innerHTML = "*Masukkan Nama Admin";
    }
    else if (namaAdminAdmin2 != "") {
        document.getElementById("namaAdminAdminBlank2").innerHTML = "";
    }
}
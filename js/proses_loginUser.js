function showPassword() {
  var password = document.getElementById("password");
  if (password.type == "password") {
    password.type = "text";
  }
  else {
    password.type = "password";
  }

  var eye = document.getElementById("eye").classList;
  if (eye.contains("fa-eye")) {
    eye.remove("fa-eye");
    eye.add("fa-eye-slash");
  }
  else {
    eye.remove("fa-eye-slash");
    eye.add("fa-eye");
  }
}

function validateUsername(input) {
  if (input.value == "") {
    document.getElementById("error-handling").classList.remove("d-none");
    document.getElementById("error-handling").classList.add("d-flex");
    document.getElementById("error-handling").innerHTML =
      "*Username harus diisi";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return false;
  }
  else {
    document.getElementById("error-handling").classList.add("d-none");
    document.getElementById("error-handling").classList.remove("d-flex");
    document.getElementById("error-handling").innerHTML = "";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return true;
  }
}

function validatePassword(input) {
  if (input.value == "") {
    document.getElementById("error-handling").classList.remove("d-none");
    document.getElementById("error-handling").classList.add("d-flex");
    document.getElementById("error-handling").innerHTML =
      "*Password harus diisi";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return false;
  }
  else {
    document.getElementById("error-handling").classList.add("d-none");
    document.getElementById("error-handling").classList.remove("d-flex");
    document.getElementById("error-handling").innerHTML = "";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return true;
  }
}

function validateOnSubmit() {
  if (validateUsername(document.getElementById("username")) == false) {
    return false;
  }
  if (validatePassword(document.getElementById("password")) == false) {
    return false;
  }
  return true;
}

function getUrl(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    if (pair[0] == variable) {
      return pair[1];
    }
  }
  return false;
}
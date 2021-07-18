var umur = 0;
var suhu = 0;
var rh = 0;

var outKipas = 0;
var outPompa = 0;

var weight1 = 0;
var average1 = 0;
var weight2 = 0;
var average2 = 0;

// Input
var umAnak, umRemaja, umDewasa;
var shDingin, shNormal, shPanas;
var rhKering, rhNormal, rhBasah;

// Output
var S_L = 10;
var L = 20;
var A_L = 30;
var M = 40;
var A_M = 50;
var N = 60;
var A_C = 70;
var C = 80;
var S_C = 90;
var T_C = 100;

var mati = 0;
var hidup = 100;

var rule1,
  rule2,
  rule3,
  rule4,
  rule5,
  rule6,
  rule7,
  rule8,
  rule9,
  rule10,
  rule11,
  rule12,
  rule13,
  rule14,
  rule15,
  rule16,
  rule17,
  rule18,
  rule19,
  rule20,
  rule21,
  rule22,
  rule23,
  rule24,
  rule25,
  rule26,
  rule27;

// Fuzzyfikasi Umur
function U_anak() {
  if (umur > 0 && umur <= 15) {
    umAnak = 1;
  } else if (umur > 15 && umur <= 25) {
    umAnak = (25 - umur) / (25 - 15);
  } else if (umur > 25) {
    umAnak = 0;
  }
  return umAnak;
}
function U_remaja() {
  if (umur <= 15 || umur > 35) {
    umRemaja = 0;
  } else if (umur > 15 && umur <= 25) {
    umRemaja = (umur - 15) / (25 - 15);
  } else if (umur > 25 && umur <= 35) {
    umRemaja = (35 - umur) / (35 - 25);
  }
  return umRemaja;
}
function U_dewasa() {
  if (umur <= 25) {
    umDewasa = 0;
  } else if (umur > 25 && umur <= 35) {
    umDewasa = (umur - 25) / (35 - 25);
  } else if (umur > 35) {
    umDewasa = 1;
  }
  return umDewasa;
}

// Fuzzyfikasi Suhu
function suhuDingin() {
  if (suhu > 0 && suhu <= 22) {
    shDingin = 1;
  } else if (suhu > 22 && suhu <= 25) {
    shDingin = (25 - suhu) / (25 - 22);
  } else if (suhu > 25) {
    shDingin = 0;
  }
  return shDingin;
}
function suhuNormal() {
  if (suhu <= 22 || suhu > 28) {
    shNormal = 0;
  } else if (suhu > 22 && suhu <= 25) {
    shNormal = (suhu - 22) / (25 - 22);
  } else if (suhu > 25 && suhu < 28) {
    shNormal = (28 - suhu) / (28 - 25);
  }
  return shNormal;
}
function suhuPanas() {
  if (suhu <= 25) {
    shPanas = 0;
  } else if (suhu > 25 && suhu <= 28) {
    shPanas = (suhu - 25) / (28 - 25);
  } else if (suhu > 28) {
    shPanas = 1;
  }
  return shPanas;
}

//Fuzzyfikasi Kelembaban
function kelKering() {
  if (rh > 0 && rh <= 40) {
    rhKering = 1;
  } else if (rh > 40 && rh <= 55) {
    rhKering = (55 - rh) / (55 - 40);
  } else if (rh > 55) {
    rhKering = 0;
  }
  return rhKering;
}
function kelNormal() {
  if (rh <= 40 || rh > 70) {
    rhNormal = 0;
  } else if (rh > 40 && rh <= 55) {
    rhNormal = (rh - 40) / (55 - 40);
  } else if (rh > 55 && rh <= 70) {
    rhNormal = (70 - rh) / (70 - 55);
  }
  return rhNormal;
}
function kelBasah() {
  if (rh <= 55) {
    rhBasah = 0;
  } else if (rh > 55 && rh <= 70) {
    rhBasah = (rh - 55) / (70 - 55);
  } else if (rh > 70) {
    rhBasah = 1;
  }
  return rhBasah;
}

//Fuzzifikasi
function fuzzifikasi() {
  U_anak();
  U_remaja();
  U_dewasa();
  suhuDingin();
  suhuNormal();
  suhuPanas();
  kelKering();
  kelNormal();
  kelBasah();
}

// Rule
function fuzzy_rule_kipas() {
  var jml_rule = [];
  //   var SumA = 0;
  fuzzifikasi();
  if (shDingin >= 0 && rhKering >= 0 && umAnak >= 0) {
    rule1 = Math.min(shDingin, rhKering, umAnak);
    // rule1 = Math.min(SumA, umAnak);
    jml_rule[0] = rule1;
  }
  if (shDingin >= 0 && rhNormal >= 0 && umAnak >= 0) {
    rule2 = Math.min(shDingin, rhNormal, umAnak);
    // rule2 = Math.min(SumA, umAnak);
    jml_rule[1] = rule2;
  }
  if (shDingin >= 0 && rhBasah >= 0 && umAnak >= 0) {
    rule3 = Math.min(shDingin, rhBasah, umAnak);
    // rule3 = Math.min(SumA, umAnak);
    jml_rule[2] = rule3;
  }
  if (shNormal >= 0 && rhKering >= 0 && umAnak >= 0) {
    rule4 = Math.min(shNormal, rhKering, umAnak);
    // rule4 = Math.min(SumA, umAnak);
    jml_rule[3] = rule4;
  }
  if (shNormal >= 0 && rhNormal >= 0 && umAnak >= 0) {
    rule5 = Math.min(shNormal, rhNormal, umAnak);
    // rule5 = Math.min(SumA, umAnak);
    jml_rule[4] = rule5;
  }
  if (shNormal >= 0 && rhBasah >= 0 && umAnak >= 0) {
    rule6 = Math.min(shNormal, rhBasah, umAnak);
    // rule6 = Math.min(SumA, umAnak);
    jml_rule[5] = rule6;
  }
  if (shPanas >= 0 && rhKering >= 0 && umAnak >= 0) {
    rule7 = Math.min(shPanas, rhKering, umAnak);
    // rule7 = Math.min(SumA, umAnak);
    jml_rule[6] = rule7;
  }
  if (shPanas >= 0 && rhNormal >= 0 && umAnak >= 0) {
    rule8 = Math.min(shPanas, rhNormal, umAnak);
    // rule8 = Math.min(SumA, umAnak);
    jml_rule[7] = rule8;
  }
  if (shPanas >= 0 && rhBasah >= 0 && umAnak >= 0) {
    rule9 = Math.min(shPanas, rhBasah, umAnak);
    // rule9 = Math.min(SumA, umAnak);
    jml_rule[8] = rule9;
  }

  if (shDingin >= 0 && rhKering >= 0 && umRemaja >= 0) {
    rule10 = Math.min(shDingin, rhKering, umRemaja);
    // rule10 = Math.min(SumA, umRemaja);
    jml_rule[9] = rule10;
  }
  if (shDingin >= 0 && rhNormal >= 0 && umRemaja >= 0) {
    rule11 = Math.min(shDingin, rhNormal, umRemaja);
    // rule11 = Math.min(SumA, umRemaja);
    jml_rule[10] = rule11;
  }
  if (shDingin >= 0 && rhBasah >= 0 && umRemaja >= 0) {
    rule12 = Math.min(shDingin, rhBasah, umRemaja);
    // rule12 = Math.min(SumA, umRemaja);
    jml_rule[11] = rule12;
  }
  if (shNormal >= 0 && rhKering >= 0 && umRemaja >= 0) {
    rule13 = Math.min(shNormal, rhKering, umRemaja);
    // rule13 = Math.min(SumA, umRemaja);
    jml_rule[12] = rule13;
  }
  if (shNormal >= 0 && rhNormal >= 0 && umRemaja >= 0) {
    rule14 = Math.min(shNormal, rhNormal, umRemaja);
    // rule14 = Math.min(SumA, umRemaja);
    jml_rule[13] = rule14;
  }
  if (shNormal >= 0 && rhBasah >= 0 && umRemaja >= 0) {
    rule15 = Math.min(shNormal, rhBasah, umRemaja);
    // rule15 = Math.min(SumA, umRemaja);
    jml_rule[14] = rule15;
  }
  if (shPanas >= 0 && rhKering >= 0 && umRemaja >= 0) {
    rule16 = Math.min(shPanas, rhKering, umRemaja);
    // rule16 = Math.min(SumA, umRemaja);
    jml_rule[15] = rule16;
  }
  if (shPanas >= 0 && rhNormal >= 0 && umRemaja >= 0) {
    rule17 = Math.min(shPanas, rhNormal, umRemaja);
    // rule17 = Math.min(SumA, umRemaja);
    jml_rule[16] = rule17;
  }
  if (shPanas >= 0 && rhBasah >= 0 && umRemaja >= 0) {
    rule18 = Math.min(shPanas, rhBasah, umRemaja);
    // rule18 = Math.min(SumA, umRemaja);
    jml_rule[17] = rule18;
  }

  if (shDingin >= 0 && rhKering >= 0 && umDewasa >= 0) {
    rule19 = Math.min(shDingin, rhKering, umDewasa);
    // rule19 = Math.min(SumA, umDewasa);
    jml_rule[18] = rule19;
  }
  if (shDingin >= 0 && rhNormal >= 0 && umDewasa >= 0) {
    rule20 = Math.min(shDingin, rhNormal, umDewasa);
    // rule20 = Math.min(SumA, umDewasa);
    jml_rule[19] = rule20;
  }
  if (shDingin >= 0 && rhBasah >= 0 && umDewasa >= 0) {
    rule21 = Math.min(shDingin, rhBasah, umDewasa);
    // rule21 = Math.min(SumA, umDewasa);
    jml_rule[20] = rule21;
  }
  if (shNormal >= 0 && rhKering >= 0 && umDewasa >= 0) {
    rule22 = Math.min(shNormal, rhKering, umDewasa);
    // rule22 = Math.min(SumA, umDewasa);
    jml_rule[21] = rule22;
  }
  if (shNormal >= 0 && rhNormal >= 0 && umDewasa >= 0) {
    rule23 = Math.min(shNormal, rhNormal, umDewasa);
    // rule23 = Math.min(SumA, umDewasa);
    jml_rule[22] = rule23;
  }
  if (shNormal >= 0 && rhBasah >= 0 && umDewasa >= 0) {
    rule24 = Math.min(shNormal, rhBasah, umDewasa);
    // rule24 = Math.min(SumA, umDewasa);
    jml_rule[23] = rule24;
  }
  if (shPanas >= 0 && rhKering >= 0 && umDewasa >= 0) {
    rule25 = Math.min(shPanas, rhKering, umDewasa);
    // rule25 = Math.min(SumA, umDewasa);
    jml_rule[24] = rule25;
  }
  if (shPanas >= 0 && rhNormal >= 0 && umDewasa >= 0) {
    rule26 = Math.min(shPanas, rhNormal, umDewasa);
    // rule26 = Math.min(SumA, umDewasa);
    jml_rule[25] = rule26;
  }
  if (shPanas >= 0 && rhBasah >= 0 && umDewasa >= 0) {
    rule27 = Math.min(shPanas, rhBasah, umDewasa);
    // rule27 = Math.min(SumA, umDewasa);
    jml_rule[26] = rule27;
  }

  //defuzifikasi
  weight1 =
    rule1 * S_L +
    rule2 * S_L +
    rule3 * L +
    rule4 * L +
    rule5 * A_L +
    rule6 * M +
    rule7 * A_M +
    rule8 * N +
    rule9 * C +
    rule10 * L +
    rule11 * M +
    rule12 * A_M +
    rule13 * A_M +
    rule14 * N +
    rule15 * A_C +
    rule16 * A_C +
    rule17 * C +
    rule18 * S_C +
    rule19 * A_M +
    rule20 * A_L +
    rule21 * L +
    rule22 * C +
    rule23 * A_C +
    rule24 * N +
    rule25 * T_C +
    rule26 * T_C +
    rule27 * S_C;
  average1 =
    jml_rule[0] +
    jml_rule[1] +
    jml_rule[2] +
    jml_rule[3] +
    jml_rule[4] +
    jml_rule[5] +
    jml_rule[6] +
    jml_rule[7] +
    jml_rule[8] +
    jml_rule[9] +
    jml_rule[10] +
    jml_rule[11] +
    jml_rule[12] +
    jml_rule[13] +
    jml_rule[14] +
    jml_rule[15] +
    jml_rule[16] +
    jml_rule[17] +
    jml_rule[18] +
    jml_rule[19] +
    jml_rule[20] +
    jml_rule[21] +
    jml_rule[22] +
    jml_rule[23] +
    jml_rule[24] +
    jml_rule[25] +
    jml_rule[26];
  outKipas = weight1 / average1;
}

function fuzzy_rule_pompa() {
  var jml_rule = [];
  var SumA = 0;
  fuzzifikasi();
  if (shDingin >= 0 && rhKering >= 0 && umAnak >= 0) {
    SumA = Math.min(shDingin, rhKering);
    rule1 = Math.min(SumA, umAnak);
    jml_rule[0] = rule1;
  }
  if (shDingin >= 0 && rhNormal >= 0 && umAnak >= 0) {
    SumA = Math.min(shDingin, rhNormal);
    rule2 = Math.min(SumA, umAnak);
    jml_rule[1] = rule2;
  }
  if (shDingin >= 0 && rhBasah >= 0 && umAnak >= 0) {
    SumA = Math.min(shDingin, rhBasah);
    rule3 = Math.min(SumA, umAnak);
    jml_rule[2] = rule3;
  }
  if (shNormal >= 0 && rhKering >= 0 && umAnak >= 0) {
    SumA = Math.min(shNormal, rhKering);
    rule4 = Math.min(SumA, umAnak);
    jml_rule[3] = rule4;
  }
  if (shNormal >= 0 && rhNormal >= 0 && umAnak >= 0) {
    SumA = Math.min(shNormal, rhNormal);
    rule5 = Math.min(SumA, umAnak);
    jml_rule[4] = rule5;
  }
  if (shNormal >= 0 && rhBasah >= 0 && umAnak >= 0) {
    SumA = Math.min(shNormal, rhBasah);
    rule6 = Math.min(SumA, umAnak);
    jml_rule[5] = rule6;
  }
  if (shPanas >= 0 && rhKering >= 0 && umAnak >= 0) {
    SumA = Math.min(shPanas, rhKering);
    rule7 = Math.min(SumA, umAnak);
    jml_rule[6] = rule7;
  }
  if (shPanas >= 0 && rhNormal >= 0 && umAnak >= 0) {
    SumA = Math.min(shPanas, rhNormal);
    rule8 = Math.min(SumA, umAnak);
    jml_rule[7] = rule8;
  }
  if (shPanas >= 0 && rhBasah >= 0 && umAnak >= 0) {
    SumA = Math.min(shPanas, rhBasah);
    rule9 = Math.min(SumA, umAnak);
    jml_rule[8] = rule9;
  }

  if (shDingin >= 0 && rhKering >= 0 && umRemaja >= 0) {
    SumA = Math.min(shDingin, rhKering);
    rule10 = Math.min(SumA, umRemaja);
    jml_rule[9] = rule10;
  }
  if (shDingin >= 0 && rhNormal >= 0 && umRemaja >= 0) {
    SumA = Math.min(shDingin, rhNormal);
    rule11 = Math.min(SumA, umRemaja);
    jml_rule[10] = rule11;
  }
  if (shDingin >= 0 && rhBasah >= 0 && umRemaja >= 0) {
    SumA = Math.min(shDingin, rhBasah);
    rule12 = Math.min(SumA, umRemaja);
    jml_rule[11] = rule12;
  }
  if (shNormal >= 0 && rhKering >= 0 && umRemaja >= 0) {
    SumA = Math.min(shNormal, rhKering);
    rule13 = Math.min(SumA, umRemaja);
    jml_rule[12] = rule13;
  }
  if (shNormal >= 0 && rhNormal >= 0 && umRemaja >= 0) {
    SumA = Math.min(shNormal, rhNormal);
    rule14 = Math.min(SumA, umRemaja);
    jml_rule[13] = rule14;
  }
  if (shNormal >= 0 && rhBasah >= 0 && umRemaja >= 0) {
    SumA = Math.min(shNormal, rhBasah);
    rule15 = Math.min(SumA, umRemaja);
    jml_rule[14] = rule15;
  }
  if (shPanas >= 0 && rhKering >= 0 && umRemaja >= 0) {
    SumA = Math.min(shPanas, rhKering);
    rule16 = Math.min(SumA, umRemaja);
    jml_rule[15] = rule16;
  }
  if (shPanas >= 0 && rhNormal >= 0 && umRemaja >= 0) {
    SumA = Math.min(shPanas, rhNormal);
    rule17 = Math.min(SumA, umRemaja);
    jml_rule[16] = rule17;
  }
  if (shPanas >= 0 && rhBasah >= 0 && umRemaja >= 0) {
    SumA = Math.min(shPanas, rhBasah);
    rule18 = Math.min(SumA, umRemaja);
    jml_rule[17] = rule18;
  }

  if (shDingin >= 0 && rhKering >= 0 && umDewasa >= 0) {
    SumA = Math.min(shDingin, rhKering);
    rule19 = Math.min(SumA, umDewasa);
    jml_rule[18] = rule19;
  }
  if (shDingin >= 0 && rhNormal >= 0 && umDewasa >= 0) {
    SumA = Math.min(shDingin, rhNormal);
    rule20 = Math.min(SumA, umDewasa);
    jml_rule[19] = rule20;
  }
  if (shDingin >= 0 && rhBasah >= 0 && umDewasa >= 0) {
    SumA = Math.min(shDingin, rhBasah);
    rule21 = Math.min(SumA, umDewasa);
    jml_rule[20] = rule21;
  }
  if (shNormal >= 0 && rhKering >= 0 && umDewasa >= 0) {
    SumA = Math.min(shNormal, rhKering);
    rule22 = Math.min(SumA, umDewasa);
    jml_rule[21] = rule22;
  }
  if (shNormal >= 0 && rhNormal >= 0 && umDewasa >= 0) {
    SumA = Math.min(shNormal, rhNormal);
    rule23 = Math.min(SumA, umDewasa);
    jml_rule[22] = rule23;
  }
  if (shNormal >= 0 && rhBasah >= 0 && umDewasa >= 0) {
    SumA = Math.min(shNormal, rhBasah);
    rule24 = Math.min(SumA, umDewasa);
    jml_rule[23] = rule24;
  }
  if (shPanas >= 0 && rhKering >= 0 && umDewasa >= 0) {
    SumA = Math.min(shPanas, rhKering);
    rule25 = Math.min(SumA, umDewasa);
    jml_rule[24] = rule25;
  }
  if (shPanas >= 0 && rhNormal >= 0 && umDewasa >= 0) {
    SumA = Math.min(shPanas, rhNormal);
    rule26 = Math.min(SumA, umDewasa);
    jml_rule[25] = rule26;
  }
  if (shPanas >= 0 && rhBasah >= 0 && umDewasa >= 0) {
    SumA = Math.min(shPanas, rhBasah);
    rule27 = Math.min(SumA, umDewasa);
    jml_rule[26] = rule27;
  }

  //defuzifikasi
  var weight =
    rule1 * hidup +
    rule2 * mati +
    rule3 * mati +
    rule4 * hidup +
    rule5 * mati +
    rule6 * mati +
    rule7 * hidup +
    rule8 * mati +
    rule9 * mati +
    rule10 * hidup +
    rule11 * mati +
    rule12 * mati +
    rule13 * hidup +
    rule14 * mati +
    rule15 * mati +
    rule16 * hidup +
    rule17 * hidup +
    rule18 * mati +
    rule19 * hidup +
    rule20 * mati +
    rule21 * mati +
    rule22 * hidup +
    rule23 * hidup +
    rule24 * mati +
    rule25 * hidup +
    rule26 * hidup +
    rule27 * mati;
  var average =
    jml_rule[0] +
    jml_rule[1] +
    jml_rule[2] +
    jml_rule[3] +
    jml_rule[4] +
    jml_rule[5] +
    jml_rule[6] +
    jml_rule[7] +
    jml_rule[8] +
    jml_rule[9] +
    jml_rule[10] +
    jml_rule[11] +
    jml_rule[12] +
    jml_rule[13] +
    jml_rule[14] +
    jml_rule[15] +
    jml_rule[16] +
    jml_rule[17] +
    jml_rule[18] +
    jml_rule[19] +
    jml_rule[20] +
    jml_rule[21] +
    jml_rule[22] +
    jml_rule[23] +
    jml_rule[24] +
    jml_rule[25] +
    jml_rule[26];
  outPompa = weight / average;
}

// test hitungan fuzzy di js = node nama_file.js [enter]
// function hitungFuzzy() {
//   // umur = 25;
//   // suhu = 25;
//   // rh = 50;

//   fuzzy_rule_kipas();
//   fuzzy_rule_pompa();

//   console.log("OutKipas = " + outKipas);
//   console.log("OutPompa = " + outPompa);
//   console.log("ua = " + umAnak);
//   console.log("ur = " + umRemaja);
//   console.log("ud = " + umDewasa);

//   console.log("sd = " + shDingin);
//   console.log("sn = " + shNormal);
//   console.log("sp = " + shPanas);

//   console.log("rk = " + rhKering);
//   console.log("rn = " + rhNormal);
//   console.log("rb = " + rhBasah);
// }

// hitungFuzzy();
// test hitungan fuzzy di js = node nama_file.js [enter]
console.log("suhuu = " + suhuAwal);
console.log("rh = " + rhAwal);
//placeholder hitungan fuzzy dari value mqtt
function hitungFuzzyku() {
  umur = 14; //variable umur mqtt
  suhu = suhuAwal; // variable suhu mqtt
  rh = rhAwal; // variable rh mqtt
  fuzzy_rule_kipas();
  fuzzy_rule_pompa();

  // // lempar hasil hitungan fuzzy ke web
  // document.getElementById("kipas1").innerHTML =
  //   parseFloat(outKipas).toFixed(1); // satu angka dibelakang koma
  // document.getElementById("pompa1").innerHTML =
  //   parseFloat(outPompa).toFixed(1); // satu angka dibelakang koma
}

setInterval (hitungFuzzyku, 500);

//placeholder fungsi publish hasil fuzzy ke mikrokontroller
function publishFuzzy(){
    //KipMessages = document.getElementById("kipas1").value.toString(outKipa);
    kipM = new Paho.MQTT.Message(String( outKipas));
    kipM.destinationName = "iotdashboard.ayam@gmail.com/kipas";
    client.send(kipM);

    // PomMessages = document.getElementById("pompa1").value.toString();
    pomM = new Paho.MQTT.Message(String(outPompa));
    pomM.destinationName = "iotdashboard.ayam@gmail.com/pompa";
    client.send(pomM);
}

setInterval (publishFuzzy, 5000);
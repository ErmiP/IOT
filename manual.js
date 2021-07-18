// const { data } = require("jquery");

(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

var messagePayloadSuhu = 0;
var messagePayloadRh = 0;

var suhu1 = 0;
var suhu2 = 0;

var rh1 = 0;
var rh2 = 0;

var suhuTot = 0;
var rhTot = 0;

var outlampu = "";
var outfan = "";

// Called after form input is processed
function startConnect() {
  // Generate a random client ID
  clientID = "manual1699";

  //  // Local Mosquitto
   host = "localhost";
   port = 9001;
 
   // Cloud Maqiatto
  //  host = "maqiatto.com";
  //  port = 8883;

  // Print output for the user in the messages div
  // document.getElementById("messages").innerHTML += '<span>Connecting to: ' + host + ' on port: ' + port + '</span><br/>';
  // document.getElementById("messages").innerHTML += '<span>Using the following client value: ' + clientID + '</span><br/>';
  // document.getElementById("pesan").innerHTML = '0';

  // Initialize new Paho client connection
  client = new Paho.MQTT.Client(host, Number(port), clientID);

  // Connect the client, if successful, call onConnect function
  client.connect({
    userName: "gametaufik16@gmail.com",
    password: "taufik123",
    onSuccess: onConnect,
  });

  // Set callback handlers
  client.onConnectionLost = onConnectionLost;
  client.onMessageArrived = onMessageArrived;
}

// Called when the client connects
function onConnect() {
  // Fetch the MQTT topic from the form
  SubSuhu = "gametaufik16@gmail.com/suhu";
  SubRh = "gametaufik16@gmail.com/rh";

  SubSuhu2 = "gametaufik16@gmail.com/suhu2";
  SubRh2 = "gametaufik16@gmail.com/rh2";

  lampu = "gametaufik16@gmail.com/lamp";
  fan = "gametaufik16@gmail.com/fan";

  // Print output for the user in the messages div
  // document.getElementById("messages").innerHTML += '<span>Subscribing to: ' + topic + '</span><br/>';
  // document.getElementById("pesan").innerHTML = '0';

  // Subscribe to the requested topic
  client.subscribe(SubSuhu);
  client.subscribe(SubRh);

  client.subscribe(SubSuhu2);
  client.subscribe(SubRh2);

  client.subscribe(lampu);
  client.subscribe(fan);
}

// Called when the client loses its connection
function onConnectionLost(responseObject) {
  console.log("onConnectionLost: Connection Lost");
  if (responseObject.errorCode !== 0) {
    console.log("onConnectionLost: " + responseObject.errorMessage);
  }
}

// Called when a message arrives
function onMessageArrived(message) {
  //   if (message.destinationName == SubSuhu) {
  //     // document.getElementById("suhu").innerHTML = message.payloadString;
  //     console.log("Suhu: " + message.payloadString);
  //     suhu1 = parseInt(message.payloadString);
  //     // document.getElementById("suhu1").innerHTML = suhu1;
  //   }
  //   if (message.destinationName == SubRh) {
  //     // document.getElementById("rh").innerHTML = message.payloadString;
  //     console.log("Kelembaban: " + message.payloadString);
  //     rh1 = parseInt(message.payloadString);
  //     // document.getElementById("rh1").innerHTML = rh1;
  //   }
  //   if (message.destinationName == SubSuhu2) {
  //     // document.getElementById("suhu").innerHTML = message.payloadString;
  //     console.log("Suhu2: " + message.payloadString);
  //     suhu2 = parseInt(message.payloadString);
  //     // document.getElementById("suhu2").innerHTML = suhu2;
  //   }
  //   if (message.destinationName == SubRh2) {
  //     // document.getElementById("rh").innerHTML = message.payloadString;
  //     console.log("Kelembaban2: " + message.payloadString);
  //     rh2 = parseInt(message.payloadString);
  //     // document.getElementById("rh2").innerHTML = rh2;
  //   }
    if (message.destinationName == lampu) {
      // document.getElementById("rh").innerHTML = message.payloadString;
      console.log("Lampu: " + message.payloadString);
      // rh2 = parseInt(message.payloadString);
      outlampu = parseInt(message.payloadString);
    }
    if (message.destinationName == fan) {
      // document.getElementById("rh").innerHTML = message.payloadString;
      console.log("Fan: " + message.payloadString);
      outfan = message.payloadString;
    }
  //   // Publish suhu & rh
  //   suhuTot = (suhu1 + suhu2) / 2;
  //   rhTot = (rh1 + rh2) / 2;
  // console.log("onMessageArrived: " + message.payloadString);
  // document.getElementById("messages").innerHTML += '<span>Topic: ' + message.destinationName + '</span><br/>';
  // document.getElementById("pesan").innerHTML = message.payloadString;
  // updateScroll(); // Scroll to bottom of window
}

function pubValue() {
  document.getElementById("suhuTot").value;
  suhuMessage = new Paho.MQTT.Message(suhuTot.toString());
  suhuMessage.destinationName = "gametaufik16@gmail.com/suhuTot";
  client.send(suhuMessage);

  rhMessage = new Paho.MQTT.Message(rhTot.toString());
  rhMessage.destinationName = "gametaufik16@gmail.com/rhTot";
  client.send(rhMessage);

  document.getElementById("suhu").innerHTML = suhuTot;
  document.getElementById("rh").innerHTML = rhTot;

  document.getElementById("lampu").innerHTML = outlampu + "%";
  document.getElementById("fan").innerHTML = outfan;
}

// setInterval(pubValue, 4000);

function stateOn() {
  stateMessage = new Paho.MQTT.Message("1");
  stateMessage.destinationName = "gametaufik16@gmail.com/control";
  client.send(stateMessage);
}

function stateOff() {
  stateMessage = new Paho.MQTT.Message("0");
  stateMessage.destinationName = "gametaufik16@gmail.com/control";
  client.send(stateMessage);
}

function startPublish() {
  suhuMessage = new Paho.MQTT.Message(
    document.getElementById("suhuTot").value.toString()
  );
  suhuMessage.destinationName = "gametaufik16@gmail.com/suhuTot";
  client.send(suhuMessage);

  rhMessage = new Paho.MQTT.Message(
    document.getElementById("rhTot").value.toString()
  );
  rhMessage.destinationName = "gametaufik16@gmail.com/rhTot";
  client.send(rhMessage);

  lampMessage = new Paho.MQTT.Message(
    document.getElementById("lamp").value.toString()
  );
  lampMessage.destinationName = "gametaufik16@gmail.com/lamp";
  client.send(lampMessage);

  kipas = document.getElementById("fan").value;
  if (kipas == 1) {
    fanMessage = new Paho.MQTT.Message("1");
    fanMessage.destinationName = "gametaufik16@gmail.com/fan";
    client.send(fanMessage);
  } else {
    fanMessage = new Paho.MQTT.Message("0");
    fanMessage.destinationName = "gametaufik16@gmail.com/fan";
    client.send(fanMessage);
  }
}

// Called when the disconnection button is pressed
function startDisconnect() {
  client.disconnect();
  // document.getElementById("messages").innerHTML += '<span>Disconnected</span><br/>';
  updateScroll(); // Scroll to bottom of window
}

// Updates #messages div to auto-scroll
function updateScroll() {
  // var element = document.getElementById("messages");
  element.scrollTop = element.scrollHeight;
}

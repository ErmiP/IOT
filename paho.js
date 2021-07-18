var messagePayloadSuhu = 0; 
var messagePayloadKelembaban = 0;

var umurAwal = 0;
var suhuAwal = 0;
var rhAwal = 0;

var outKipasA = 0;
var outPompaA = 0;

function startConnect() {
    // Generate a random client ID
    clientID = "qwert120039";

    // Initialize new Paho client connection
    host = "maqiatto.com";
    port = "8883";

    client = new Paho.MQTT.Client(host, Number(port), clientID);
    //client1 = new Paho.MQTT.Client(host, Number(port), clientID);

    // Connect the client, if successful, call onConnect function
    client.connect({
        userName : "iotdashboard.ayam@gmail.com", //maqiatto username 
        password : "iotayam", //maqiatto password
        onSuccess: onConnect,
    });

    // Set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;
}

// Subscribe topic
function onConnect() {
    
    // Subscribe ke topic
    client.subscribe("iotdashboard.ayam@gmail.com/suhu");
    client.subscribe("iotdashboard.ayam@gmail.com/kelembaban");
    client.subscribe("iotdashboard.ayam@gmail.com/kipas");
    client.subscribe("iotdashboard.ayam@gmail.com/pompa");
    client.subscribe("iotdashboard.ayam@gmail.com/umur");

} 

function startPublish(){
    PubMessages = document.getElementById("pubm").value.toString();
    pubM = new Paho.MQTT.Message(PubMessages);
    pubM.destinationName = "iotdashboard.ayam@gmail.com/umur";
    client.send(pubM);

    stateMessage = new Paho.MQTT.Message("true");
    stateMessage.destinationName = "iotdashboard.ayam@gmail.com/otomatis";
    client.send(stateMessage);

    alert('Sistem Otomatis Mulai');
}

function stateOff1() {
    onMessage = new Paho.MQTT.Message("false");
    onMessage.destinationName = "iotdashboard.ayam@gmail.com/otomatis";
    client.send(onMessage);
    console.log("false");

    alert('Sistem Otomatis Selesai');
}

function startPublishKontrol() {
    KipMessages = document.getElementById("kipasKontrol").value.toString();
    kipM = new Paho.MQTT.Message(KipMessages);
    kipM.destinationName = "iotdashboard.ayam@gmail.com/kipasM";
    console.log(KipMessages);
    client.send(kipM);

    PopMessages = document.getElementById("pompaKontrol").value.toString();
    popM = new Paho.MQTT.Message(PopMessages);
    popM.destinationName = "iotdashboard.ayam@gmail.com/pompaM";
    console.log(PopMessages);
    client.send(popM);

    window.location.href = "../module/index.php?module=manualKontrol";
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
    console.log("onMessageArrived: " + message.payloadString);
    console.log("suhuu = " +suhuAwal);
    console.log("rh = " + rhAwal);
    // // document.getElementById("messages").innerHTML += '<span>Topic: ' + message.destinationName + '</span><br/>';
    // document.getElementById("messages").innerHTML += '<span>Topic: ' + message.destinationName + '  | ' + message.payloadString + '</span><br/>';
    
    if(message.destinationName  == "iotdashboard.ayam@gmail.com/suhu"){
        document.getElementById("suhu1").innerHTML = message.payloadString;
        suhuAwal = parseInt(message.payloadString);
    }
    if(message.destinationName  == "iotdashboard.ayam@gmail.com/kelembaban"){
        document.getElementById("kelembaban1").innerHTML = message.payloadString;
        rhAwal = parseInt(message.payloadString);
    }
    if(message.destinationName  == "iotdashboard.ayam@gmail.com/kipas"){
        if(outKipasA > 50){
           'Hidup';
        }
        else{
           'Mati;'
        }
        document.getElementById("kipas1").innerHTML = message.payloadString;
        outKipasA = parseInt(message.payloadString);
        
    }
    if(message.destinationName  == "iotdashboard.ayam@gmail.com/pompa"){
        document.getElementById("pompa1").innerHTML = message.payloadString;
        outPompaA = parseInt(message.payloadString);
    }
    if(message.destinationName  == "iotdashboard.ayam@gmail.com/umur"){
        document.getElementById("umur1").innerHTML = message.payloadString;
        umurAwal = parseInt(message.payloadString);
    }
    console.log(messagePayloadSuhu);
    updateScroll(); // Scroll to bottom of window
}

// Called when the disconnection button is pressed
function startDisconnect() {
    client.disconnect();
    // document.getElementById("messages").innerHTML += '<span>Disconnected</span><br/>';
    // document.getElementById("messages1").innerHTML += '<span>Disconnected</span><br/>';
    updateScroll(); // Scroll to bottom of window
}

// Updates #messages div to auto-scroll
function updateScroll() {
        var suhu = document.getElementById("messages");
        suhu.scrollTop = suhu.scrollHeight;
        var kelembaban = document.getElementById("messages1");
        kelembaban.scrollTop = kelembaban.scrollHeight;
        var kipas = document.getElementById("messages2");
        kipas.scrollTop = kipas.scrollHeight;
        var pompa = document.getElementById("messages3");
        pompa.scrollTop = pompa.scrollHeight;
}

startConnect();

// Area Chart Example
var chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};

function randomScalingFactorSuhu() {
	return (suhuAwal);
}

function randomScalingFactorKelembaban() {
	return (rhAwal);
}

var color = Chart.helpers.color;
var myLineChartCoba = {
	type: 'line',
	data: {
		datasets: [{
			label: 'SUHU',
			backgroundColor: color(chartColors.red).alpha(0.5).rgbString(),
			borderColor: chartColors.red,
			fill: false,
			lineTension: 0,
			borderDash: [8, 4],
			data: []
		}, {
			label: 'KELEMBABAN',
			backgroundColor: color(chartColors.blue).alpha(0.5).rgbString(),
			borderColor: chartColors.blue,
			fill: false,
			cubicInterpolationMode: 'monotone',
			data: []
		}], 
	},
	options: {
		title: {
			display: true,
			text: 'Line chart (hotizontal scroll) sample'
		},
		scales: {
			x: {
                type: 'realtime',
                realtime: {
                    delay: 2000,
                    onRefresh: chart => {
                        chart.data.datasets[0].data.push({
                            x: Date.now(),
                            y: randomScalingFactorSuhu()
                        });
                        chart.data.datasets[1].data.push({
                            x: Date.now(),
                            y: randomScalingFactorKelembaban()
                        });
                    }
                }
            },
            y: {
                beginAtZero: true
            }
		},
		tooltips: {
			mode: 'nearest',
			intersect: false
		},
		hover: {
			mode: 'nearest',
			intersect: false
		}
	}
};
  
  window.onload = function() {
      var ctx = document.getElementById('myChart').getContext('2d');
      window.myChart = new Chart(ctx, myLineChartCoba);
  };



  
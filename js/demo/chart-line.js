// setup block
var data = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: 'ssss',
        data: [],
        backgroundColor: 'rgba(153, 102, 255, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderDash: [2, 3], //garistiitk"
        cubicInterpolationMode: 'monotone', //garis melengkung
        borderWidth: 1
    }]
};

// config block
var myCrt = document.getElementById('myChart');
var myLineChartCoba = new Chart(myCrt, {
    type: 'line',
    data,
    options: {
        scales: {
            x: {
                type: 'realtime',
                realtime: {
                    delay: 2000,
                    onRefresh: chart => {
                        chart.data.datasets.forEach(datasets => {
                            datasets.data.push({
                                x: Date.now(),
                                y: Math.random() * 5
                            });
                        });
                    }
                }
            },
            y: {
                beginAtZero: true
            }
        }
    }
});

// render init block
// var myChart = new Chart(
//     document.getElementById('myChart'),
//     config
// );
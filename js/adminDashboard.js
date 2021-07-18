// var date = new Date()
// var year = date.getFullYear()

// // materiSafety per bulan
// $.ajax({
//     url: "../process/admin_dataUploadMateriSafety.php",
//     method: "GET",
//     success: function (data) {
//         var jumlah = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
//         var label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]

//         for (var i in data) {
//             jumlah.splice(data[i].bulan - 1, 1, data[i].jumlah)
//         }

//         var chartdata = {
//             labels: label,
//             datasets: [
//                 {
//                     label: 'Materi Safety',
//                     backgroundColor: '#e74a3b',
//                     data: jumlah
//                 }
//             ]
//         };

//         var ctx2 = $("#materiSafety")

//         var materiSafety = new Chart(ctx2, {
//             type: 'bar',
//             data: chartdata,
//             options: {
//                 scales: {
//                     yAxes: [{
//                         ticks: {
//                             beginAtZero: true
//                         }
//                     }],
//                     xAxes: [{
//                         barThickness: 40
//                     }]
//                 },
//                 legend: {
//                     display: false
//                 }
//             }
//         });
//     },
//     error: function (data) {
//         console.log(data);
//     }
// })

// // materiQuality per bulan
// $.ajax({
//     url: "../process/admin_dataUploadMateriQuality.php",
//     method: "GET",
//     success: function (data) {
//         var jumlah = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
//         var label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]

//         for (var i in data) {
//             jumlah.splice(data[i].bulan - 1, 1, data[i].jumlah)
//         }

//         var chartdata = {
//             labels: label,
//             datasets: [
//                 {
//                     label: 'Materi Quality',
//                     backgroundColor: '#f6c23e',
//                     data: jumlah
//                 }
//             ]
//         };

//         var ctx2 = $("#materiQuality")

//         var materiQuality = new Chart(ctx2, {
//             type: 'bar',
//             data: chartdata,
//             options: {
//                 scales: {
//                     yAxes: [{
//                         ticks: {
//                             beginAtZero: true
//                         }
//                     }],
//                     xAxes: [{
//                         barThickness: 40
//                     }]
//                 },
//                 legend: {
//                     display: false
//                 }
//             }
//         });
//     },
//     error: function (data) {
//         console.log(data);
//     }
// })

// // materiQuality per bulan
// $.ajax({
//     url: "../process/admin_dataUploadMateriGeneralHrd.php",
//     method: "GET",
//     success: function (data) {
//         var jumlah = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
//         var label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]

//         for (var i in data) {
//             jumlah.splice(data[i].bulan - 1, 1, data[i].jumlah)
//         }

//         var chartdata = {
//             labels: label,
//             datasets: [
//                 {
//                     label: 'Materi General Hrd',
//                     backgroundColor: '#1cc88a',
//                     data: jumlah
//                 }
//             ]
//         };

//         var ctx2 = $("#materiGeneralHrd")

//         var materiGeneralHrd = new Chart(ctx2, {
//             type: 'bar',
//             data: chartdata,
//             options: {
//                 scales: {
//                     yAxes: [{
//                         ticks: {
//                             beginAtZero: true
//                         }
//                     }],
//                     xAxes: [{
//                         barThickness: 40
//                     }]
//                 },
//                 legend: {
//                     display: false
//                 }
//             }
//         });
//     },
//     error: function (data) {
//         console.log(data);
//     }
// })

// // materiTechnical per bulan
// $.ajax({
//     url: "../process/admin_dataUploadMateriTechnical.php",
//     method: "GET",
//     success: function (data) {
//         var jumlah = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
//         var label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]

//         for (var i in data) {
//             jumlah.splice(data[i].bulan - 1, 1, data[i].jumlah)
//         }

//         var chartdata = {
//             labels: label,
//             datasets: [
//                 {
//                     label: 'Materi Technical',
//                     backgroundColor: '#4e73df',
//                     data: jumlah
//                 }
//             ]
//         };

//         var ctx2 = $("#materiTechnical")

//         var materiTechnical = new Chart(ctx2, {
//             type: 'bar',
//             data: chartdata,
//             options: {
//                 scales: {
//                     yAxes: [{
//                         ticks: {
//                             beginAtZero: true
//                         }
//                     }],
//                     xAxes: [{
//                         barThickness: 40
//                     }]
//                 },
//                 legend: {
//                     display: false
//                 }
//             }
//         });
//     },
//     error: function (data) {
//         console.log(data);
//     }
// })
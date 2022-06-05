// (function($) {
//   'use strict';
//   $(function() {

//     if ($("#sales-chart").length) {
//       var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
//       var SalesChart = new Chart(SalesChartCanvas, {
//         type: 'bar',
//         data: {
//           labels: ["tes", "Feb", "Mar", "Apr", "May"],
//           datasets: [{
//               label: 'Offline Sales',
//               data: [480, 230, 470, 210, 330],
//               backgroundColor: '#8EB0FF'
//             },
//             {
//               label: 'Online Sales',
//               data: [400, 340, 550, 480, 170],
//               backgroundColor: '#316FFF'
//             }
//           ]
//         },
//         options: {
//           responsive: true,
//           maintainAspectRatio: true,
//           layout: {
//             padding: {
//               left: 0,
//               right: 0,
//               top: 20,
//               bottom: 0
//             }
//           },
//           scales: {
//             yAxes: [{
//               display: true,
//               gridLines: {
//                 display: false,
//                 drawBorder: false
//               },
//               ticks: {
//                 display: false,
//                 min: 0,
//                 max: 500
//               }
//             }],
//             xAxes: [{
//               stacked: false,
//               ticks: {
//                 beginAtZero: true,
//                 fontColor: "#9fa0a2"
//               },
//               gridLines: {
//                 color: "rgba(0, 0, 0, 0)",
//                 display: false
//               },
//               barPercentage: 1
//             }]
//           },
//           legend: {
//             display: false
//           },
//           elements: {
//             point: {
//               radius: 0
//             }
//           }
//         },
//       });
//       document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
//     }

//   });
// })(jQuery);
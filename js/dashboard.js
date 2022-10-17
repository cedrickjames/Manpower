

const labels = [
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'November',
    'December',
    'January',
    'February',
    'March',


  ];
  
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
      pointBackgroundColor: 'white',
      pointBorderColor: 'white',
      pointBorderWidth: 5,
      lineTension: 0,
      borderWidth: 4,
      pointBackgroundColor: '#007bff'
    },
    {
        label: 'My Second dataset',
        backgroundColor: 'rgb(255, 251, 6)',
        borderColor: 'rgb(255, 251, 6)',
        data: [40,0,30,23,5,10,30],
        pointBackgroundColor: 'white',
        pointBorderColor: 'white',
        pointBorderWidth: 5,
        lineTension: 0,
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      },
      {
        label: 'My Third dataset',
        backgroundColor: 'rgb(6, 255, 39)',
        borderColor: 'rgb(6, 255, 39)',
        data: [10 ,45 ,40, 15, 0, 19, 0],
        pointBackgroundColor: 'white',
        pointBorderColor: 'white',
        pointBorderWidth: 5,
        lineTension: 0,
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }
    ],
   
    
  };
  
//   const config = {
//     type: 'line',
//     data: data,
//     options: {
//         plugins: {  // 'legend' now within object 'plugins {}'
//             legend: {
//               labels: {
//                 color: "white",  // not 'fontColor:' anymore
//                 // fontSize: 18  // not 'fontSize:' anymore
//                 font: {
//                   size: 18 // 'size' now within object 'font {}'
//                 }
//               }
//             }
//           },
//         scales:{
//             y:{
//                 ticks:{
//                     color: 'rgb(255, 99, 132)',
//                 },
//                 grid:{
//                     color: 'rgb(197, 195, 212)',
//                 }
//             },
//             x:{
//                 ticks:{
//                     color: 'rgb(255, 99, 132)',
//                 },
//                 grid:{
//                     color: 'rgb(197, 195, 212)',
//                 }
//             },
        
          
//         },
       
       
//     }
//   };
  
//   const myChart = new Chart(
//     document.getElementById('myChart'),
//     config
//   );


      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
          scales: {
                        y:{
                ticks:{
                    color: 'rgb(255, 99, 132)',
                },
                grid:{
                    color: 'rgb(197, 195, 212)',
                }
            },
            x:{
                ticks:{
                    color: 'rgb(255, 99, 132)',
                },
                grid:{
                    color: 'rgb(197, 195, 212)',
                }
            },
        
            yAxes: [{
              ticks: {
                beginAtZero: false
              },
              grid:{
                color: 'rgb(197, 195, 212)',
                  },
            }]
          },
          legend: {
            display: false,
          }
        }
      });

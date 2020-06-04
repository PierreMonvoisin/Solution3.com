$(function(){
  var ctx = document.getElementById('statsChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: ['#1', '#2', '#3', '#4', '#5', '#6', '#7', '#8', '#9', '#10', '#11', '#12'],
      datasets: [{
        label: 'Average of 5',
        backgroundColor: 'blue',
        borderColor: 'blue',
        data: [0, 10, 5, 2, 15, 10, 5, 9, 1, 7, 6, 3],
        fill: false
      }]
    },

    // Configuration options go here
    options: {
      animation: {
        duration: 1500
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      tooltips: {
        mode: 'index',
        intersect: false
      },
      scales: {
        gridLines: [{
          color: 'black'
        }],
        xAxes: [{
          display: false
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            fontSize: 25,
            fontColor: 'black',
            display: true,
            labelString: 'Value'
          }
        }]
      },
      elements: {
        line: {
          tension: 0 // disables bezier curves
        }
      },
      legend: {
        labels: {
          fontColor: 'black'
        }
      }
    }
  });
});

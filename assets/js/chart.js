window.onload = function () {
  var chart = new CanvasJS.Chart('chartContainer', {
    theme: 'light2',
    animationEnabled: true,
    animationDuration: 1250,
    title: {
      text: 'Graphique de résolutions',
      fontWeight: 'normal'
    },
    axisX: {
      lineColor: 'black',
      lineThickness: 0.75,
      labelFontColor: 'grey',
      labelFontSize: 13
    },
    axisY: {
      includeZero: false,
      lineColor: 'black',
      gridThickness: 0.5,
      gridColor: 'black',
      labelFontColor: 'black',
      labelFontSize: 13
    },
    data: [{
      name: 'résolutions',
      type: 'line',
      color: 'grey',
      xValueFormatString:'N° ########',
      showInLegend: true,
      markerType: 'none',
      dataPoints: [
        {y: 16.05},
        {y: 17.11},
        {y: 15.54},
        {y: 16.44},
        {y: 14.41},
        {y: 20.04},
        {y: 16.63},
        {y: 17.08},
        {y: 19.11},
        {y: 16.66},
        {y: 20.74}
      ]
    },
    {
      name: 'moyennes de 5',
      type: 'line',
      color: 'blue',
      xValueFormatString:'N° ########',
      showInLegend: true,
      markerType: 'none',
      dataPoints: [
        {y: 16.01},
        {y: 16.36},
        {y: 16.20},
        {y: 16.72},
        {y: 17.61},
        {y: 17.62},
        {y: 17.62},
        {y: 18.98},
        {y: 18.88},
        {y: 18.27},
        {y: 18.27}
      ]
    },
    {
      name: 'moyennes de 12',
      type: 'line',
      color: 'red',
      xValueFormatString:'N° ########',
      showInLegend: true,
      markerType: 'none',
      dataPoints: [
        {y: 17.54},
        {y: 17.61},
        {y: 17.63},
        {y: 17.54},
        {y: 17.38},
        {y: 17.53},
        {y: 17.20},
        {y: 16.99},
        {y: 16.69},
        {y: 16.48},
        {y: 16.42}
      ]
    }]
  });
  // Render chart
  chart.render();
}

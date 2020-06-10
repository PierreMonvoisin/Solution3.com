  var chart = new CanvasJS.Chart('chartContainer', {
    interactivityEnabled: false,
    theme: 'light2',
    animationEnabled: true,
    animationDuration: 1250,
    legend: {
      fontSize: 13,
      verticalAlign: 'top'
    },
    exportFileName: "Graphique des résolutions et moyennes",
		exportEnabled: true,
    axisX: {
      lineThickness: 0,
      labelFontSize: 0
    },
    axisY: {
      includeZero: false,
      lineColor: 'black',
      gridThickness: 0.5,
      gridColor: 'black',
      labelFontColor: 'black',
      labelFontSize: 13,
      labelFormatter: function(e){
        var timeFormatted = millisecondsToFullTime(e.value);
        timeFormatted = (timeFormatted.split('.'))[0];
        return timeFormatted;
      }
    },
    data: [{
      name: 'résolutions',
      type: 'line',
      color: 'grey',
      xValueFormatString:'N° ########',
      showInLegend: true,
      markerType: 'none',
      dataPoints: [
        {y: 16524},
        {y: 16093},
        {y: 15056},
        {y: 15062},
        {y: 19897},
        {y: 25205},
        {y: 19019},
        {y: 17192},
        {y: 20119},
        {y: 17400},
        {y: 20042},
        {y: 15306}
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
        {y: 15893},
        {y: 17017},
        {y: 17993},
        {y: 18703},
        {y: 19678},
        {y: 18846},
        {y: 18820},
        {y: 18211},
        {y: 17583},
        {y: 16282},
        {y: 16031},
        {y: 16009}
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
        {y: 16059},
        {y: 15927},
        {y: 15231},
        {y: 16076},
        {y: 16213},
        {y: 16213},
        {y: 16067},
        {y: 16307},
        {y: 16056},
        {y: 15697},
        {y: 15634},
        {y: 15582}
      ]
    }]
  });
  // Render chart
  chart.render();

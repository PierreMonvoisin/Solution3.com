var dataSingle = [];
var dataAo5 = [];
var dataAo12 = [];
// If the local storage is available
if (typeof(Storage) != "undefined") {
  // If there is at least one solve in the local storage
  if (localStorage.getItem('index')){
    var numberOfSolve = Number(localStorage.getItem('index'));
    // As long as the solve found is null, get the previous solve
    while (localStorage.getItem('index_' + numberOfSolve) == null  && numberOfSolve > 0){
      numberOfSolve--;
    }
    if (numberOfSolve > 0){
      // For each solve
      for (numberOfSolve; numberOfSolve >= 1; numberOfSolve--){
        // Get all solves and averages value
        var singleTime = Number(localStorage.getItem(`time_${numberOfSolve}`));
        var ao5Time = Number(localStorage.getItem(`ao5_${numberOfSolve}`));
        var ao12Time = Number(localStorage.getItem(`ao12_${numberOfSolve}`));
        if ( isNaN(singleTime) || singleTime == 0){ singleTime = null; }
        if ( isNaN(ao5Time) || ao5Time == 0){ ao5Time = null; }
        if ( isNaN(ao12Time) || ao12Time == 0){ ao12Time = null; }
        // Format values
        singleTime = {y: singleTime};
        ao5Time = {y: ao5Time};
        ao12Time = {y: ao12Time};
        // Put all values in array for the chart
        dataSingle.push(singleTime);
        dataAo5.push(ao5Time);
        dataAo12.push(ao12Time);
      }
    }
  }
} else {
  console.warn('Impossible d\'afficher les résolutions depuis le stockage local du navigateur !');
}
// Create the chart
var chart = new CanvasJS.Chart('chartContainer', {
  interactivityEnabled: false,
  theme: 'light2',
  animationEnabled: true,
  animationDuration: 1250,
  legend: {
    fontSize: 13,
    verticalAlign: 'top'
  },
  exportFileName: 'Graphique des résolutions et moyennes',
  exportEnabled: true,
  axisX: {
    reversed:  true,
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
      return timeFormatted.replace(/\s+/g, ' ').trim();
    }
  },
  data: [{
    name: 'Résolutions',
    type: 'line',
    color: 'grey',
    xValueFormatString:'N° ########',
    showInLegend: true,
    markerType: 'none',
    dataPoints: dataSingle
  },
  {
    name: 'Moyennes de 5',
    type: 'line',
    color: 'blue',
    xValueFormatString:'N° ########',
    showInLegend: true,
    markerType: 'none',
    dataPoints: dataAo5
  },
  {
    name: 'Moyennes de 12',
    type: 'line',
    color: 'red',
    xValueFormatString:'N° ########',
    showInLegend: true,
    markerType: 'none',
    dataPoints: dataAo12
  }]
});
// Render chart
chart.render();

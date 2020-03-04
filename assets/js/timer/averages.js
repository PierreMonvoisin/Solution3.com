var solves5, solves12, solves50;
solves5 = solves12 = solves50 = [];
var ao5, ao12, ao50;
// Calculation of the average of 5 solves
function averageOf5(time){
  ao5 = 0;
  // Add time to the average array
  solves5.splice(0, 0, time);
  console.warn(solves5);
  // Check the length of the array solves5
  if (solves5.length < 5){
    // If there is less than 5 solves
    return '-';
  } else {
    // Get the highest and lowest time ( and their index ) not to calculate them in the average
    var maxValue = Math.max(...solves5);
    // ' ... ' in front of an array will convert array values to distinct variables
    var indexMaxValue = solves5.indexOf(Math.max(...solves5));
    // Delete best time
    solves5.splice(indexMaxValue, 1);
    var minValue = Math.min(...solves5);
    var indexMinValue = solves5.indexOf(Math.min(...solves5));
    solves5.splice(indexMinValue, 1);
    // Add all values together
    for (var i = 0; i < solves5.length; i++){
      ao5 += solves5[i];
    }
    ao5 = Math.round(ao5 / 3);
    solves5.splice(indexMinValue, 0, minValue);
    solves5.splice(indexMaxValue, 0, maxValue);
    // Delete 5th solve waiting for the next one
    solves5.splice(solves5.length - 1, 1);
  }
  return ao5;
};
// Calculation of the average of 12 solves
function averageOf12(time){
  ao12 = 0;
  // Add time to the average array
  solves12.splice(0, 0, time);
  // Check the length of the array solves12
  if (solves12.length < 12){
    // If there is less than 12 solves
    return '-';
  } else {
    // Get the highest and lowest time ( and their index ) not to calculate them in the average
    var maxValue = Math.max(...solves12);
    // ' ... ' in front of an array will convert array values to distinct variables
    var indexMaxValue = solves12.indexOf(Math.max(...solves12));
    // Delete best time
    solves12.splice(indexMaxValue, 1);
    var minValue = Math.min(...solves12);
    var indexMinValue = solves12.indexOf(Math.min(...solves12));
    solves12.splice(indexMinValue, 1);
    // Add all values together
    for (var i = 0; i < solves12.length; i++){
      ao12 += solves12[i];
    }
    ao12 = Math.round(ao12 / 11);
    solves12.splice(indexMinValue, 0, minValue);
    solves12.splice(indexMaxValue, 0, maxValue);
    // Delete 12th solve waiting for the next one
    solves12.splice(solves12.length - 1, 1);
  }
  return ao12;
};
// Calculation of the average of 50 solves
function averageOf50(time){
  ao50 = 0;
  // Add time to the average array
  solves50.splice(0, 0, time);
  // Check the length of the array solves50
  if (solves50.length < 50){
    // If there is less than 50 solves
    return '-';
  } else {
    // Get the highest and lowest time ( and their index ) not to calculate them in the average
    var maxValue = Math.max(...solves50);
    // ' ... ' in front of an array will convert array values to distinct variables
    var indexMaxValue = solves50.indexOf(Math.max(...solves50));
    // Delete best time
    solves50.splice(indexMaxValue, 1);
    var minValue = Math.min(...solves50);
    var indexMinValue = solves50.indexOf(Math.min(...solves50));
    solves50.splice(indexMinValue, 1);
    // Add all values together
    for (var i = 0; i < solves50.length; i++){
      ao50 += solves50[i];
    }
    ao50 = Math.round(ao50 / 48);
    solves50.splice(indexMinValue, 0, minValue);
    solves50.splice(indexMaxValue, 0, maxValue);
    // Delete 50th solve waiting for the next one
    solves50.splice(solves50.length - 1, 1);
  }
  return ao50;
};

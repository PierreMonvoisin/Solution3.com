var solves5, solves12, solves50;
solves5 = solves12 = solves50 = [];
var ao5, ao12, ao50;
ao5 = ao12 = ao50 = '-';
var temporaryArray = [];
// Calculation of the average of 5 solves
function averageOf5(time){
  // Add time to the average array
  solves5.splice(0, 0, time);
  // Check the length of the array solves5
  if (solves5.length < 5){
    // If there is less than 5 solves
    return '-';
  } else {
    // Get the highest and lowest time ( and their index ) not to calculate them in the average
    var maxValue = Math.max(...solves5);
    // ' ... ' in front of an array will convert array values to distinct variables
    var indexMaxValue = solves5.indexOf(Math.max(...solves5));
    var minValue = Math.min(...solves5);
    var indexMinValue = solves5.indexOf(Math.min(...solves5));
    // Change variables not to touch the original array
    temporaryArray = solves5;
    // Delete both best and worst time
    temporaryArray.splice(indexMaxValue, 1);
    temporaryArray.splice(indexMinValue, 1);
    // Add all values together
    for (var i = 0; i < temporaryArray.length; i++){
      ao5 += temporaryArray[i];
    }
    ao5 = ao5 / temporaryArray.length;
  }
  // Delete 5th solve waiting for the next one
  solves5.splice(solves5.length - 1, 1);
  return ao5;
}

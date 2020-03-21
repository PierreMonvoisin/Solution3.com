var solves5 = [];
// Calculation of the average of 5 solves
function averageOf5(time){
  var ao5 = 0;
  // Add time to the average array
  solves5.splice(0, 0, time);
  // Check the length of the array solves5
  if (solves5.length < 5){
    // If there is less than 5 solves
    ao5 = '-';
  } else {
    // Get the highest and lowest time ( and their index ) not to calculate them in the average
    var maxValue = Math.max(...solves5);
    // ' ... ' in front of an array will convert array values to distinct variables
    var indexMaxValue = solves5.indexOf(Math.max(...solves5));
    // Delete best time
    solves5.splice(indexMaxValue, 1);
    var minValue = Math.min(...solves5);
    var indexMinValue = solves5.indexOf(Math.min(...solves5));
    if (solves5.includes('DNF')){
      var dnfNumber = 0;
      for (var i = 0; i < solves5.length; i++){
        if (solves5[i] == 'DNF'){
          dnfNumber++;
        }
      }
      if (dnfNumber == 1){
        minValue = 'DNF';
        indexMinValue = solves5.indexOf('DNF');
      } else if (dnfNumber > 1){
        return 'DNF';
      }
    }
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
}
var solves12 = [];
// Calculation of the average of 12 solves
function averageOf12(time){
  var ao12 = 0;
  // Add time to the average array
  solves12.splice(0, 0, time);
  // Check the length of the array solves12
  if (solves12.length < 12){
    // If there is less than 12 solves
    ao12 = '-';
  } else {
    // Get the highest and lowest time ( and their index ) not to calculate them in the average
    var maxValue = Math.max(...solves12);
    // ' ... ' in front of an array will convert array values to distinct variables
    var indexMaxValue = solves12.indexOf(Math.max(...solves12));
    // Delete best time
    solves12.splice(indexMaxValue, 1);
    var minValue = Math.min(...solves12);
    var indexMinValue = solves12.indexOf(Math.min(...solves12));
    if (solves12.includes('DNF')){
      var dnfNumber = 0;
      for (var i = 0; i < solves12.length; i++){
        if (solves12[i] == 'DNF'){
          dnfNumber++;
        }
      }
      if (dnfNumber == 1){
        minValue = 'DNF';
        indexMinValue = solves12.indexOf('DNF');
      } else if (dnfNumber > 1){
        return 'DNF';
      }
    }
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
}
var solves50 = [];
// Calculation of the average of 50 solves
function averageOf50(time){
  var ao50 = 0;
  // Add time to the average array
  solves50.splice(0, 0, time);
  // Check the length of the array solves50
  if (solves50.length < 50){
    // If there is less than 50 solves
    ao50 = '-';
  } else {
    // Get the highest and lowest time ( and their index ) not to calculate them in the average
    var maxValue = Math.max(...solves50);
    // ' ... ' in front of an array will convert array values to distinct variables
    var indexMaxValue = solves50.indexOf(Math.max(...solves50));
    // Delete best time
    solves50.splice(indexMaxValue, 1);
    var minValue = Math.min(...solves50);
    var indexMinValue = solves50.indexOf(Math.min(...solves50));
    if (solves50.includes('DNF')){
      var dnfNumber = 0;
      for (var i = 0; i < solves50.length; i++){
        if (solves50[i] == 'DNF'){
          dnfNumber++;
        }
      }
      if (dnfNumber == 1){
        minValue = 'DNF';
        indexMinValue = solves50.indexOf('DNF');
      } else if (dnfNumber > 1){
        return 'DNF';
      }
    }
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
}
function dnfTimeInAverages(time){
  var timeToDnf = formattedTimeToMilliseconds(time);
  var indexToDnf = -1;
  if (solves50.length > 0){
    indexToDnf = solves50.indexOf(timeToDnf);
    solves50[indexToDnf] = 'DNF';
    indexToDnf = -1
  }
  if (solves12.length > 0){
    indexToDnf = solves12.indexOf(timeToDnf);
    solves12[indexToDnf] = 'DNF';
    indexToDnf = -1
  }
  if (solves5.length > 0){
    indexToDnf = solves5.indexOf(timeToDnf);
    solves5[indexToDnf] = 'DNF';
    indexToDnf = -1
  }
}
function addTwoSecondsInAverages(time){
  var timeToUpdate = formattedTimeToMilliseconds(time);
  var indexToUpdate = -1;
  if (solves50.length > 0){
    indexToUpdate = solves50.indexOf(timeToUpdate);
    solves50[indexToUpdate] = Number(solves50[indexToUpdate]) + 2000;
    indexToUpdate = -1
  }
  if (solves12.length > 0){
    indexToUpdate = solves12.indexOf(timeToUpdate);
    solves12[indexToUpdate] = Number(solves12[indexToUpdate]) + 2000;
    indexToUpdate = -1
  }
  if (solves5.length > 0){
    indexToUpdate = solves5.indexOf(timeToUpdate);
    solves5[indexToUpdate] = Number(solves5[indexToUpdate]) + 2000;
    indexToUpdate = -1
  }
}
function deleteTimeInAverages(time){
  var timeToFind = formattedTimeToMilliseconds(time);
  var indexToDelete = -1;
  if (solves50.length > 0){
    indexToDelete = solves50.indexOf(timeToFind);
    if (indexToDelete != -1){
      solves50.splice(indexToDelete, 1);
    }
    indexToDelete = -1;
  }
  if (solves12.length > 0){
    indexToDelete = solves12.indexOf(timeToFind);
    if (indexToDelete != -1){
      solves12.splice(indexToDelete, 1);
    }
    indexToDelete = -1;
  }
  if (solves5.length > 0){
    indexToDelete = solves5.indexOf(timeToFind);
    if (indexToDelete != -1){
      solves5.splice(indexToDelete, 1);
    }
    indexToDelete = -1;
  }
}
// Local Storage Section
function fromLStoAverageArray_LS(time){
  if (typeof(Storage) != "undefined") {
    var timeToInput = formattedTimeToMilliseconds(time);
    if (solves5.length < 5){
      solves5.push(timeToInput);
    }
    if (solves12.length < 12){
      solves12.push(timeToInput);
    }
    if (solves50.length < 50){
      solves50.push(timeToInput);
    }
  } else {
    console.warn('Impossible d\'enregistrer les résolutions depuis le stockage local du navigateur !');
  }
}

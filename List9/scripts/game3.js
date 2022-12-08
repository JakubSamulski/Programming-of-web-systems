document.getElementById("startBtn").addEventListener("click", run);

function run() {
  var randomNumber = Math.floor(Math.random() * 100) + 1;
  console.log(randomNumber);
  var nrOfGuesses = 0;
  while (true) {
    nrOfGuesses++;
    var guess = prompt("Guess the number between 1-100");
    if (guess === null) break;
    else if (guess == randomNumber) {
      isNotGuessed = false;
      alert(
        "It was " +
          randomNumber +
          "\nCongratulations, you guessed the number!\nYou needed " +
          nrOfGuesses +
          " guesses"
      );
     $.ajax({
        type: "POST",
        url: "test.php",
        data: { highest_score: nrOfGuesses }
      })
      
      document.location.reload(true)

      break;
    } else if (guess < randomNumber) {
      alert("Number is higher");
    } else if (guess > randomNumber) {
      alert("Number is lower");
    }
  }
}
  

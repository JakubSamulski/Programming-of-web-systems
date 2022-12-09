document.getElementById("startBtn").addEventListener("click", run);

var random=  Math.floor(Math.random() *100)
var guesses_left=3



function setup(){
    random=  Math.floor(Math.random() *100)
    guesses_left=3
}



function run(){
    console.log(random)
    let guess =prompt(`Guess the number between 1-100 you have ${guesses_left} left`)
    if(guesses_left>=1){
        guesses_left--
        if (guess==random){
            alert(`Congratulations! you won with ${guesses_left} guesses left`)
            setup()
        }
        else{
            if(guess-random>0){
                alert("number is lower")
            }
            else{
                alert("number is higher")
            }
            run()
        }
    }
    else{
        alert("You lost :c")
        setup()
    }
}
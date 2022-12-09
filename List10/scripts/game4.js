document.getElementById("startBtn").addEventListener("click", run);
document.getElementById("restartBtn").addEventListener("click", restart);

var sum=0

function restart(){
    sum=0
}

function run(){

    var input = parseInt(prompt("Enter a Value"))
    if(isNaN(input)){
        alert("error")
        return
    }
    sum+=input
    alert(`Current sum is ${sum}`)
}


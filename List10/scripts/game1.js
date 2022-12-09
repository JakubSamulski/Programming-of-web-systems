document.getElementById("start").addEventListener("click", prepareStart)
Array.from(document.getElementsByClassName("btn")).forEach(button => {
    button.addEventListener("click", checkWin)
});

var randomMonth
var chance

function prepareStart() {
    toggleButtons()
    resetAttributes()
}

function toggleButtons() {
    var gameButtons = document.getElementsByClassName("btn")
    
    for (let i = 0; i < gameButtons.length; i++) {
        gameButtons[i].classList.toggle('on');
    }
    document.getElementById("start").classList.toggle("off")
}

function resetAttributes(){
    randomMonth = Math.floor(Math.random() * 12) + 1
    chance = 3
    console.log(randomMonth)
}

function checkWin() {


    if(randomMonth == this.id) {
        alert("You won!")
        toggleButtons()
        return
    }

    if (chance === 1) {
        alert("You lost")
        toggleButtons()
        return
    }
    chance--
}




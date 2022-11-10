"use strict"
document.getElementById("input-font").addEventListener("change",onChange)
document.getElementById("hover").addEventListener("mouseover",mouseOver)
document.getElementById("hover").addEventListener("mouseout",mouseOut)

document.body.addEventListener('keydown', function(event) {
    console.log()
    if(event.altKey){
        document.body.style.backgroundColor='green'
    }
    else if(event.shiftKey){
        document.body.style.backgroundColor='red'
    }
    else if(event.ctrlKey){
        document.body.style.backgroundColor='blue'
    }
    else if (event.key=="w"){
        document.body.style.backgroundColor='white'
    }
});


function mouseOver() {
  document.getElementById("hover").style.color = "yellow"
}

function mouseOut() {
  document.getElementById("hover").style.color = "black";
}
let screenLog = document.getElementById('#screen-log');
document.addEventListener('mousemove', logKey);

function logKey(e) {

  document.getElementById('screen-log').innerText=`
  Screen X/Y: ${e.screenX}, ${e.screenY}
  Client X/Y: ${e.clientX}, ${e.clientY}`

}





function onChange(){
    font =document.getElementById("input-font").value
    document.getElementById("fontChange").style.fontFamily=font
}


function change_color(){
        


}

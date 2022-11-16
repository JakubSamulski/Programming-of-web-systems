let inputEmail = document.getElementById('firstInput');
let errorBlock = document.getElementById('error');

inputEmail.onblur = function () {
  if (!inputEmail.value.includes("@")) {
    errorBlock.classList.add("invalid");
    errorBlock.innerHTML = "Please enter a correct email.";
  }
};

inputEmail.onfocus = function () {
  if (errorBlock.classList.contains("invalid")) {
    errorBlock.classList.remove("invalid");
    errorBlock.innerHTML = "Valid email: xxx@xxx.xxx";
  }
};

document.getElementById('emailForm').onsubmit = function () {
    confirm("Are you sure you want to submit?");
}

document.getElementById('emailForm').onreset = function () {
    confirm("Are you sure you want to reset?");
}




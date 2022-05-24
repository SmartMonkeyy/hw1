const form = document.forms['login'];
form.addEventListener('submit', validazione);
const div = document.querySelectorAll(".validate-input");
const input = document.querySelectorAll(".input100");

function validazione(event){
    if(form.username.value.length === 0){
        div[0].classList.add('alert-validate');
        event.preventDefault();
    }

    if(form.password.value.length === 0){
        div[1].classList.add('alert-validate');
        event.preventDefault();
    }

    input[0].onfocus = function (){
        div[0].classList.remove('alert-validate');
    }

    input[1].onfocus = function (){
        div[1].classList.remove('alert-validate');
    }

    if(form.password.value.match(decimal) === null){
        alert('Tutti i campi non sono stati soddisfatti.');
        event.preventDefault();
    }
}

var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
var pass = document.getElementById("psw");

pass.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

pass.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(pass.value.match(lowerCaseLetters)) {  
        document.getElementById("letter").classList.remove("invalid");
        document.getElementById("letter").classList.add("valid");
    } else {
        document.getElementById("letter").classList.remove("valid");
        document.getElementById("letter").classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(pass.value.match(upperCaseLetters)) {  
        document.getElementById("capital").classList.remove("invalid");
        document.getElementById("capital").classList.add("valid");
    } else {
        document.getElementById("capital").classList.remove("valid");
        document.getElementById("capital").classList.add("invalid");
    }
  
    // Validate numbers
    var numbers = /[0-9]/g;
    if(pass.value.match(numbers)) {  
        document.getElementById("number").classList.remove("invalid");
        document.getElementById("number").classList.add("valid");
    } else {
        document.getElementById("number").classList.remove("valid");
        document.getElementById("number").classList.add("invalid");
    }
    
    // Validate special character
    var special = /[^a-zA-Z0-9]/g;
    if(pass.value.match(special)) {  
        document.getElementById("special").classList.remove("invalid");
        document.getElementById("special").classList.add("valid");
    } else {
        document.getElementById("special").classList.remove("valid");
        document.getElementById("special").classList.add("invalid");
    }

    // Validate length
    if(pass.value.length >= 8 && pass.value.length <= 20) {
        document.getElementById("length").classList.remove("invalid");
        document.getElementById("length").classList.add("valid");
    } else {
        document.getElementById("length").classList.remove("valid");
        document.getElementById("length").classList.add("invalid");
    }

  }
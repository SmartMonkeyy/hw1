const formUpload = document.forms['upload'];
formUpload.addEventListener('submit', check_parameters);
const div = document.querySelectorAll(".validate-input");
const input = document.querySelectorAll(".input100");
var allowedExtensions = /(\.jpg|\.jpeg)$/i;

function check_parameters(event){

    if(event.submitter.id == "exit"){
        return;
    }

    if(!allowedExtensions.exec(formUpload.file.value)){
        div[0].classList.add('alert-validate');
        event.preventDefault();
    }

    if(formUpload.title.value.length === 0){
        div[1].classList.add('alert-validate');
        event.preventDefault();
    }

    if(formUpload.heading.value.length === 0){
        div[2].classList.add('alert-validate');
        event.preventDefault();
    }

    if(formUpload.paragraph.value.length === 0){
        div[3].classList.add('alert-validate');
        event.preventDefault();
    }

    let parameters = document.querySelector("#message");
    for(let i = 1; i < parameters.childElementCount; i++){
        console.log(parameters.children[i]);
        if(parameters.children[i].classList.contains('invalid')){
            alert('Tutti i campi non sono stati soddisfatti.');
            break;    
        }
    }

    input[0].onfocus = function (){
        div[0].classList.remove('alert-validate');
    }

    input[1].onfocus = function (){
        div[1].classList.remove('alert-validate');
    }

    input[2].onfocus = function (){
        div[2].classList.remove('alert-validate');
    }

    input[3].onfocus = function (){
        div[3].classList.remove('alert-validate');
    }
}

var fl = document.getElementById("file");
var ttl = document.getElementById("title");
var hdng = document.getElementById("heading");
var prgrf = document.getElementById("paragraph");
var tp = document.getElementById("type");

fl.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

ttl.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

hdng.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

prgrf.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

tp.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

fl.onchange = function() {
    if(formUpload.file.value.search(".jpg") !== -1 || formUpload.file.value.search(".jpeg") !== -1){
    document.getElementById("mandatory_file").classList.remove("invalid");
    document.getElementById("mandatory_file").classList.add("valid");
    }else{
    document.getElementById("mandatory_file").classList.remove("valid");
    document.getElementById("mandatory_file").classList.add("invalid");
    }
}

ttl.onkeyup = function() {
    if(ttl.value.length > 30 && ttl.value.length < 132) {  
        document.getElementById("mandatory_title").classList.remove("invalid");
        document.getElementById("mandatory_title").classList.add("valid");
    } else {
        document.getElementById("mandatory_title").classList.remove("valid");
        document.getElementById("mandatory_title").classList.add("invalid");
    }
}

hdng.onkeyup = function() {
    if(hdng.value.length > 50 && hdng.value.length < 290) {  
        document.getElementById("mandatory_heading").classList.remove("invalid");
        document.getElementById("mandatory_heading").classList.add("valid");
    } else {
        document.getElementById("mandatory_heading").classList.remove("valid");
        document.getElementById("mandatory_heading").classList.add("invalid");
    }
}
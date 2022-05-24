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
}

const form = document.forms['login'];
form.addEventListener('submit', validazione);
const div = document.querySelectorAll(".validate-input");
const input = document.querySelectorAll(".input100");
var btn1
var btn2;
var btnSection;

function set(){
    btn1 = document.querySelectorAll(".buttonSection button[name='green']");
    btn2 = document.querySelectorAll(".buttonSection button[name='red']");

    for(let i = 0; i < btn1.length; i++){
        btn1[i].addEventListener('click', like);
        btn2[i].addEventListener('click', dislike);
    }

    btnSection = document.querySelectorAll(".buttonSection");
}

var likebutton_selected;
var dislikebutton_selected;

function like(event){

    likebutton_selected = event.srcElement;

    for(let i = 0; i < btnSection.length; i++){

        if(btnSection[i].id === event.srcElement.id){

            if(btnSection[i].childNodes[2].classList.contains('red')){
                btnSection[i].childNodes[2].classList.remove('red');
            }

            likebutton_selected.classList.add('green');
            likebutton_selected.removeEventListener('click', like);
            btnSection[i].childNodes[2].addEventListener('click', dislike);

            likePost(event);

        }
    }   
}

function likePost(event){

    button = event.currentTarget;

    createCookie("post_id", button.parentNode.parentNode.dataset.id, "1");

    fetch("php/like_post.php").then(onLikeResponse).then(onJSONLikes);
}

function onLikeResponse(response){
    return response.json();
}

function onJSONLikes(json){

    var buttonID = getCookie("post_id");

    for(let i = 0; i < btnSection.length; i++){

        if(btnSection[i].id === buttonID){

            btnSection[i].querySelector('span').textContent = json.total_likes;

        }

    }
    eraseCookie("post_id");
}

function dislike(event){

    dislikebutton_selected = event.srcElement;

    for(let i = 0; i < btnSection.length; i++){

        if(btnSection[i].id === event.srcElement.id){
            
            if(btnSection[i].childNodes[1].classList.contains('green')){
                btnSection[i].childNodes[1].classList.remove('green');
            }
    
            dislikebutton_selected.classList.add('red');
            dislikebutton_selected.removeEventListener('click', dislike);
            btnSection[i].childNodes[1].addEventListener('click', like);

            dislikePost(event);
        }
    }
}

function dislikePost(event){

    button = event.currentTarget;

    createCookie("post_id", button.parentNode.parentNode.dataset.id, "1");

    fetch("php/dislike_post.php").then(onLikeResponse).then(onJSONLikes);
}

function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    //console.log(nameEQ);
    var ca = document.cookie.split(';');
    //console.log(ca);
    for(var i=0; i < ca.length; i++) {
        var c = ca[i];
        //console.log(c);
        //console.log("aaa");
        while (c.charAt(0)==' '){
            c = c.substring(1,c.length);
            //console.log(c);
        }
        if (c.indexOf(nameEQ) == 0){
            //console.log(c.substring(nameEQ.length,c.length));
            return c.substring(nameEQ.length,c.length);
        }
    }
    return null;
}

function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
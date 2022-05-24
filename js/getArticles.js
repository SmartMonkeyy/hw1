const div = document.querySelector(".articles-container");

callfetch();

function callfetch(){
    fetch("php/getArticles.php").then(onResponseArt).then(onJSONART);
}

const reload = document.querySelector("#reload");
reload.addEventListener('click', beforecallfetch);

function beforecallfetch(){

    while(div.firstChild){

        div.removeChild(div.lastChild);

    }

    callfetch();

}

function onResponseArt(response){
    return response.json();
}

function onJSONART(json){

    for(let i=0; i < json.length; i++){

       
        var imgHref = "img/" + json[i].img + ".jpg";
        var title = json[i].title;
        var heading = json[i].heading;
        var paragraph = json[i].paragraph;
        var type = json[i].type;
        var alt = type + " news";
        var data_id = json[i].id;
        var post_likes = json[i].total_likes;
        var CONTINUE = "Continue reading...";

        if(document.querySelector('title').textContent.toLowerCase() === "home"){
            
            var sec = document.createElement('article');
            sec.setAttribute('id', i+1);
            sec.setAttribute('data-id', data_id);
            sec.classList.add('article');

            var img = document.createElement('img');
            img.setAttribute('src', imgHref);
            img.setAttribute('alt', alt);

            var h2 = document.createElement('h2');
            h2.classList.add('margin');
            h2.setAttribute('id', "title");
            h2.textContent = title;

            var article_text = document.createElement('div')
            article_text.classList.add('article-text');
            article_text.setAttribute('id', 'paragraph+body')

            var spanHeading = document.createElement('span');
            spanHeading.classList.add('margin');
            spanHeading.classList.add('hidden');
            spanHeading.setAttribute('id', 'paragraph');
            spanHeading.textContent = heading;

            var spanParagraph = document.createElement('span');
            spanParagraph.classList.add('margin');
            spanParagraph.classList.add('hidden');
            spanParagraph.setAttribute('id', 'body');
            spanParagraph.textContent = paragraph;

            article_text.appendChild(spanHeading);
            article_text.appendChild(spanParagraph);

            var a = document.createElement('a');
            a.classList.add('expand-post');
            a.classList.add('margin');
            a.setAttribute('id', i+1);
            a.textContent = CONTINUE;

            var buttonLike = document.createElement('button');
            buttonLike.classList.add('like-dislike-button');
            buttonLike.setAttribute('id', i+1);
            buttonLike.setAttribute('name', 'green');

            var iLike = document.createElement('i');
            iLike.classList.add('fa');
            iLike.classList.add('fa-thumbs-up');
            iLike.classList.add('fa-lg');
            iLike.setAttribute('aria-hidden', 'true');
            iLike.setAttribute('id', i+1);

            buttonLike.appendChild(iLike);

            var buttonDislike = document.createElement('button');
            buttonDislike.classList.add('like-dislike-button');
            buttonDislike.setAttribute('id', i+1);
            buttonDislike.setAttribute('name', 'red');

            var iDislike = document.createElement('i');
            iDislike.classList.add('fa');
            iDislike.classList.add('fa-thumbs-down');
            iDislike.classList.add('fa-lg');
            iDislike.setAttribute('aria-hidden', 'true');
            iDislike.setAttribute('id', i+1);

            buttonDislike.appendChild(iDislike);

            var likes_numbers = document.createElement('span');
            likes_numbers.textContent = post_likes;

            var buttonSection = document.createElement('section')
            buttonSection.classList.add('buttonSection')
            buttonSection.setAttribute('id', i+1);

            buttonSection.appendChild(likes_numbers);
            buttonSection.appendChild(buttonLike);
            buttonSection.appendChild(buttonDislike);

            sec.appendChild(img);
            sec.appendChild(h2);
            sec.appendChild(article_text);
            sec.appendChild(a);
            sec.appendChild(buttonSection);

            div.appendChild(sec);
        }else{
            if(document.querySelector('title').textContent.toLowerCase() === type){
    
                var sec = document.createElement('article');
                sec.setAttribute('id', i+1);
                sec.setAttribute('data-id', data_id);
                sec.classList.add('article');

                var img = document.createElement('img');
                img.setAttribute('src', imgHref);
                img.setAttribute('alt', alt);

                var h2 = document.createElement('h2');
                h2.classList.add('margin');
                h2.setAttribute('id', "title");
                h2.textContent = title;

                var article_text = document.createElement('div')
                article_text.classList.add('article-text');
                article_text.setAttribute('id', 'paragraph+body')

                var spanHeading = document.createElement('span');
                spanHeading.classList.add('margin');
                spanHeading.classList.add('hidden');
                spanHeading.setAttribute('id', 'paragraph');
                spanHeading.textContent = heading;

                var spanParagraph = document.createElement('span');
                spanParagraph.classList.add('margin');
                spanParagraph.classList.add('hidden');
                spanParagraph.setAttribute('id', 'body');
                spanParagraph.textContent = paragraph;

                article_text.appendChild(spanHeading);
                article_text.appendChild(spanParagraph);

                var a = document.createElement('a');
                a.classList.add('expand-post');
                a.classList.add('margin');
                a.setAttribute('id', i+1);
                a.textContent = CONTINUE;

                var buttonLike = document.createElement('button');
                buttonLike.classList.add('like-dislike-button');
                buttonLike.setAttribute('id', i+1);
                buttonLike.setAttribute('name', 'green');

                var iLike = document.createElement('i');
                iLike.classList.add('fa');
                iLike.classList.add('fa-thumbs-up');
                iLike.classList.add('fa-lg');
                iLike.setAttribute('aria-hidden', 'true');
                iLike.setAttribute('id', i+1);

                buttonLike.appendChild(iLike);

                var buttonDislike = document.createElement('button');
                buttonDislike.classList.add('like-dislike-button');
                buttonDislike.setAttribute('id', i+1);
                buttonDislike.setAttribute('name', 'red');

                var iDislike = document.createElement('i');
                iDislike.classList.add('fa');
                iDislike.classList.add('fa-thumbs-down');
                iDislike.classList.add('fa-lg');
                iDislike.setAttribute('aria-hidden', 'true');
                iDislike.setAttribute('id', i+1);

                buttonDislike.appendChild(iDislike);

                var likes_numbers = document.createElement('span');
                likes_numbers.textContent = post_likes;

                var buttonSection = document.createElement('section')
                buttonSection.classList.add('buttonSection')
                buttonSection.setAttribute('id', i+1);

                buttonSection.appendChild(likes_numbers);
                buttonSection.appendChild(buttonLike);
                buttonSection.appendChild(buttonDislike);

                sec.appendChild(img);
                sec.appendChild(h2);
                sec.appendChild(article_text);
                sec.appendChild(a);
                sec.appendChild(buttonSection);

                div.appendChild(sec);
            }
        }
    }
    continue_reading();
}

var a;
var sectionCreated;
var articleAndText;

function continue_reading(event){

    a = div.querySelectorAll(".expand-post");
    sectionCreated = div.querySelectorAll(".article");
    articleAndText = div.querySelectorAll('.article-text');

    //console.log(sectionCreated);

    //console.log(a);
    //console.log(a.length);

    for (let i = 0; i < a.length; i++){
        a[i].addEventListener("click", open);
    }

    set();
}

function open(event){
    var a_Selected = event.srcElement;
    //console.log(event.srcElement.id);
    //console.log(event.srcElement.textContent);
    //console.log(event.srcElement.innerHTML);
    for(let i = 0; i < sectionCreated.length; i++){
        if(a_Selected.textContent === "Continue reading..."){
            if(sectionCreated[i].id === a_Selected.id){
                a_Selected.innerHTML = "Reduce";
                articleAndText[i].style.setProperty('display', 'flex');
                let divHeight = articleAndText[i].clientHeight;
                let newHeight = divHeight + sectionCreated[i].clientHeight - 30 + "px";
                sectionCreated[i].style.setProperty('height', newHeight);
            }
        }else{
            if(sectionCreated[i].id === a_Selected.id){
                a_Selected.innerHTML = "Continue reading...";
                if(window.innerWidth <= 1000){
                    sectionCreated[i].style.setProperty('height', "700px");
                }else{
                    sectionCreated[i].style.setProperty('height', "450px");
                }
                articleAndText[i].style.setProperty('display', 'none');
            }
        }
    }
}

function openNav() {
    if(window.innerWidth <= 1000){
        document.getElementById("sidenav").style.width = "30%";
    }else{
        document.getElementById("sidenav").style.width = "15%";
    }
    document.querySelector(".usericon").style.setProperty('display', 'none');
    document.querySelector('.info-sidenav img').style.setProperty('width', '70px');
    document.querySelector('.info-sidenav img').style.setProperty('height', '70px');
}
  
function closeNav() {
    document.getElementById("sidenav").style.width = "0";
    document.querySelector('.usericon').style.setProperty('display', 'block');
}

const form = document.forms['search'];

form.addEventListener('submit', search);

var modal;

function search(event){
    event.preventDefault();
    
    modal = document.querySelector("#Modal");
    modal.style.setProperty('--modal-display', 'block');
    document.querySelector('body').style.setProperty('--overflow-body', 'hidden');
    
    fetch("php/getArticles.php").then(onResponseModal).then(onJSONMODAL);
}

function close(){
    modal.style.setProperty('--modal-display', 'none');
    document.querySelector('body').style.setProperty('--overflow-body', 'auto');
    inputSearch.value = "";

    while(modaldiv.firstChild){

        modaldiv.removeChild(modaldiv.lastChild);

    }
}

window.addEventListener("click", function(event) {
    if(event.target == modal){

        modal.style.setProperty('--modal-display', 'none');
        document.querySelector('body').style.setProperty('--overflow-body', 'auto');
        inputSearch.value = "";
        
        while(modaldiv.firstChild){

            modaldiv.removeChild(modaldiv.lastChild);

        }
    }
}
);

function onResponseModal(response){
    return response.json();
}

const modaldiv = document.querySelector(".modal-content");

const inputSearch = form.querySelector(".search-input");

function onJSONMODAL(json){

    for(let i=0; i < json.length; i++){

        var imgHref = "img/" + json[i].img + ".jpg";
        var title = json[i].title;
        var heading = json[i].heading;
        var paragraph = json[i].paragraph;
        var type = json[i].type;
        var alt = type + " news";
        var CONTINUE = "Continue reading...";

        if(json[i].title.toLowerCase().includes(inputSearch.value.toLowerCase())){

            if(document.querySelector('title').textContent.toLowerCase() === "home"){
                var aContainer = document.createElement('a');
                var id = i+1;
                aContainer.setAttribute('href', "#" + id);
                aContainer.classList.add('no-decoration');
                aContainer.addEventListener('click', close);
    
                var sec = document.createElement('section');
                sec.setAttribute('id', i+1);
                sec.classList.add('modal-article');
        
                var img = document.createElement('img');
                img.setAttribute('src', imgHref);
                img.setAttribute('alt', alt);
        
                var h2 = document.createElement('h2');
                h2.classList.add('margin');
                h2.setAttribute('id', "title");
                h2.textContent = title;
        
                var spanHeading = document.createElement('span');
                spanHeading.classList.add('margin');
                spanHeading.setAttribute('id', "paragraph");
                spanHeading.textContent = heading;
        
                var spanParagraph = document.createElement('span');
                spanParagraph.classList.add('margin');
                spanParagraph.classList.add('hidden');
                spanParagraph.setAttribute('id', 'hidden');
                spanParagraph.textContent = paragraph;
        
                sec.appendChild(img);
                sec.appendChild(h2);
                sec.appendChild(spanHeading);
                sec.appendChild(spanParagraph);
    
                aContainer.appendChild(sec);
        
                modaldiv.appendChild(aContainer);
            }else{

                if(document.querySelector('title').textContent.toLowerCase() === type){
                    var aContainer = document.createElement('a');
                    var id = i+1;
                    aContainer.setAttribute('href', "#" + id);
                    aContainer.classList.add('no-decoration');
                    aContainer.addEventListener('click', close);
        
                    var sec = document.createElement('section');
                    sec.setAttribute('id', i+1);
                    sec.classList.add('modal-article');
            
                    var img = document.createElement('img');
                    img.setAttribute('src', imgHref);
                    img.setAttribute('alt', alt);
            
                    var h2 = document.createElement('h2');
                    h2.classList.add('margin');
                    h2.setAttribute('id', "title");
                    h2.textContent = title;
            
                    var spanHeading = document.createElement('span');
                    spanHeading.classList.add('margin');
                    spanHeading.setAttribute('id', "paragraph");
                    spanHeading.textContent = heading;
            
                    var spanParagraph = document.createElement('span');
                    spanParagraph.classList.add('margin');
                    spanParagraph.classList.add('hidden');
                    spanParagraph.setAttribute('id', 'hidden');
                    spanParagraph.textContent = paragraph;
            
                    sec.appendChild(img);
                    sec.appendChild(h2);
                    sec.appendChild(spanHeading);
                    sec.appendChild(spanParagraph);
        
                    aContainer.appendChild(sec);
            
                    modaldiv.appendChild(aContainer);
                }


            }

        }

    }

}


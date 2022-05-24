const section = document.querySelector(".theguardian-news-titles");

const url = "php/getGuardian.php";

//theGuardianNewsLoop

callnews();

function callnews(){
    fetch(url).then(onResponse).then(onJSON);

    setTimeout(deleteAll, 180000);
}

function deleteAll(){
    while(section.firstChild){
        section.removeChild(section.lastChild);
    }

    callnews();
}


function onResponse(response){
    return response.json();
}

function onJSON(json){

    for(let i = 0; i < 7; i++){
        var href = json[i].webUrl;
        var title = json[i].webTitle;
        var category = json[i].pillarName;
        var date = json[i].webPublicationDate;
        date = date.replace("T", " ");
        date = date.replace("Z", "");

        var div = document.createElement('div');
        div.setAttribute('id','theguardian-news-div');

        var a = document.createElement('a');
        a.classList.add('no-decoration');
        a.setAttribute('href', href);
        a.setAttribute('target', "_blank");

        var p1 = document.createElement('p');
        p1.classList.add('titles');
        p1.textContent = title;

        var p2 = document.createElement('p');
        p2.classList.add('type');
        p2.textContent = category + " / " + date;

        a.appendChild(p1);
        a.appendChild(p2);

        section.appendChild(a);
    }

}
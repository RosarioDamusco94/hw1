function onJson(json){
    console.log(json);
    let sezione = undefined;
    sezione = document.querySelector("div.negozio")
    for(let i=0; i<6; i++){
        //crea div e aggiungi classe
    const divRiga = document.createElement("div");
    divRiga.classList.add("newdiv");
    divRiga.dataset.i=i;
    ind=divRiga.dataset.i
 
    //crea immagine
    const image = document.createElement("img");
    image.src=json[i].immagine;
    image.classList.add("immagine");
 
    //crea titolo
    const divElemento = document.createElement("div");
    const titolo = document.createElement("h3");
    titolo.textContent=json[i].nome_prodotto;
    divElemento.appendChild(titolo);
    divRiga.appendChild(image);
    divRiga.appendChild(divElemento);
 
    const prezzo = document.createElement("h4")
    prezzo.classList.add("prezzo")
    prezzo.textContent = "€"+json[i].prezzo+",00 al Kg";

    divElemento.appendChild(prezzo);

    //crea descrizione
    const description = document.createElement("p");
    description.textContent = json[i].descrizione;
    description.classList.add("descrizione");
    description.classList.add("hidden");
    divElemento.appendChild(description);

    const bottoneDescrizione = document.createElement("img");
    bottoneDescrizione.classList.add("pulsante");
    bottoneDescrizione.src="info.svg";
    divElemento.appendChild(bottoneDescrizione);
    //bottoneDescrizione.textContent=("Scopri la descrizione");
    bottoneDescrizione.addEventListener('click',Scopridescrizione);

    const compraprodotto=document.createElement("img");
    compraprodotto.classList.add("pulsante_compra_prodotto")
    compraprodotto.src="carrello.svg";
    divElemento.appendChild(compraprodotto)
    //compraprodotto.textContent=("Compralo subito");
    compraprodotto.addEventListener('click', acquista);

    const scritta = document.createElement("span");
    scritta.classList.add("hidden");
    scritta.textContent=("Aggiunto al carrello!")
    divElemento.appendChild(scritta);
 
    sezione.appendChild(divRiga);
    }
}

function acquista(event){
    prodotto = event.currentTarget.parentNode.parentNode
    const id = prodotto.dataset.i;
    console.log(prodotto);

    const scritta = prodotto.querySelector("span");
    scritta.classList.remove("hidden");

    fetch("carrello.php?id="+id);
    event.preventDefault();
}

function Scopridescrizione(e) {
    const divPadre =e.target.parentNode;
    const descr = divPadre.getElementsByTagName("p")[0];
    descr.classList.toggle("hidden");
 
}

function onResponse(response){
    return response.json();
}

function prodotti(){
    fetch("shop2.php").then(onResponse).then(onJson);
}

prodotti();
let ind=null;
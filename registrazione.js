function verifica(event){
    const errore = document.querySelector("#errore");
    const avviso = document.querySelector('div');
    errore.innerHTML = "";
    avviso.innerHTML = "";
    // Verifica se tutti i campi sono riempiti
    if(form.username.value.length == 0 || form.password.value.length == 0){
        // Avvisa utente
        const avviso = document.querySelector('div');
        avviso.classList.remove('hidden');
        // Blocca l'invio del form
        event.preventDefault();
    }
}



// Riferimento al form
const form = document.forms['form'];
// Aggiungi listener
form.addEventListener('submit', verifica);
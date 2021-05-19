function verifica(event){
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
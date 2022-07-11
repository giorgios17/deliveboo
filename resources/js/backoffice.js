// costanti
const form = document.querySelector('#register-form'); // <-- inizializzo la costante del form
const pw = document.querySelector("#new-password"); // <-- inizializzo la costante della password
const pwConfirm = document.querySelector("#password-confirm"); // <-- inizializzo la costante della conferma password
let checkboxs = document.querySelectorAll(".categoryInput"); // <-- inizializzo la variabile delle checkbox


if (form) { // <-- se il form esiste e quindi non è nullo
    form.addEventListener('submit', function (e) { // <-- aggiungo un evento submit al form
        if (pw.value != pwConfirm.value) { // <-- se i campi password e conferma password non coincidono
            e.preventDefault(); // <-- prevengo il comportamento di default del form
            window.scrollTo({ top: 0, behavior: 'smooth' }); // <-- scrollo la pagina all'inizio
        }

        let okay = false; // <-- inizializzo la variabile di controllo
        for (let i = 0; i < checkboxs.length; i++) { // <-- ciclo per tutte le checkbox
            if (checkboxs[i].checked) { // <-- se la checkbox è selezionata
                okay = true; // <-- imposto la variabile di controllo a true
                break; // <-- interrompo il ciclo
            }
        }
        if (!okay) { // <-- se la variabile di controllo è false
            e.preventDefault(); // <-- prevengo il comportamento di default del form
            document.querySelector("#alert-checkbox").style.display = "block"; // <-- mostro l'alert
        }
        else { // <-- se la variabile di controllo è true
            document.querySelector("#alert-checkbox").style.display = "none"; // <-- nascondo l'alert
        }
    });
}

if (pwConfirm) {
    pwConfirm.addEventListener('keyup', function () { // <-- aggiungo un evento keyup alla conferma password
        if (pw.value != pwConfirm.value) { // <-- se i campi password e conferma password non coincidono
            document.querySelector("#alert-password").style.display = "block"; // <-- mostro l'alert
            document.querySelector("#success-password").style.display = "none"; // <-- nascondo il successo
        }
        else { // <-- se i campi password e conferma password coincidono
            document.querySelector("#alert-password").style.display = "none"; // <-- nascondo l'alert
            document.querySelector("#success-password").style.display = "block"; // <-- mostro il successo
        }
    });
}






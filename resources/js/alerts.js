let deleteForm = document.querySelectorAll(".delete_form"); // <-- verifico che l'elemento non abbia valore nullo salvando il form in una variabile

for (const form of deleteForm) {
    if (form) { // <-- se il form esiste e quindi non è nullo

        form.addEventListener('submit', function (e) { // <-- aggiungo un evento submit al form

            e.preventDefault(); // <-- prevengo il comportamento di default del form

            const swalWithBootstrapButtons = Swal.mixin({ // <-- creo una variabile che mi permette di utilizzare la funzione di sweetalert con i bottoni di bootstrap
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Sei sicuro?',
                text: "Se confermi non potrai ritornare indietro!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, sono sicuro!',
                cancelButtonText: 'No, annulla!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) { // <-- se l'utente conferma l'eliminazione del piatto faccio partire il form di eliminazione
                    swalWithBootstrapButtons.fire(
                        'Eliminato!',
                        'Il tuo piatto è stato eliminato con successo!!',
                        'success'
                    ).then(function () {
                        form.submit(); // <-- faccio partire il form di eliminazione
                    });
                } else { // <-- se l'utente annulla l'eliminazione del piatto non faccio partire il form di eliminazione
                    swalWithBootstrapButtons.fire(
                        'Annullato',
                        'Il piatto non è stato eliminato :)',
                        'error'
                    )
                }
            })
        });

    }
}


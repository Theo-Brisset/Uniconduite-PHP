
// JavaScript pour la validation des cases à cocher

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('form').addEventListener('submit', function(event) {
        const meteoSelect = document.getElementById('meteo');
        const traficSelect = document.getElementById('trafic');
        const checkboxesManoeuvres = document.querySelectorAll('.manoeuvre-checkbox');
        const checkboxesRoute = document.querySelectorAll('.route-checkbox');

        // Vérifie si la météo est sélectionnée
        if (!meteoSelect.value) {
            event.preventDefault(); // Empêche la soumission du formulaire
            alert('Veuillez sélectionner la météo.'); // Message d'alerte pour l'utilisateur
            return;
        }

        if (!traficSelect.value) {
            event.preventDefault()
            alert('Veuillez sélectionner le trafic');
            return;
        }

        let isCheckedManoeuvres = false;
        checkboxesManoeuvres.forEach(function(checkbox){
            if(checkbox.checked){
                isCheckedManoeuvres = true;
            }
        })

        if (!isCheckedManoeuvres){
            event.preventDefault();
            alert('Veuillez sélectionner au moins un type de manoeuvre.');
            return
        }

        // Vérifie si au moins une case à cocher "Sur quel type de route ?" est cochée
        let isCheckedRoute = false;
        checkboxesRoute.forEach(function(checkbox) {
            if (checkbox.checked) {
                isCheckedRoute = true;
            }
        });

        if (!isCheckedRoute) {
            event.preventDefault(); // Empêche la soumission du formulaire
            alert('Veuillez sélectionner au moins un type de route.'); // Message d'alerte pour l'utilisateur
            return
        }
    });
})

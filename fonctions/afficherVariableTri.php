
<script>
    //On réutilise les "nomVariables" définis dans recupererResultat.php car elles contiennent toutes les infos dont on a besoin//
    var nomMeteo = <?php echo json_encode($nomMeteo); ?>;
    console.log(nomMeteo)

    var nomTrafic = <?php echo json_encode($nomTypeTrafic); ?>;
    console.log(nomTrafic)

    var nomTypeRoute = <?php echo json_encode($nomTypeRoute); ?>;
    console.log(nomTypeRoute)

    var nomManoeuvres = <?php echo json_encode($nomManoeuvres); ?>;
    console.log(nomManoeuvres)

    document.addEventListener('DOMContentLoaded', (event) => {
        var ajouterBoutons = document.querySelectorAll('.ajouter-variable');
        ajouterBoutons.forEach(function(bouton) {
            bouton.addEventListener('click', function(event) {
                event.preventDefault();
                var selectionVariable = bouton.parentNode.querySelector('.choix').value;
                choisirVariable(selectionVariable);
            });
        });
    });

    function choisirVariable(selection) {
        var affichage = document.querySelector('.affichageVariables');
        affichage.innerHTML = ''; // Efface le contenu précédent

        switch (selection) {
            case "2":
                console.log(nomMeteo);
                affichage.innerHTML = '<h2>Météo</h2>';
                nomMeteo.forEach(function(meteo) {
                    affichage.innerHTML += '<p>' + meteo.nomMeteo + '</p>';
                });
                break;
            case "3":
                console.log(nomTrafic);
                affichage.innerHTML = '<h2>Trafic</h2>';
                nomTrafic.forEach(function(trafic) {
                    affichage.innerHTML += '<p>' + trafic.nomTypeTrafic + '</p>';
                });
                break;
            case "4":
                console.log(nomTypeRoute);
                affichage.innerHTML = '<h2>Type de route</h2>';
                nomTypeRoute.forEach(function(route) {
                    affichage.innerHTML += '<p>' + route.nomTypeRoute + '</p>';
                });
                break;
            case "5":
                console.log(nomManoeuvres);
                affichage.innerHTML = '<h2>Manoeuvres</h2>';
                nomManoeuvres.forEach(function(manoeuvre) {
                    affichage.innerHTML += '<p>' + manoeuvre.nomManoeuvre + '</p>';
                });
                break;
            default:
                console.log('Choisissez une variable de tri !');
        }

        affichage.innerHTML += '<fieldset><label for="choix"><select name="choix" id="choix" class="choix"><option value="" hidden>Choisir variable de tri</option><option value="km">Kilomètres</option><option value="2">Météo</option><option value="3">Trafic</option><option value="4">Type de route</option><option value="5">Manoeuvres</option></select><button type="" id="ajouter-variable" class="ajouter-variable" aria-label="Cliquez pour ajouter une variable de tri des résultats !"><img src="img/signe-plus-blanc.png" alt="Submit" ></button><div id="affichageVariables" class="affichageVariables"></div></fieldset>'
    }

</script>
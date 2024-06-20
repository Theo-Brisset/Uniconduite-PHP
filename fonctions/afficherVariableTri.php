
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
        ajouterEventListener();
    });

    function ajouterEventListener(){
        
        var ajouterBoutons = document.querySelectorAll('.ajouter-variable');
        ajouterBoutons.forEach(function(bouton) {
            bouton.addEventListener('click', function(event) {
                event.preventDefault();
                var selectionVariable = bouton.parentNode.querySelector('.choix').value;
                choisirVariable(selectionVariable);
            });
        });
    };
    

    function choisirVariable(selection) {
        var affichageContainer = document.querySelector('.affichageVariablesContainer');
        var affichage = document.createElement('fieldset'); // Crée une nouvelle div pour chaque sélection
        affichage.className = 'affichageVariables'; // Ajoute une classe pour la nouvelle div

        switch (selection) {
            case "2":
                console.log(nomMeteo);
                affichage.innerHTML = '<p>Météo</p>';
                nomMeteo.forEach(function(meteo) {
                    var checkboxId = 'meteo' + meteo.idMeteo;
                    affichage.innerHTML += '<fieldset><input type="checkbox" value="meteo' + meteo.idMeteo +'" name="meteo" id="meteo' + checkboxId +'"><label for="meteo' + checkboxId + '">' + meteo.nomMeteo + '</label></div>';
                })
                
                break;
            case "3":
                console.log(nomTrafic);
                affichage.innerHTML = '<p>Trafic</p>';
                nomTrafic.forEach(function(trafic) {
                    var checkboxId = 'meteo' + trafic.idTypeTrafic;
                    affichage.innerHTML += '<fieldset><input type="checkbox" value="trafic' + trafic.idTypeTrafic +'" name="trafic" id="trafic' + checkboxId +'"><label for="trafic' + checkboxId + '">' + trafic.nomTypeTrafic + '</label></div>';

                });
                break;
            case "4":
                console.log(nomTypeRoute);
                affichage.innerHTML = '<p>Type de route</p>';
                nomTypeRoute.forEach(function(route) {
                    var checkboxId = 'meteo' + route.idTypeRoute;
                    affichage.innerHTML += '<fieldset><input type="checkbox" value="route' + route.idTypeRoute +'" name="route" id="route' + checkboxId +'"><label for="route' + checkboxId + '">' + route.nomTypeRoute + '</label></div>';

                });
                break;
            case "5":
                console.log(nomManoeuvres);
                affichage.innerHTML = '<p>Manoeuvres</p>';
                nomManoeuvres.forEach(function(manoeuvre) {
                    var checkboxId = 'meteo' + manoeuvre.idManoeuvre;
                    affichage.innerHTML += '<div><input type="checkbox" value="manoeuvre' + manoeuvre.idManoeuvre +'" name="manoeuvre" id="manoeuvre' + checkboxId +'"><label for="manoeuvre' + checkboxId + '">' + manoeuvre.nomManoeuvre + '</label></div>';

                });
                break;
            default:
                console.log('Choisissez une variable de tri !');
        }

        if(selection != ""){
            var newFieldset = document.createElement('fieldset');
            newFieldset.innerHTML = '<label for="choix">Ajouter une condition de tri ?</label><select name="choix" class="choix"><option value="" hidden>Choisir une variable de tri</option><option value="km">Kilomètres</option><option value="2">Météo</option><option value="3">Trafic</option><option value="4">Type de route</option><option value="5">Manoeuvres</option></select><button type="button" class="ajouter-variable" aria-label="Cliquez pour ajouter une variable de tri des résultats !"><img src="img/signe-plus-blanc.png" alt="Submit" ></button>';
            affichage.appendChild(newFieldset);
        }

        affichageContainer.appendChild(affichage); // Ajoute la nouvelle div au conteneur
        ajouterEventListener();
    }

</script>
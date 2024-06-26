
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

    let tableauControleOption = [];
    let tableauOptions = [{'value':1, 'texte':'<option value="1">Kilomètres</option>'}, 
                            {'value':2, 'texte':'<option value="2">Météo</option>'},
                            {'value':3,'texte':'<option value="3">Trafic</option>'},
                            {'value':4,'texte':'<option value="4">Type de route</option>'},
                            {'value':5, 'texte':'<option value="5">Manoeuvres</option>'}];

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

    function filtrerOptions(controleOptions, options) {
    var resultatOptions = [];

    options.forEach(function(option) {
        if (!controleOptions.includes(option.value.toString())) {
            resultatOptions.push(option.texte);
        }
    });

    return resultatOptions.join('');
    }
    

    function choisirVariable(selection) {
        var affichageContainer = document.querySelector('.affichageVariablesContainer');
        var affichage = document.createElement('fieldset'); // Crée une nouvelle div pour chaque sélection
        affichage.className = 'affichageVariables'; // Ajoute une classe pour la nouvelle div

        

        switch (selection) {
            case "1":
                affichage.innerHTML = '<p>Kilomètres minimum effectués</p>';
                affichage.innerHTML += '<div><input type="number" value="" name="km" id="km" placeholder="Combien de km parcourus minimum ?"></div>'
                tableauControleOption.push(selection)
                break;
            case "2":
                affichage.innerHTML = '<p>Météo</p>';
                nomMeteo.forEach(function(meteo) {
                    var checkboxId = 'meteo' + meteo.idMeteo + '[]';
                    affichage.innerHTML += '<div><input type="checkbox" value="' + meteo.idMeteo +'" name="meteo[]" id="' + checkboxId +'"><img src="'+ meteo.imgMeteo + '"><label for="' + checkboxId + '">' + meteo.nomMeteo + '</label></div>';
                })
                tableauControleOption.push(selection)
                break;
            case "3":

                affichage.innerHTML = '<p>Trafic</p>';
                nomTrafic.forEach(function(trafic) {
                    var checkboxId = 'trafic' + trafic.idTypeTrafic + '[]';
                    affichage.innerHTML += '<div><input type="checkbox" value="' + trafic.idTypeTrafic +'" name="trafic[]" id="' + checkboxId +'"><img src="'+ trafic.imgTrafic + '"><label for="' + checkboxId + '">' + trafic.nomTypeTrafic + '</label></div>';

                });
                tableauControleOption.push(selection)
                break;
            case "4":

                affichage.innerHTML = '<p>Type de route</p>';
                nomTypeRoute.forEach(function(route) {
                    var checkboxId = 'route' + route.idTypeRoute + '[]';
                    affichage.innerHTML += '<div><input type="checkbox" value="' + route.idTypeRoute +'" name="route[]" id="' + checkboxId +'"><img src="'+ route.imgTypeRoute + '"><label for="' + checkboxId + '">' + route.nomTypeRoute + '</label></div>';

                });
                tableauControleOption.push(selection)
                break;
            case "5":

                affichage.innerHTML = '<p>Manoeuvres</p>';
                nomManoeuvres.forEach(function(manoeuvre) {
                    var checkboxId = 'manoeuvre' + manoeuvre.idManoeuvre + '[]';
                    affichage.innerHTML += '<div><input type="checkbox" value="' + manoeuvre.idManoeuvre +'" name="manoeuvre[]" id="' + checkboxId +'"><img src="'+ manoeuvre.imgManoeuvre + '"><label for="' + checkboxId + '">' + manoeuvre.nomManoeuvre + '</label></div>';

                });
                tableauControleOption.push(selection)
                break;
            default:
                console.log('Choisissez une variable de tri !');
        }

        if(selection != "" && tableauControleOption.length < 5){
            var newFieldset = document.createElement('fieldset');
            newFieldset.classList.add('tri')
            var contenuFieldset = '<label for="choix">Ajouter une condition de tri ?</label><select name="choix" class="choix"><option value="" hidden>Choisir une variable de tri</option>'
            
            var optionsFiltrees = filtrerOptions(tableauControleOption, tableauOptions);
            
            contenuFieldset += optionsFiltrees

            contenuFieldset += '</select><button type="button" class="ajouter-variable" aria-label="Cliquez pour ajouter une variable de tri des résultats !"><img src="img/signe-plus-blanc.png" alt="Submit" ></button>';
            
            newFieldset.innerHTML += contenuFieldset
            
            affichage.appendChild(newFieldset);
        }

        affichageContainer.appendChild(affichage);
        ajouterEventListener();
    }

    

    

</script>
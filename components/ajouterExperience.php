<section class="ajouter-experience" id="ajouterExperience">
    <?php if(isset($totalKm) && $totalKm > 0){
        echo "<p class='envoyee'>Félicitations, vous avez déjà parcouru {$totalKm}km !</p>";
    }
    ?>
    <h2>Enregistrer une nouvelle expérience de conduite ?</h2>
    <p>L'application UniConduite permet de suivre votre avancée dans la conduite accompagnée. Grace à elle, vous pouvez voir le nombre de kilomètres effectués, mais aussi le temps passé à vous entraîner à conduire, les types d'exercices réalisés et dans quelles conditions !</p> 
    <p>Tout cela vous permet de vraiment savoir quand vous serez prêt à passer l'examen du permis.</p>
    <button id="lancerForm" aria-label="Cliquez pour commencer à enregistrer une expérience de conduite">
        <img src="img/signe-plus-blanc.png">
    </button>
    
</section>
<section id="sectionForm" class="hidden">
    <h2>Enregistrer votre expérience de conduite</h2>
    <form id="formulaire" action="/Uniconduite-PHP/fonctions/envoiFormulaire.php" method="post">
        <fieldset id="time" class="deux-colonnes">
            <h3>Quand êtes vous parti et revenu ?</h3>
            <div class="gauche">
                <label for="date">Date départ</label>
                <input type="date" id="date" name="date" required>
                <label for="heure" class="heure">Heure départ</label>
                <input type="time" id="heure" name="heure" required> 
            </div>
            <div class="droite">
                <label for="dateR">Date retour</label>
                <input type="date" id="dateR" name="dateR" required>  
                <label for="heureR" class="heure">Heure retour</label>
                <input type="time" id="heureR" name="heureR" required> 
            </div>
        </fieldset>
        <fieldset id="distance" class="">
            <h3>Combien de kilomètres avez-vous roulé ?</h3>
            <div class="centre">
                <label for="km">Kilomètres</label>
                <input type="number" id="km" name="km" pattern="\d+" placeholder="Renseignez les km parcourus" required>
            </div> 
        </fieldset>
        <fieldset id="conditions" class="deux-colonnes">
            <h3> Vous avez roulé...</h3>
            <div class="gauche">
                <label for="meteo">Sous quel météo ?</label>
                <select name="meteo" id="meteo">
                    <option value="" hidden>-- Indiquer la météo --</option>
                    <?php 
                        foreach($listeMeteo as $meteo){
                            echo "<option value='{$meteo['idMeteo']}'>{$meteo['nomMeteo']}</option>" ;
                        };
                    ?>
                </select>
            </div>
            <div class="droite">
                <label for="trafic">Avec quel trafic ? </label>
                <select name="trafic" id="trafic">
                    <option value="" hidden>-- Indiquer le trafic --</option>
                    <?php 
                        foreach($listeTypeTrafic as $trafic){
                            echo "<option value='{$trafic['idTypeTrafic']}'>{$trafic['nomTypeTrafic']}</option>" ;
                        };
                    ?>
                </select>
            </div>
            <div class="gauche checkbox">
                <p>Sur quel type de route ?</p>
                <?php 
                    foreach($listeTypeRoute as $typeRoute){
                        echo "<input type=\"checkbox\" class=\"route-checkbox\" name=\"route[]\" id=\"route{$typeRoute['idTypeRoute']}\" value=\"{$typeRoute['idTypeRoute']}\"><label for=\"route{$typeRoute['idTypeRoute']}\">{$typeRoute['nomTypeRoute']}</label>" ;
                    };
                ?>
            </div>
            <div class="droite checkbox">
                <p>En faisant quelles manoeuvres ?</p>
                <?php 
                    foreach($listeTypeManoeuvres as $manoeuvre){
                        echo "<input type=\"checkbox\" class=\"manoeuvre-checkbox\" name=\"manoeuvre[]\" id=\"manoeuvre{$manoeuvre['idManoeuvre']}\" value=\"{$manoeuvre['idManoeuvre']}\"><label for=\"manoeuvre{$manoeuvre['idManoeuvre']}\">{$manoeuvre['nomManoeuvre']}</label>" ;
                    };
                ?>
            </div>
        </fieldset>
        <button type="submit" id="envoyerForm" aria-label="Cliquez pour enregistrer l'expérience !">
            <img src="img/signe-plus-blanc.png" alt="Submit" >
        </button>
    </form>
</section>
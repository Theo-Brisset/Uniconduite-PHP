<section class="root resultats">
    <div class="deux-colonnes">
        <h2>Voici le récapitulatif des résultats de vos trajets !</h2>
    </div>
    <div class="deux-colonnes">
        <h3>Votre progression au niveau des kilomètres à effectuer :</h3>
        <div class="fond-progression">
           <div class="progression" style="width:<?php echo $totalKm/3000*100 ?>%"></div>
        </div>
        <p>Vous avez déjà roulé <?php echo $totalKm ?> kilomètres sur les 3000 nécessaires !</p>
    </div>
   <div class="deux-colonnes resume">
        <div>
            <h3>Météo</h3>
            <img src="<?php echo $resultatMeteo['img'] ?>">
            <p>Vous avez conduit <strong><?php echo $conditionMaxMeteo['valeur']?> fois</strong> sous un <strong>temps <?php echo $resultatMeteo['nom']?></strong>, cela correspond à <strong><?php echo round($conditionMaxMeteo['valeur']/$nombreTrajets*100)?>%</strong> de vos trajets !<?php ?>
        </div>
        <div>
            <h3>Trafic</h3>
            <img src="<?php echo $resultatTrafic['img'] ?>">
            <p>Vous avez conduit <strong><?php echo $conditionMaxTrafic['valeur']?> fois</strong> avec un <strong>trafic <?php echo $resultatTrafic['nom']?></strong>, cela correspond à <strong><?php echo round($conditionMaxTrafic['valeur']/$nombreTrajets*100)?>%</strong> de vos trajets !<?php ?>
        </div>
        <div>
            <h3>Route</h3>
            <img src="<?php echo $resultatTypeRoute['img'] ?>">
            <p>Vous avez conduit <strong><?php echo $conditionMaxTypeRoute['valeur']?> fois</strong> sur des <strong>routes de type <?php echo $resultatTypeRoute['nom']?></strong>, cela correspond à <strong><?php echo round($conditionMaxTypeRoute['valeur']/$nombreTrajets*100)?>%</strong> de vos trajets !<?php ?>
        </div>
        <div>
            <h3>Manoeuvre</h3>
            <img src="<?php echo $resultatManoeuvre['img'] ?>">
            <p>Vous avez réalisé <strong><?php echo $conditionMaxManoeuvre['valeur']?> fois</strong> la <strong>manoeuvre <?php echo $resultatManoeuvre['nom']?></strong>, cela correspond à <strong><?php echo round($conditionMaxManoeuvre['valeur']/$nombreTrajets*100)?>%</strong> de vos trajets !<?php ?>
        </div>
   </div> 
</section>
<section class="root resultats">
    <div class="deux-colonnes">
        <h2>Voici un peu plus de détails sur les conditions expérimentées lors de vos trajets !</h2>
    </div>
    <div class="gauche">
        <div class="section-resultat">
            <img src="<?php echo $resultatMeteo['img'] ?>">
            <h3>Détails des trajets réalisés par météo</h3>
        </div>
        <div class="fond-progression">
            <?php echo $afficherMeteo ?>
        </div>
        <div class="container-legende">
            <?php 
                foreach($decompterMeteo as $decompteMeteo){
                    echo "<div class=\"legende\"><div class=\"valeur{$decompteMeteo['id']}\"></div><p>Temps {$decompteMeteo['nom']} : {$decompteMeteo['occurence']} expériences</p></div>";;
                } 
            ?>
        </div>
    </div>
    <div class="droite">
        <div class="section-resultat">
            <img src="<?php echo $resultatTrafic['img'] ?>">
            <h3>Détails des trajets réalisés par type de trafic</h3>
        </div>
        <div class="fond-progression">
                <?php echo $afficherTrafic ?>
        </div>
        <div class="container-legende">
            <?php 
                foreach($decompterTrafic as $decompteTrafic){
                    echo "<div class=\"legende\"><div class=\"valeur{$decompteTrafic['id']}\"></div><p>Trafic {$decompteTrafic['nom']} : {$decompteTrafic['occurence']} expériences</p></div>";;
                } 
            ?>
        </div>
    </div>
    <div class="gauche">
        <div class="section-resultat">
            <img src="<?php echo $resultatTypeRoute['img'] ?>">
            <h3>Détails des types de routes traversées lors des trajets</h3>
        </div>
        <div class="fond-progression">
            <?php echo $afficherTypeRoute ?>
        </div>
        <div class="container-legende">
            <?php 
                foreach($decompterTypeRoute as $decompteTypeRoute){
                    echo "<div class=\"legende\"><div class=\"valeur{$decompteTypeRoute['id']}\"></div><p>Type de route {$decompteTypeRoute['nom']} : {$decompteTypeRoute['occurence']} expériences</p></div>";;
                } 
            ?>
        </div>
    </div>
    <div class="droite">
        <div class="section-resultat">
            <img src="<?php echo $resultatManoeuvre['img'] ?>">
            <h3>Détails des manoeuvres réalisées</h3>
        </div>
        <div class="fond-progression">
            <?php echo $afficherManoeuvre ?>
        </div>
        <div class="container-legende">
            <?php 
                foreach($decompterManoeuvre as $decompteManoeuvre){
                    echo "<div class=\"legende\"><div class=\"valeur{$decompteManoeuvre['id']}\"></div><p>Manoeuvre {$decompteManoeuvre['nom']} : {$decompteManoeuvre['occurence']} expériences</p></div>";;
                } 
            ?>
        </div>
    </div>
</section>
<section class="root resultats">
    <div class="deux-colonnes">
        <h2>Voici les trajets enregistrés</h2>
    </div>
    
</section>
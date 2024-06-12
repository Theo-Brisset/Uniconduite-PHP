<?php
    
    //Pour savoir combien de trajets sont enregistrés

    $nombreTrajets = count($trajets);

    //On compte les kilomètres parcourus

    $totalKm = 0;

    foreach($trajets as $trajet){
        $totalKm += $trajet->kilometrage;
        if($totalKm > 3000){
            $totalKm = 3000;
        }
    };    

    //On compte les occurences de chaque condition METEO

    $valeursMeteo = [1,2,3,4,5,6,7,8];

    $occurencesMeteo = compter_occurences($trajets, 'meteo', $valeursMeteo);

    //On compte les occurences de chaque condition TYPE DE TRAFIC

    $valeursTrafic = [1,2,3,4];

    $occurencesTrafic = compter_occurences($trajets, 'trafic', $valeursTrafic);

    //On compte les occurences de chaque TYPE DE ROUTE

    $valeursTypeRoute = [1,2,3,4,5];

    $occurencesTypeRoute = compter_occurences($trajets, 'typeRoute', $valeursTypeRoute);

    //On compte les occurences de chaque MANOEUVRE

    $valeursManoeuvre = [1,2,3];

    $occurencesManoeuvre = compter_occurences($trajets, 'manoeuvres', $valeursManoeuvre);

    //On affiche chaque résultat !

    $afficherMeteo = afficher_repartition_resultat($occurencesMeteo);

    $afficherTrafic = afficher_repartition_resultat($occurencesTrafic);

    $afficherTypeRoute = afficher_repartition_resultat($occurencesTypeRoute);

    $afficherManoeuvre = afficher_repartition_resultat($occurencesManoeuvre);

    //Je veux savoir la valeur max pour les conditions !

    $conditionMaxMeteo = garder_plus_grande_valeur($occurencesMeteo);

    $conditionMaxTrafic = garder_plus_grande_valeur($occurencesTrafic);

    $conditionMaxTypeRoute = garder_plus_grande_valeur($occurencesTypeRoute);

    $conditionMaxManoeuvre = garder_plus_grande_valeur($occurencesManoeuvre);

    //Je veux afficher une img stockée dans une table !

    $resultatMeteo = afficher_resultat($nomMeteo, $conditionMaxMeteo['cle'], 'idMeteo', 'imgMeteo', 'nomMeteo');

    $resultatTrafic = afficher_resultat($nomTypeTrafic, $conditionMaxTrafic['cle'], 'idTypeTrafic','imgTrafic', 'nomTypeTrafic');
    
    $resultatTypeRoute = afficher_resultat($nomTypeRoute, $conditionMaxTypeRoute['cle'], 'idTypeRoute','imgTypeRoute', 'nomTypeRoute');
    
    $resultatManoeuvre = afficher_resultat($nomManoeuvres, $conditionMaxManoeuvre['cle'], 'idManoeuvre','imgManoeuvre','nomManoeuvre');

    //Je veux afficher une img stockée dans une table !

    $decompterMeteo = compter_valeur($occurencesMeteo, $occurencesMeteo[$element], $mapMeteo, 'nomMeteo');

?>

<?php 

    //On définit les deux fonctions que l'on va créer :
    // compter_occurences qui permet de compter le nombre de fois où l'on retrouve les différents ID en fonction des tables
    // afficher_resultat qui va permettre de créer un affichage pour la répartition en pourcentage des différents ID en fonction des tables et afficher une barre de visualisation

    function compter_occurences($trajets, $colonne, $valeurs){
        $compte = array_fill_keys($valeurs, 0);
        foreach($trajets as $trajet){
            $elements = explode(',', $trajet->$colonne); //permet de gérer les tables  où il y a un tableau de résultats car plusieurs résultats sont selectionnables
            foreach($elements as $element){
                if (in_array($element, $valeurs)){
                    $compte[$element]++;
                }
            }
        }
        return $compte ;
    };

    function afficher_repartition_resultat($occurences){ //On utilise le paramètre d'occurences calculé plus haut pour faire une fonction qui affiche les résultats automatiquement !
        $occurencesTotal = array_sum($occurences); //pour définir ce qui est 100% des expériences
        $remplissage = []; //réinitialiser le tableau de remplissage à chaque lancement de la fonction

        foreach ($occurences as $valeur => $compte) {
            $remplissage[$valeur]=($compte/$occurencesTotal)*100; //Permet de définir la valeur des occurences de chaque condition (en %) 
        }

        $positionnementCompteur = 0; //Pour définir où la condition doit se positionner. Peut être que ce serait mieux de la définir au niveau class CSS grâce à la classe valeur{$valeur} ?
        $remplissageHtml = ''; //Variable qui va stocker les résultats de la boucle foreach

        foreach ($remplissage as $valeur => $pourcentage) {
            $positionnement = $positionnementCompteur; //permet le décalage à gauche de chaque condition
            $positionnementCompteur += $pourcentage;
            if($pourcentage > 0){ //on veut afficher seulement les conditions qui ont des trajets
                $remplissageHtml .= "<div class='remplissage meteo valeur{$valeur}' style='width: {$pourcentage}%; left: {$positionnement}%;'><p>{$occurences[$valeur]}</p></div>";
            }        
        } 
        return $remplissageHtml;
    }

    function garder_plus_grande_valeur($tableau){
        $valeurMaximum = max($tableau);
        $cleAssociee = array_search($valeurMaximum, $tableau, true);
        return [
            "cle" => $cleAssociee,
            "valeur" => $valeurMaximum
        ];
    }

    function afficher_resultat($conditions, $conditionMaxCle, $conditionId, $nomImg, $nomCondition) {
        foreach ($conditions as $condition) {
            if ($condition[$conditionId] == $conditionMaxCle) {
                return [
                    "img" => $condition[$nomImg],
                    "nom" => $condition[$nomCondition]
                ];
            };
        }
        return 'Image non trouvée';
    }

    function compter_valeur($occurences, $tableau){
        $detail = array();
        foreach ($occurences as $id => $occurence) {
            $detail[$id] = array(
                "id" => $id,
                "occurence" => $occurence,
                "nom" => isset($tableau[$id]) ? $tableau[$id] : "Inconnu"
            );
        }
        return $detail;
    }

    
?>
<?php
include('connectDBclass.inc.php');

$resultatMeteo = [];
$resultatTrafic = [];
$resultatRoute = [];
$resultatManoeuvre = [];

$conditions = []; //va stocker la phrase de requete SQL spécifique à la condition
$types = ''; //va stocker le type de donnée (int, string...)
$parametres = []; //va stocker les value des checkbox rentrées par la personne, utilisé pour les bind_param plus bas

//On rempli les 3 tableaux pour chacune des conditions 

if(isset($_POST['km'])){
    $km = $_POST['km'];

    $placeholdersKm = '?';

    $conditions[] = "Trajets.Kilometrage > $placeholdersKm" ;

    $types .= 'i';

    $parametres[] = $km;
}

if(isset($_POST['meteo'])){
    $meteo = $_POST['meteo'];

    $placeholdersMeteo = implode(',', array_fill(0, count($meteo), '?'));

    $conditions[] = "idMeteo IN ($placeholdersMeteo)";

    $types .= str_repeat('i', count($meteo));

    $parametres = array_merge($parametres, $meteo);

}



if(isset($_POST['trafic'])){
    $trafic = $_POST['trafic'];

    $placeholdersTrafic = implode(',', array_fill(0, count($trafic), '?'));

    $conditions[] = "idTypeTrafic IN ($placeholdersTrafic)";

    $types .= str_repeat('i', count($trafic));

    $parametres = array_merge($parametres, $trafic);

}



if(isset($_POST['route'])){
    $route = $_POST['route'];

    $placeholdersRoute = implode(',', array_fill(0, count($route), '?'));

    $conditions[] = "TrajetsRoutes.idTypeRoute IN ($placeholdersRoute)";

    $types .= str_repeat('i', count($route));

    $parametres = array_merge($parametres, $route);

}



if(isset($_POST['manoeuvre'])){
    $manoeuvre = $_POST['manoeuvre'];

    $placeholdersManoeuvre = implode(',', array_fill(0, count($manoeuvre), '?'));

    $conditions[] = "TrajetsManoeuvres.idManoeuvre IN ($placeholdersManoeuvre)";

    $types .= str_repeat('i', count($manoeuvre));

    $parametres = array_merge($parametres, $manoeuvre);

}

//On construit la requête SQL "de base" qui va permettre de récupérer les informations issues d'autres tables
$requete = "SELECT DISTINCT 
                Trajets.idTrajet,
                Trajets.Kilometrage,
                Trajets.dateDepart,
                Trajets.dateRetour,
                Trajets.dureeEnHeures,
                Trajets.idMeteo,
                Trajets.idTypeTrafic,
        GROUP_CONCAT(DISTINCT TrajetsRoutes.idTypeRoute ORDER BY TrajetsRoutes.idTypeRoute) AS idTypesRoute,
        GROUP_CONCAT(DISTINCT TrajetsManoeuvres.idManoeuvre ORDER BY TrajetsManoeuvres.idManoeuvre) AS idManoeuvres
        FROM Trajets
        LEFT JOIN TrajetsRoutes ON Trajets.idTrajet = TrajetsRoutes.idTrajet
        LEFT JOIN TypeRoute ON TrajetsRoutes.idTypeRoute = TypeRoute.idTypeRoute
        LEFT JOIN TrajetsManoeuvres ON Trajets.idTrajet = TrajetsManoeuvres.idTrajet
        LEFT JOIN Manoeuvres ON TrajetsManoeuvres.idManoeuvre = Manoeuvres.idManoeuvre
        WHERE Trajets.actifTrajet = 1";

if(!empty($conditions)){
    $requete .= ' AND ' . implode(' AND ', $conditions); //va rassembler les éléments du tableaux conditions, qui regroupe les requetes par conditions avec entre chacune AND pour séparateur
}

$requete .= " GROUP BY Trajets.idTrajet";

//La requête est prête, il faut désormais l'exécuter !

$executerRequete = $mysqliObject->prepare($requete);

$parametres = array_merge([$types], $parametres);

call_user_func_array([$executerRequete, 'bind_param'], refValues($parametres));

$executerRequete->execute();

$resultatRequete = $executerRequete->get_result();

$resultats = $resultatRequete->fetch_all(MYSQLI_ASSOC);

function refValues($tableau){
    $references = [];
    foreach($tableau as $cle => $valeur){
        $references[$cle] = &$tableau[$cle];
    }

    return $references;
}

class Retour{
    public $idTrajet;
    public $kilometrage;
    public $date;
    public $duree;
    public $meteo;
    public $trafic;
    public $typeRoute;
    public $manoeuvres;

    public function __construct($idTrajet, $kilometrage, $date, $duree, $meteo, $trafic, $typeRoute, $manoeuvres){
        $this->idTrajet = $idTrajet;
        $this->kilometrage = $kilometrage;
        $this->date = $date;
        $this->duree = $duree;
        $this->meteo = $meteo;
        $this->trafic = $trafic;
        $this->typeRoute = $typeRoute;
        $this->manoeuvres = $manoeuvres;
    }
}

$retours = [];

foreach($resultats as $resultat){
    $retours[] = new Retour(
        $resultat['idTrajet'],
        $resultat['Kilometrage'],
        $resultat['dateDepart'],
        $resultat['dureeEnHeures'],
        $resultat['idMeteo'],
        $resultat['idTypeTrafic'],
        $resultat['idTypesRoute'],
        $resultat['idManoeuvres']
    );

}


?>
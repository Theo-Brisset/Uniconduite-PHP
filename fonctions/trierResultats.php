<?php
include('connectDBclass.inc.php');

$resultatMeteo = [];
$resultatTrafic = [];
$resultatRoute = [];
$resultatManoeuvre = [];



if(isset($_POST['meteo'])){
    $meteo = $_POST['meteo'];

    $placeholdersMeteo = implode(',', array_fill(0, count($meteo), '?'));

    $requeteMeteo = "SELECT * FROM `Trajets` WHERE `idMeteo` IN ($placeholdersMeteo) AND `actifTrajet` = 1 ";
    
    $declarationMeteo = $mysqliObject->prepare($requeteMeteo);

    $typesMeteo = str_repeat('i', count($meteo));

    $declarationMeteo->bind_param($typesMeteo, ...$meteo);

    $declarationMeteo->execute();

    $declarationMeteo = $declarationMeteo->get_result();

    $declarationMeteo = $declarationMeteo->fetch_all(MYSQLI_ASSOC);

    $resultatMeteo[] = $declarationMeteo;
}



if(isset($_POST['trafic'])){
    $trafic = $_POST['trafic'];
    print_r($trafic);

    $placeholdersTrafic = implode(',', array_fill(0, count($trafic), '?'));

    $requeteTrafic = "SELECT * FROM `Trajets` WHERE `idTypeTrafic` IN ($placeholdersTrafic) AND `actifTrajet` = 1 ";
    
    $declarationTrafic = $mysqliObject->prepare($requeteTrafic);

    $typesTrafic = str_repeat('i', count($trafic));

    $declarationTrafic->bind_param($typesTrafic, ...$trafic);

    $declarationTrafic->execute();

    $declarationTrafic = $declarationTrafic->get_result();

    $declarationTrafic = $declarationTrafic->fetch_all(MYSQLI_ASSOC);

    $resultatTrafic[] = $declarationTrafic;
}



if(isset($_POST['route'])){
    $route = $_POST['route'];

    $placeholdersRoute = implode(',', array_fill(0, count($route), '?'));

    $requeteRoute = "SELECT * FROM `Trajets` 
                    JOIN `TrajetsRoutes` ON `Trajets.idTrajet` = `TrajetsRoutes.idTrajet`
                    JOIN `TypeRoute` ON `TrajetsRoutes.idTypeRoute` = `TypeRoute.idTypeRoute`
                    WHERE
                    `Trajets.Kilometrage` > 20 AND `TypeRoute.nomTypeRoute` = 'Autoroute' AND `actifTrajet` = 1 
                    WHERE `TrajetsRoutes.idTypeRoute` IN ($placeholdersRoute)";
    
    $declarationRoute = $mysqliObject->prepare($requeteRoute);

    $typesRoute = str_repeat('i', count($route));

    $declarationRoute->bind_param($typesRoute, ...$route);

    $declarationRoute->execute();

    $declarationRoute = $declarationRoute->get_result();

    $declarationRoute = $declarationRoute->fetch_all(MYSQLI_ASSOC);

    $resultatRoute[] = $declarationRoute;
}



if(isset($_POST['manoeuvre'])){
    $manoeuvre = $_POST['manoeuvre'];

    $placeholdersManoeuvre = implode(',', array_fill(0, count($manoeuvre), '?'));

    $requeteManoeuvre = "SELECT * FROM `Trajets` WHERE `idsManoeuvres` IN ($placeholdersManoeuvre) AND `actifTrajet` = 1 ";
    
    $declarationManoeuvre = $mysqliObject->prepare($requeteManoeuvre);

    $typesManoeuvre = str_repeat('i', count($manoeuvre));

    $declarationManoeuvre->bind_param($typesManoeuvre, ...$manoeuvre);

    $declarationManoeuvre->execute();

    $declarationManoeuvre = $declarationManoeuvre->get_result();

    $declarationManoeuvre = $declarationManoeuvre->fetch_all(MYSQLI_ASSOC);

    $resultatManoeuvre[] = $declarationManoeuvre;
}


// $route = $_POST['route'];

// print_r($route);

// $manoeuvres = $_POST['manoeuvre'];

// print_r($manoeuvres);


// header("Location: /Uniconduite-PHP/affichageTri.php");

print_r($resultatMeteo);
echo "<p>___________</p><br>";
print_r($resultatTrafic);
echo "<p>___________</p><br>";
print_r($resultatRoute);
echo "<p>___________</p><br>";
print_r($resultatManoeuvre);

?>
<?php
    session_start();
    
    include("fonctions/connectDBclass.inc.php");
    include("fonctions/ajoutListesChoix.php");
    include("fonctions/recupererResultat.php");
    if(!empty($trajets)){
        include("fonctions/fonctionsResultat.php");
        include("fonctions/afficherResultat.php");
    };
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset = "utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>UniConduite</title>
        <link rel="icon" href="img/roue-de-voiture.png" type="image/x-icon">
        <link href="styles/reset.css" rel="stylesheet">
        <link href="styles/style.css" rel="stylesheet">
        <link href="styles/style-dashboard.css" rel="stylesheet">
        <link href="styles/style-afficher-resultats.css" rel="stylesheet">
        <link href="styles/style-1350px.css" rel="stylesheet">
        <link href="styles/style-800px.css" rel="stylesheet">
        
    
<?php 
    include_once("components/head.php");
    include("fonctions/trierResultats.php");
?>

</head>
<!-- NE PAS MODIFIER LE CODE CI-APRES -->
<body>
    
    <?php
        include("components/header.php");
    ?>
    <main>
    <section class="root resultats">
        <div class="deux-colonnes">
        <h2><?php echo $count = count($retours); ?> trajets trouvés !</h2>
        <?php if($count > 0): ?>
            <?php foreach ($retours as $retour): ?>
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">
                                Trajet n°<?php echo htmlspecialchars($retour->idTrajet); ?>
                            </th>
                        </tr> 
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kilomètres</td>
                            <td><?php echo htmlspecialchars($retour->kilometrage); ?>km</td>
                        </tr>
                        <tr>
                            <td>Date du trajet</td>
                            <td><?php $dateFormat = date("d/m/Y", strtotime($retour->date)); echo htmlspecialchars($dateFormat); ?></td>
                        </tr>
                        <tr>
                            <td>Durée du trajet</td>
                            <td><?php echo htmlspecialchars($retour->duree); ?></td>
                        </tr>
                        <tr>
                            <td>Météo</td>
                            <td><?php echo $afficherNomMeteo = recuperer_nom($retour->meteo, $decompterMeteo); ?></td>
                        </tr>
                        <tr>
                            <td>Trafic</td>
                            <td><?php echo $afficherNomTrafic = recuperer_nom($retour->trafic, $decompterTrafic); ?></td>
                        </tr>
                        <tr>
                            <td>Routes</td>
                            <td><?php echo $afficherNomTypeRoute = recuperer_nom($retour->typeRoute, $decompterTypeRoute); ?></td>
                        </tr>
                        <tr>
                            <td>Manoeuvres</td>
                            <td><?php echo $afficherNomManoeuvres = recuperer_nom($retour->manoeuvres, $decompterManoeuvre); ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Vous n'avez effectué aucun trajets réunissant les conditions spécifiées. Voilà une raison de continuer à vous entraîner !</p>
        <?php endif; ?>
        <a href="dashboard.php" class="button">Revenir aux résultats</a>
        </div>
        
    </section>
    </main>   
<?php
    include_once("components/footer.php")
?>

<?php 
    include_once("components/head.php");
    include("fonctions/afficherVariableTri.php");
?>
    <script src="script/trierResultats.js" defer></script>
</head>
<!-- NE PAS MODIFIER LE CODE CI-APRES -->
<body>
    
        <?php
            include("components/header.php");
        ?>
        <main>
        <?php
            if(!isset($_SESSION["pseudo"])){
                include("components/messageConnect.php");
            } else {
                if(empty($trajets)){
                    include("components/sectionNoTrajets.php");
                } else {
                    include("components/sectionResultatsTrajets.php");
                }
            }
        ?>
    </main>   
<?php
    include_once("components/footer.php")
?>

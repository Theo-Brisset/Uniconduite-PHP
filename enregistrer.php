<?php
    include("components/head.php");
    if(isset($_SESSION["pseudo"])){
        echo "<script src=\"script/afficherFormulaire.js\"></script>";
        echo "<script src=\"script/gestionCheckbox.js\"></script>";
    }
?>
    
</head>
<body>
    <?php
        include("components/header.php");
    ?>

    <main>
        <?php
            if(!isset($_SESSION["pseudo"])){
                include("components/messageConnect.php");
            } else {
                include("components/ajouterExperience.php");
            }
            ?>
            
    </main>
    <?php
        include_once("components/footer.php")
    ?>

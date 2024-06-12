<?php 
    include_once("head.php");
?>
</head>
<!-- NE PAS MODIFIER LE CODE CI-APRES -->
<body>
    <?php
        include("header.php");
    ?>
    <?php
        if(empty($trajets)){
            include("sectionNoTrajets.php");
        } else {
            include("sectionResultatsTrajets.php");
        }
    ?>
        
<?php
    include_once("footer.php")
?>

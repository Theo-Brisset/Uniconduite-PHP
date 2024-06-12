<?php
    include("components/head.php");
?>
</head>
<body>
    <?php
        include("components/header.php");
    ?>
    <main>
        <?php
        if (!isset($_SESSION["pseudo"])) {
            include("components/sectionConnect.php");
        } elseif ($_SESSION["pseudo"] != "") {
            include("components/sectionDisconnect.php");
        }
        ?>
    </main>
    <?php
        include_once("components/footer.php")
    ?>


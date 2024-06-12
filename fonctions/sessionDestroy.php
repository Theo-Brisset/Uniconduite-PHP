<?php
    session_start();
    $_SESSION["pseudo"]="";
    session_destroy();
    header("Location: /Uniconduite-PHP/index.php");
?>
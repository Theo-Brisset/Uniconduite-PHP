<?php 

session_start();

include("connectDBclass.inc.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $inputNomUser = trim($_POST["mail"]);
    $inputMdpUser = trim($_POST["mdp"]);

    $requeteSQL = "SELECT idUser, pseudoUser, mailUser, mdpUser FROM users WHERE mailUser = ?";
    $stmt = $mysqliObject->prepare($requeteSQL);
    $stmt->bind_param("s", $inputNomUser);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0){
        $stmt->bind_result($id, $pseudoUser, $nomUser, $mdpUser);
        $stmt->fetch();

        if($inputMdpUser == $mdpUser){
            $_SESSION["pseudo"] = $pseudoUser;
            header("Location: /Uniconduite-PHP/enregistrer.php");
            exit();
        } else{
            echo "Mot de passe incorrect ! On attend le mot de passe :" . $mdpUser . "Vous avez enregistré :" . $inputMdpUser;
        }
        
    } else {
        echo "Nom d'utilisateur incorrect !";
    }

    $stmt->close();

}
?>
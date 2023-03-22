<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <?php
    include 'functions.php';
    try {

        $ipserver = "192.168.65.112";
        $nomBase = "Messagerie";
        $loginPrivilege = "siteWeb";
        $passPrivilege = "siteWeb";

        $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

        formulaireAffichageConnexion();
            
            if(isset($_POST['envoyerInscription'])){
                formulaireAffichageInscription();
            }
    } catch (Exception  $error) {
        echo "error est : " . $error->getMessage();
    }










    /* if (afficheFormulaire($login, $mdp, $pseudo) == true) {
        //on affiche le site (messagerie)
    } else if (isset($_POST['formInscription'])) {
        //on affiche le formulaire d'inscription
        formulaireAffichageInscription();
    } else {
        //on affiche le form de connexion et le bouton qui redirige vers le formulaire d'inscription
    }*/
    ?>
</body>

</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?php

try {

    $ipserver ="192.168.65.112";
    $nomBase = "Messagerie";
    $loginPrivilege ="siteWeb";
    $passPrivilege ="siteWeb";

    $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);
        include 'functionTest.php';
        formulaireAffichageConnexion();

    } catch (Exception  $error) {
        echo "error est : ".$error->getMessage();
    }
    ?>
</body>
</html>
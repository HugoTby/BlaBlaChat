<?php
    session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Messeng-Wish</title>
    <link href='style2.css' rel='stylesheet'>
</head>

<body>
    <?php
    include 'functionTest.php';
    try {

        $ipserver ="192.168.65.112";
        $nomBase = "Messagerie";
        $loginPrivilege ="siteWeb";
        $passPrivilege ="siteWeb";
    
        $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);
        if(isset($_POST["Deconnexion"]))
        {   
            //Si on appuie sur le bouton "Deconnexion", on supprime les données de la session et on la détruit.
            session_unset();
            session_destroy();
        }

        if($connect == true)
        {
            echo 'cc';
        ?>       
            <form action="" method="post" class="form-example">
                <div class="form-example">
                    <input type="submit" value="Deconnexion" name="Deconnexion" >
                </div>
            </form>
    
        <?php
        }
        else{
            formulaireAffichageConnexion();
        }
        
    } catch (Exception  $error) {
        echo "error est : ".$error->getMessage();
    }
?>
</body>

<?php

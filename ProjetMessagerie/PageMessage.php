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
        if(!isset($_SESSION["id"])){
            ?>
            <meta http-equiv="refresh" content="0;url=PageConnexion.php">
            <?php
        }

        
        $ipserver ="192.168.65.112";
        $nomBase = "Messagerie";
        $loginPrivilege ="siteWeb";
        $passPrivilege ="siteWeb";
    
        $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);
    
        $scroll=true;
        $requete = "select * from User";
        $resultat = $GLOBALS["pdo"]->query($requete);
        //resultat est du coup un objet de type PDOStatement
        $tabUser = $resultat->fetchALL();

        $idUser=$_SESSION["id"];

        if(isset($_POST["Deconnexion"]))
        {
            session_unset();
            session_destroy();
            ?>
            <meta http-equiv="refresh" content="0;url=PageConnexion.php">
            <?php

        }
        ?>
            <div id="droite">
                <form method="post" style="text-align: center">
                    <input type="text" name="zoneMessage" placeholder="Ecrivez votre message">
                    <input type="submit" value="Envoyer" name="Valider" >
                    <input type="submit" name="Deconnexion" value="Deconnexion" style="background-color:red">
                </form>
            </div>
            
        <?php
         
            if(isset($_POST["Valider"])){
                //COMME J'AI LES 2 ID
                //je fait une requet pour faire un insert into consultation .... value ( 'idmedecin', 'idpatien', 'date')
                 
                    $requeteConsultation = "INSERT INTO `Message` (`dateHeure`, `idUser`, `message`) VALUES (now() ,$idUser,'" .$_POST['zoneMessage']. "')";
                    $result2 = $GLOBALS["pdo"]->query($requeteConsultation);
                
            }

            
            $requete = "select * from Message";
            $resultat = $GLOBALS["pdo"]->query($requete);
            //resultat est du coup un objet de type PDOStatement
            $tabMessage = $resultat->fetchALL();
            ?>
            <div id="bas" style="overflow-x: hidden; overflow-y: scroll; border:#000000 1px solid; width: 60%; height: 95vh;">
            <?php
            foreach ($tabMessage as $Message )
            {
                afficheMessage($Message["id"]);
                
            }
        ?>
        </div>
        <?php
            
        
        
    } catch (Exception  $error) {
        echo "error est : ".$error->getMessage();
    }

    ?>



    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>
        var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
            e.preventDefault();
        });
    </script>
    
    <script>
    function mettre_curseur_en_bas(){
        obj=document.getElementById('bas');
        obj.scrollTop = obj.scrollHeight;
    }
    window.onload = mettre_curseur_en_bas();
    </script>

    <script>
        setInterval(function() {
            $.ajax({
                url: 'PageMessage.php',
                success: function(data) {
                    // mettre à jour le contenu de la page avec les données reçues
                    $('#bas').html(data);
                }
            });
        }, 1000);

    </script>
    

</body>

</html>

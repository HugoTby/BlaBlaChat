<?php
function afficheMessage($id)
{
    $requete = "select User.pseudo from User, Message where Message.idUser = User.id and Message.id=$id";
    $nomPseudo = $GLOBALS["pdo"]->query($requete);
    $requete2 = "select Message.message from User, Message where Message.idUser = User.id and Message.id=$id";
    $contenuMessage = $GLOBALS["pdo"]->query($requete2);
    $requete3 = "select Message.dateHeure from User, Message where Message.idUser = User.id and Message.id=$id";
    $date = $GLOBALS["pdo"]->query($requete3);
?>
    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
        <div class="card mb-2">
            <div class="card-body p-2 p-sm-3">
                <div class="media forum-item">
                    <p class="media-body" style="font-size:20px"><strong><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" />
                        <?php
                        foreach ($nomPseudo as $pseudo) {
                            echo $pseudo['pseudo'] . "</strong> </p>";
                        }; ?>
                    <div class="media-body">

                        <p class="text-secondary" style="font-size:15px">
                            <?php
                            foreach ($contenuMessage as $message) {
                                echo $message["message"];
                            }; ?>
                        
                        </p>
                        <p class="text-muted" style="font-size:7px"><span class="text-secondary font-weight-bold">
                                <?php
                                foreach ($date as $dateAc) {
                                    echo $dateAc["dateHeure"];
                                }; ?>
                    </div>
                    </span></p>
                </div>
            </div>
        </div>
    </div>

<?php
}


function caca(){

    $requete = "select * from User";
    $resultat = $GLOBALS["pdo"]->query($requete);
    //resultat est du coup un objet de type PDOStatement
    $tabUser = $resultat->fetchALL();


    
    ?>
        <div id="droite">
        <form method="post" style="text-align: center">
            <input type="text" name="zoneMessage" placeholder="Ecrivez votre message">
            <input type="submit" value="Envoyer" name="Valider" >
        </form>
        </div>
        <?php
     
        if(isset($_POST["Valider"])){
            //COMME J'AI LES 2 ID
            //je fait une requet pour faire un insert into consultation .... value ( 'idmedecin', 'idpatien', 'date')
             
                $requeteConsultation = "INSERT INTO `Message` (`dateHeure`, `idUser`, `message`) VALUES (now() ,4,'" .$_POST['zoneMessage']. "')";
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
<?php
}



function formulaireAffichageInscription()
{
    ?>

    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 750px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input[type="submit"] {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        .button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 600px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: red;
            color: black;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }
    </style>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <?php
    $requete9 = "select login from User";
    $resultat9 = $GLOBALS["pdo"]->query($requete9);
    $tabLogin = $resultat9->fetchALL();

    ?>
    <form action="" method="post">
        <h3>Inscription</h3>

        <label for="username">Login</label>
        <input type="text" placeholder="Login" name="login" min="1" max="20">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" min="1" max="20">

        <label for="password">Confirmer Password</label>
        <input type="password" placeholder="Password" name="password2" min="1" max="20">

        <label for="username">Pseudo</label>
        <input type="text" placeholder="Pseudo" name="pseudo" min="1" max="20">

        <input type="submit" name="inscription" value="Inscription"></input>
        <div class="social">
            <?php
            if (isset($_POST["inscription"])) {
                if ($_POST["password"] != $_POST["password2"]) {
                    ?>
                    <div class="go">Mots de passe non-identiques !!!!</div><?php
                }
            }
            if (isset($_POST["inscription"])) {
                if (strlen($_POST["pseudo"]) < 1 or strlen($_POST["password"]) < 1 or strlen($_POST["login"]) < 1) {
                    ?>
                    <div class="go">Il faut rentrer un minimum de 1 caractere !!!!</div><?php
                }
            }
            if (isset($_POST["inscription"])) {
                if ($_POST["password"] == $_POST["password2"]) {
                    if (strlen($_POST["pseudo"]) >= 1 and strlen($_POST["password"]) >= 1 and strlen($_POST["login"]) >= 1) {
                        foreach ($tabLogin as $login) {
                            if ($login['login'] == $_POST["login"]) {
                                $loginExist = true;
                                break;
                            } else {
                                $loginExist = false;
                            }
                        }
                        if ($loginExist == false) {
                            ?>
                            <div class="go" style="background-color:green">Inscription réussie !!</div>
                            <meta http-equiv="refresh" content="0;url=PageConnexion.php">

                            <?php
                            
                        } else {
                            ?>
                            <div class="go">Login déjà existant</div><?php
                        }
                    }
                }
            }
            ?>

        </div>


    </form>

    <!-- partial -->
    <?php

    if (isset($_POST["inscription"])) {
        if ($_POST["password"] != $_POST["password2"]) {
            $MotDePasseIdentique = false;
        } else {
            if (strlen($_POST["pseudo"]) >= 1 and strlen($_POST["password"]) >= 1 and strlen($_POST["login"]) >= 1) {
                foreach ($tabLogin as $login) {
                    if ($login['login'] == $_POST["login"]) {
                        $loginExist = true;
                        break;
                    } else {
                        $loginExist = false;
                    }
                }

                if ($loginExist == false) {
                    $requeteConsultation = "INSERT INTO `User` (`login`, `password`, `pseudo`) VALUES ('" . $_POST['login'] . "','" . $_POST['password'] . "','" . $_POST['pseudo'] . "')";
                    $result2 = $GLOBALS["pdo"]->query($requeteConsultation);
                    $MotDePasseIdentique = true;
                }
            }
        }
    }
}



function formulaireAffichageConnexion()
{
    ?>

    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 600px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input[type="submit"] {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        #boutton2 {
            margin-top: 50px;
            width: 100%;
            background-color: #99A3A4;
            color: black;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        .button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 600px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: red;
            color: black;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }
    </style>
    
    <?php

    $requete = "select * from User";
    $resultat = $GLOBALS["pdo"]->query($requete);
    //resultat est du coup un objet de type PDOStatement

    $tabUser = $resultat->fetchALL();
    $EtatMdp = false;
    $EtatLogin = false;
    if ($EtatMdp != true && $EtatLogin != true) {

    ?>

        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form method="post">
            <h3>Connexion</h3>

            <label for="username">Username</label>
            <input type="text" placeholder="Login" name="login">

            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password">
            <input type="submit" name="envoyer" value="Connexion"></input>
            <input type="submit" id="boutton2" formaction="http://192.168.65.112/ProjetMessagerie/FormulaireInscription.php" value="Inscrivez-vous ici !"></input>

            <div class="social">
                <?php

                if (isset($_POST['envoyer'])) {
                    foreach ($tabUser as $User) {
                        if ($User['login'] == $_POST['login']) {
                            $EtatLogin = 1;
                            $IdLogin = $User['id'];

                            break;
                        } else {
                            $EtatLogin = false;
                            $IdLogin = NULL;
                        }
                    }
                    if ($EtatLogin == false) {
                ?><div class="go">Login incorrect</div><?php
                                                    }
                } else {
                    $EtatLogin = false;
                }

                if ($EtatLogin == 1) {
                    $requete = "SELECT `password` FROM `User` WHERE id=$IdLogin";
                    $mdpCorrect = $GLOBALS["pdo"]->query($requete);
                    foreach ($mdpCorrect as $MDP) {
                    }
                    if ($MDP['password'] == $_POST['password']) {
                        $EtatMdp = true;
                    } else {
                        $EtatMdp = false;
                        ?><div class="go">Mot de passe incorrect</div><?php
                    }
                }else {
                    $EtatMdp = false;
                }

                if (isset($_POST['envoyer']) && $EtatMdp == true && $EtatLogin == true) {
                    $_SESSION["id"] = $IdLogin;
                    ?><div class="go" style="background-color : green">connexion réussie</div>
                    <meta http-equiv="refresh" content="0;url=PageMessage.php">
                    <?php
                
                    return true;
                } else {
                    return false;
                }
       
    }

        ?>
        </div>
        </form>
    <?php



}
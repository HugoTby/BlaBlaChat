<?php
// Récupération de l'IP pour la comparé a une blacklist, on refuse l'accès en cas de correspondance
$ip = $_SERVER['REMOTE_ADDR'];
$info = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

if (array_key_exists($ip, $blacklist)) {
    $ip_adress_list = $blacklist[$ip];
    echo "
    <div class='center'>
        <div class='error'>
            Désolé, l'accès à ce site vous est refusé<br><br>
            Votre adresse IP est : <strong>" . $ip . "</strong>, elle appartient à <strong><mark style='border-radius:2px;padding:2px'>" . $ip_adress_list . "</mark></strong><br><br>
            Si cette erreur apparaît, il est probable que votre adresse IP ait été mise sur liste noire par les développeurs de ce site, ou qu'elle soit incompatible avec l'utilisation du site.<br><br>
            Pour corriger cette erreur, veuillez contacter un administrateur du site ou votre administrateur réseau.
        </div>
    </div>";
} elseif (property_exists($info, 'country') && $info->country === "FR" or ($ip == in_array($ip, $whitelist) || strpos($ip, '192.168.') === 0)) {


    // Définit la durée de vie du cookie de session à 10 minutes
    session_set_cookie_params(600);

    // Démarre la session
    session_start();

    // Vérifie si la session est inactive depuis plus de 10 minutes
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
        // Si oui, détruit la session
        session_unset();
        session_destroy();
    }

    // Met à jour le timestamp de la dernière activité
    $_SESSION['LAST_ACTIVITY'] = time();



    include("class/User.php");
    include("class/Message.php");
    include("class/serverClasse.php");

?>

    <!DOCTYPE html>
    <html lang="fr" oncontextmenu="return true;">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/info.css' rel='stylesheet'>
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
        <script type="text/javascript" src="main.js"></script>
        <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/0/05/Google_Messages_logo.svg" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>BlaBlaChat</title>
    </head>

    <body>

        <?php
        $pdo = new PDO('mysql:host=192.168.65.25;dbname=blablachat', 'root', 'root');
        $User1 = new user(null, null, null, null, null, null, null, null);
        $Mess = new message(null, null, null, null);
        $SERV = new server1(null, null);
        $bdd = $pdo;

        if (!$User1->isConnect()) {
            header("Location: connexion/index.php");
        }
        $id = $_SESSION['id'];
        $User1->getUserById($id);
        //$_SESSION['idServer'];
        $Mess->getIdServer($_SESSION['id']);


        if (isset($_POST["deco"])) {
            session_unset();
            session_destroy();
            header("Location: connexion/index.php");
        }

        if ($_SESSION['idServer'] == NULL) {
            $requeteServ = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "'";
            $resultServ = $GLOBALS["pdo"]->query($requeteServ);
            $servNum = $resultServ->fetch();
            $idDuServer = $servNum['id'];
            $_SESSION['idServer'] = $servNum['id'];
            $_SESSION['saveSession'] = $servNum['id'];
        }

        if (isset($_POST['FAQ'])) {
            $_SESSION['idServer'] = 15;
        }
        if (isset($_POST['Humour'])) {
            $_SESSION['idServer'] = 14;
        }
        if (isset($_POST['Gaming'])) {
            $_SESSION['idServer'] = 13;
        }
        if (isset($_POST['General'])) {
            $_SESSION['idServer'] = 12;
        }
        if (isset($_POST['E2'])) {
            $_SESSION['idServer'] = 6;
        }
        if (isset($_POST['E1'])) {
            $_SESSION['idServer'] = 5;
        }
        if (isset($_POST['SN2'])) {
            $_SESSION['idServer'] = 2;
        }
        if (isset($_POST['SN1'])) {
            $_SESSION['idServer'] = 1;
        }



        $idSession = $_SESSION['id'];
        if (isset($_POST['envoiMess']) and strlen($_POST_["contenuMess"] == 0)) {
            $requeteMess = "INSERT INTO `message` (`date`, `contenu`, `idServer`, `idUser`) VALUES ('" . date('Y-m-d H:i:s') . "', '" . $_POST['contenuMess'] . "', '" . $_SESSION['idServer'] . "', '" . $idSession . "')";
            $resultMess = $GLOBALS["pdo"]->query($requeteMess);
        }

        if (isset($_POST['submitGUILD'])) {

            if ($_POST['General'] == NULL) {
                $_POST['General'] = 'NULL';
            }
            if ($_POST['Humour'] == NULL) {
                $_POST['Humour'] = 'NULL';
            }
            if ($_POST['Gaming'] == NULL) {
                $_POST['Gaming'] = 'NULL';
            }
            if ($_POST['FAQ'] == NULL) {
                $_POST['FAQ'] = 'NULL';
            }
            $requeteServ = "UPDATE `user` SET `general`=" . $_POST['General'] . ",`gaming`=" . $_POST['Gaming'] . ",`humour`=" . $_POST['Humour'] . ",`faq`=" . $_POST['FAQ'] . " WHERE id= '" . $_SESSION['id'] . "';";
            $resultServ = $GLOBALS["pdo"]->query($requeteServ);
            $_SESSION['idServer'] = $_SESSION['saveSession'];
        }
        if (isset($_POST['boutonEnvoiModif'])) {
            $requeteModif = "UPDATE user SET nom='" . $_POST['nom'] . "', prenom='" . $_POST['prenom'] . "', mail='" . $_POST['mail'] . "', login='" . $_POST['login'] . "' , description='" . $_POST['description'] . "' WHERE id='" . $_SESSION['id'] . "';";
            $resultModif = $GLOBALS["pdo"]->query($requeteModif);

            $User1->setPseudoNomPrenomMail($_SESSION['id']);
            $_SESSION['messageErreur'] = 4;
        }

        if (isset($_POST['buttonChangeImg'])) {
            $requeteModifImg = "UPDATE user SET avatar='" . $_POST['avatarText'] . "' WHERE id='" . $_SESSION['id'] . "';";
            $resultModifImg = $GLOBALS["pdo"]->query($requeteModifImg);
            $User1->setPseudoNomPrenomMail($_SESSION['id']);
            $_SESSION['messageErreur'] = 5;
        }

        if (isset($_POST['boutonChangePass'])) {
            $passwerify = hash('sha256', $_POST['oldPass']);
            $requeteVerifMDP = "SELECT * FROM `user` WHERE `id` =  '" . $_SESSION['id'] . "' AND `password` = '" . $passwerify . "' ;";
            $resultVerifMDP = $GLOBALS["pdo"]->query($requeteVerifMDP);
            if ($resultVerifMDP->rowCount() > 0) {
                if ($_POST['newPass'] == $_POST['confirmNewPass']) {
                    $passNew = hash('sha256', $_POST['newPass']);
                    $requeteNewMDP = "UPDATE `user` SET `password` =  '$passNew' WHERE id='" . $_SESSION['id'] . "';";
                    $User1->setPseudoNomPrenomMail($_SESSION['id']);
                    $resultNewMDP = $GLOBALS["pdo"]->query($requeteNewMDP);
                    $_SESSION['messageErreur'] = 3;
                } else {
                    // echo "Nouveaux mots de passes non-identiques";
                    $_SESSION['messageErreur'] = 1;
                }
            } else {
                // echo "Ancien mot de passe incorrect";
                $_SESSION['messageErreur']  = 2;
            }
            //header("Location:main_page.php");
        }


        ?>

        <main class="container">
            <aside class="servers">
                <div class="servers-collection">
                <!--<div class="server focusable server-friends unread" role="button" aria-label="Friends unread">-->
                    <div class="server focusable server-friends" role="button" aria-label="Friends unread">
                        <div class="server-icon"><!--<svg>
                            <use xlink:href="#icon-friends" />
                        </svg> -->
                            <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Google_Messages_logo.svg" />
                        </div>
                    </div>
                </div>

                <?php
                $requeteServ1 = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "' and user.classe=1 ";
                $resultServ1 = $GLOBALS["pdo"]->query($requeteServ1);
                if ($resultServ1->rowcount() > 0 or $_SESSION['id'] == 1 or $_SESSION['id'] == 2) {
                ?>
                    <form method="post">
                        <div class="servers-collection">
                            <!--server focusable active -->
                            <div class="server focusable <?php if ($_SESSION['idServer'] == 1) {
                                                                echo "active";
                                                            } ?> role=" button" aria-label="My Server" aria-selected="true">
                                <div class="server-icon" style="position: relative;">
                                    <button class="server-icon" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0;" type="submit" name="SN1"></button>
                                    <img style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 1;pointer-events: none;" src="sn1.JPG" />
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>

                <?php
                $requeteServ1 = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "' and user.classe=2 ";
                $resultServ1 = $GLOBALS["pdo"]->query($requeteServ1);
                if ($resultServ1->rowcount() > 0 or $_SESSION['id'] == 1 or $_SESSION['id'] == 2) {
                ?>
                    <form method="post">
                        <div class="servers-collection">
                            <div class="server focusable <?php if ($_SESSION['idServer'] == 2) {
                                                                echo "active";
                                                            } ?> " role="button" aria-label="My Server" aria-selected="true">
                                <div class="server-icon" style="position: relative;">
                                    <button class="server-icon" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0;" type="submit" name="SN2"></button>
                                    <img style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 1;pointer-events: none;" src="sn2.JPG" />
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>

                <?php
                $requeteServ1 = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "' and user.classe=5 ";
                $resultServ1 = $GLOBALS["pdo"]->query($requeteServ1);
                if ($resultServ1->rowcount() > 0 or $_SESSION['id'] == 1 or $_SESSION['id'] == 2) {
                ?>
                    <form method="post">
                        <div class="servers-collection">
                            <div class="server focusable <?php if ($_SESSION['idServer'] == 5) {
                                                                echo "active";
                                                            } ?> " role="button" aria-label="My Server" aria-selected="true">
                                <div class="server-icon" style="position: relative;">
                                    <button class="server-icon" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0;" type="submit" name="E1"></button>
                                    <img style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 1;pointer-events: none;" src="e1.JPG" />
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>

                <?php
                $requeteServ1 = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "' and user.classe=6 ";
                $resultServ1 = $GLOBALS["pdo"]->query($requeteServ1);
                if ($resultServ1->rowcount() > 0 or $_SESSION['id'] == 1 or $_SESSION['id'] == 2) {
                ?>
                    <form method="post">
                        <div class="servers-collection">
                            <div class="server focusable <?php if ($_SESSION['idServer'] == 6) {
                                                                echo "active";
                                                            } ?> " role="button" aria-label="My Server" aria-selected="true">
                                <div class="server-icon" style="position: relative;">
                                    <button class="server-icon" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0;" type="submit" name="E2"></button>
                                    <img style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 1;pointer-events: none;" src="e2.JPG" />
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>

                <?php
                $requeteServ1 = "SELECT server.id FROM `server`, `user` WHERE server.id = user.general AND user.id = '" . $_SESSION['id'] . "' and user.general=12 ";
                $resultServ1 = $GLOBALS["pdo"]->query($requeteServ1);
                if ($resultServ1->rowcount() > 0 /*or $_SESSION['id'] == 1 or $_SESSION['id'] == 2*/) {
                ?>
                    <form method="post">
                        <div class="servers-collection">
                            <div class="server focusable <?php if ($_SESSION['idServer'] == 12) {
                                                                echo "active";
                                                            } ?> " role="button" aria-label="My Server" aria-selected="true">
                                <div class="server-icon" style="position: relative;">
                                    <button class="server-icon" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0;" type="submit" name="General"></button>
                                    <img style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 1;pointer-events: none;" src="general.JPG" />
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>

                <?php
                $requeteServ1 = "SELECT server.id FROM `server`, `user` WHERE server.id = user.gaming AND user.id = '" . $_SESSION['id'] . "' and user.gaming=13 ";
                $resultServ1 = $GLOBALS["pdo"]->query($requeteServ1);
                if ($resultServ1->rowcount() > 0 /*or $_SESSION['id'] == 1 or $_SESSION['id'] == 2*/) {
                ?>
                    <form method="post">
                        <div class="servers-collection">
                            <div class="server focusable <?php if ($_SESSION['idServer'] == 13) {
                                                                echo "active";
                                                            } ?> " role="button" aria-label="My Server" aria-selected="true">
                                <div class="server-icon" style="position: relative;">
                                    <button class="server-icon" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0;" type="submit" name="Gaming"></button>
                                    <img style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 1;pointer-events: none;" src="gaming.JPG" />
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>
                <?php
                $requeteServ1 = "SELECT server.id FROM `server`, `user` WHERE server.id = user.humour AND user.id = '" . $_SESSION['id'] . "' and user.humour=14 ";
                $resultServ1 = $GLOBALS["pdo"]->query($requeteServ1);
                if ($resultServ1->rowcount() > 0 /*or $_SESSION['id'] == 1 or $_SESSION['id'] == 2*/) {
                ?>
                    <form method="post">
                        <div class="servers-collection">
                            <div class="server focusable <?php if ($_SESSION['idServer'] == 14) {
                                                                echo "active";
                                                            } ?> " role="button" aria-label="My Server" aria-selected="true">
                                <div class="server-icon" style="position: relative;">
                                    <button class="server-icon" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0;" type="submit" name="Humour"></button>
                                    <img style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 1;pointer-events: none;" src="humour.JPG" />
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>
                <?php
                $requeteServ1 = "SELECT server.id FROM `server`, `user` WHERE server.id = user.faq AND user.id = '" . $_SESSION['id'] . "' and user.faq=15 ";
                $resultServ1 = $GLOBALS["pdo"]->query($requeteServ1);
                if ($resultServ1->rowcount() > 0 /*or $_SESSION['id'] == 1 or $_SESSION['id'] == 2*/) {
                ?>
                    <form method="post">
                        <div class="servers-collection">
                            <div class="server focusable <?php if ($_SESSION['idServer'] == 15) {
                                                                echo "active";
                                                            } ?> " role="button" aria-label="My Server" aria-selected="true">
                                <div class="server-icon" style="position: relative;">
                                    <button class="server-icon" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0;" type="submit" name="FAQ"></button>
                                    <img style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 1;pointer-events: none;" src="faq.JPG" />
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>


                <div class="servers-collection" style="padding-top: 10px;">
                    <button class="guild-add" id="openguild">+</button>
                </div>
                <div class="warning-collection" style="padding-top: 10px;">
                    <button style="cursor: help;" id="open" class="warning-add">!</button>
                </div>
                <footer class="channels-footer" style="position: absolute;bottom: 0;padding-bottom:25px">
                    <form method="post">
                        <input type="submit" name="deco" id="deco" style="display:none;">
                        <label for="deco"><i class="gg-log-out" style="color:red;cursor:pointer;"></i></label>
                    </form>
                </footer>
                <script>
                    // onclick="toggleDiv();"
                    function toggleDiv() {
                        var div = document.getElementById('warning-content');
                        if (div.classList.contains('warning-active')) {
                            div.classList.remove('warning-active');
                            div.classList.add('warning-inactive');
                        } else {
                            div.classList.remove('warning-inactive');
                            div.classList.add('warning-active');
                        }
                    }
                </script>
                <style>
                    /* CSS */
                </style>
                <div class="modal-container" id="modal_container">
                    <div class="modal">
                        <button id="close" style="top: 10px; right: 10px; background: none; border: none; outline: none; cursor: pointer;float:right;">
                            <svg viewBox="0 0 24 24" width="40" height="40" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                        <div class="header">
                            <h1>Quoi de neuf ?</h1>
                            <p class="date" style="padding-right:20px;">Mardi 28 Mars 2023</p>
                        </div>
                        <img src="https://raw.githubusercontent.com/HugoTby/BlaBlaChat/main/logo/linkedin_banner_image_1.png" alt="New features" style=" max-width: 100%;">
                        <div class="description">
                            <h2 style="color:#43B581">Nouvelles fonctionnalités !</h2>
                            <div class="bar"></div>
                            <ul>
                                <li><strong>Ajout de nouveaux salons !</strong> Et oui, vous avez désormais la possibilité de communiquer entre amis sur BlaBlaChat ! :D</li>
                                <li><strong>Affichage du profil :</strong> Les utilisateurs peuvent désormais voir leur profil dans le coin inférieur gauche de leur écrans.</li>
                                <li><strong>Ajout de serveurs :</strong> Il est désormais possible de choisir entre plusieurs serveurs facultatifs !</li>
                            </ul>
                        </div>
                        <div class="description">
                            <h2 style="color:red">Corrections et mises à jour :</h2>
                            <div class="bar2"></div>
                            <ul>
                                <li><strong>Blocage des lignes de commandes</strong> Les risques d'attaques sur le serveur de BlaBlaChatont été réduit par l'impossibilité d'envoyer des lignes de commandes dans l'application.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modalguild-container" id="modalguild_container">

                    <div class="modalguild">
                        <button id="closeguild" style="top: 10px; right: 10px; background: none; border: none; outline: none; cursor: pointer;float:right;">
                            <svg viewBox="0 0 24 24" width="40" height="40" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                        <div class="header">
                            <h1 style="font-size: 18px;">Rejoindre un serveur facultatif ?</h1>
                            <p class="date" style="font-size: 16px;padding-right:20px;">Faites votre choix !</p>
                        </div>
                        <img src="https://softflow.ca/wp-content/uploads/2022/06/ss5-1.gif" alt="New features" style="width: 80%;padding-bottom: 10px;padding-left:25%">
                        <!-- https://www.e-kern.com/fileadmin/user_upload/Images_Allgemein/Animationen/OCI_1280x720px.gif -->
                        <?php
                        $requeteGeneral = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "' and user.general=12;";
                        $resultGeneral = $GLOBALS["pdo"]->query($requeteGeneral);
                        if ($resultGeneral->rowcount() > 0) {
                            $salonGeneral = true;
                        }
                        $requeteGaming = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "' and user.gaming=13;";
                        $resultGaming = $GLOBALS["pdo"]->query($requeteGaming);
                        if ($resultGaming->rowcount() > 0) {
                            $salonGaming = true;
                        }
                        $requeteHumour = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "' and user.humour=14;";
                        $resultHumour = $GLOBALS["pdo"]->query($requeteHumour);
                        if ($resultHumour->rowcount() > 0) {
                            $salonHumour = true;
                        }
                        $requeteFaq = "SELECT server.id FROM `server`, `user` WHERE server.id = user.classe AND user.id = '" . $_SESSION['id'] . "' and user.faq=15;";
                        $resultFaq = $GLOBALS["pdo"]->query($requeteFaq);
                        if ($resultFaq->rowcount() > 0) {
                            $salonFaq = true;
                        }
                        ?>

                        <div class="footer">
                            <div class="checkboxes">
                                <form method="post">
                                    <ul class="tg-list" style="padding-left: 22%;">
                                        <li class="tg-list-item">
                                            <h4>&nbsp;&nbsp;&nbsp;Général&nbsp;&nbsp;</h4><input class="tgl tgl-skewed" id="cb1" type="checkbox" name="General" value="12" <?php if ($salonGeneral) { ?> checked <?php } ?> /><label class="tgl-btn" data-tg-off="NON" data-tg-on="OUI" for="cb1"></label>
                                        </li>
                                        <li class="tg-list-item" style="padding-left: 25px;">
                                            <h4>&nbsp;&nbsp;Humour&nbsp;&nbsp;&nbsp;</h4><input class="tgl tgl-skewed" id="cb2" type="checkbox" name="Humour" value="14" <?php if ($salonHumour) { ?> checked <?php } ?> /><label class="tgl-btn" data-tg-off="NON" data-tg-on="OUI" for="cb2"></label>
                                        </li>

                                    </ul>
                                    <ul class="tg-list" style="padding-left: 22%;">
                                        <li class="tg-list-item">
                                            <h4>&nbsp;Gaming&nbsp;</h4><input class="tgl tgl-skewed" id="cb4" type="checkbox" value="13" name="Gaming" <?php if ($salonGaming) { ?> checked <?php } ?> /><label class="tgl-btn" data-tg-off="NON" data-tg-on="OUI" for="cb4"></label>
                                        </li>
                                        <li class="tg-list-item" style="padding-left: 25px;">
                                            <h4>&nbsp;&nbsp;&nbsp;&nbsp;FAQ&nbsp;&nbsp;&nbsp;</h4><input class="tgl tgl-skewed" id="cb3" type="checkbox" value="15" name="FAQ" <?php if ($salonFaq) { ?> checked <?php } ?> /><label class="tgl-btn" data-tg-off="NON" data-tg-on="OUI" for="cb3"></label>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                        <button type="submit" name="submitGUILD" id="send-button" style="float: right;">Confirmer</button>
                        </form>
                    </div>
                    <?php


                    ?>
                    <script>
                        const open = document.getElementById('open');
                        const modal_container = document.getElementById('modal_container');
                        const close = document.getElementById('close');

                        open.addEventListener('click', () => {
                            modal_container.classList.add('show');
                        });
                        close.addEventListener('click', () => {
                            modal_container.classList.remove('show');
                        });
                    </script>
                    <script>
                        const openguild = document.getElementById('openguild');
                        const modal_containerguild = document.getElementById('modalguild_container');
                        const closeguild = document.getElementById('closeguild');

                        openguild.addEventListener('click', () => {
                            modal_containerguild.classList.add('show');
                        });
                        closeguild.addEventListener('click', () => {
                            modal_containerguild.classList.remove('show');
                        });
                    </script>


            </aside>
            <aside class="channels">
                <header class="channels-header focusable">
                    <h3 role="header" class="channels-header-name"><?php $SERV->getServerByID($_SESSION['idServer']) ?></h3>
                    <svg role="button" aria-label="Dropdown" class="channels-header-dropdown">
                        <use xlink:href="#icon-dropdown" />
                    </svg>
                </header>
                <section class="channels-list">
                    <header class="channels-list-header focusable">
                        <h5>Salons textuels</h5>
                    </header>

                    <ul class="channels-list-text">
                        <li class="channel focusable channel-text active">
                            <span class="channel-name">général</span>
                            <!--<button class="button" role="button" aria-label="Invite"><svg>
                                    <use xlink:href="#icon-invite" />
                                </svg></button>
                            <button class="button" role="button" aria-label="settings"><svg>
                                    <use xlink:href="#icon-channel-settings" />
                                </svg></button>-->
                        </li>
                        <li class="channel focusable channel-text">
                            <span class="channel-name">aide</span>
                        </li>
                        <li class="channel focusable channel-text">
                            <span class="channel-name">faq</span>
                        </li>

                        <!--<li class="channel focusable channel-text">
                            <span class="channel-name">prochainement ...</span>
                            <button class="button" role="button" aria-label="Invite"><svg>
                                    <use xlink:href="#icon-invite" />
                                </svg></button>
                            <button class="button" role="button" aria-label="settings"><svg>
                                    <use xlink:href="#icon-channel-settings" />
                                </svg></button>
                        </li>-->
                    </ul>

                    <!-- <header class="channels-list-header focusable">
                    <h5>Voice Channels</h5>
                </header> -->
                </section>
                <?php
                if ($_SESSION['messageErreur'] != 0) {
                    if ($_SESSION['messageErreur'] == 3) {
                ?>
                        <div class="warning-active" id="warning-content">
                            <div class="rectangle" style="background: #2fda1e;">
                                <div class="notification-text">
                                    <i class="gg-info"></i>
                                    <span style="text-align: right;">
                                        &nbsp;&nbsp;Votre mot de passe a bien été changé.
                                        <?php $_SESSION['messageErreur'] = 0; ?>
                                    </span>
                                </div>
                            </div>
                        </div><?php
                            } else if ($_SESSION['messageErreur'] == 4) {
                                ?>
                        <div class="warning-active" id="warning-content">
                            <div class="rectangle" style="background: #2fda1e;">
                                <div class="notification-text">
                                    <i class="gg-info"></i>
                                    <span style="text-align: right;">
                                        &nbsp;&nbsp;Votre profil a bien été changé.
                                        <?php $_SESSION['messageErreur'] = 0; ?>
                                    </span>
                                </div>
                            </div>
                        </div><?php
                            } else if ($_SESSION['messageErreur'] == 5) {
                                ?>
                        <div class="warning-active" id="warning-content">
                            <div class="rectangle" style="background: #2fda1e;">
                                <div class="notification-text">
                                    <i class="gg-info"></i>
                                    <span style="text-align: right;">
                                        &nbsp;&nbsp;Votre photo de profil a bien été changée.
                                        <?php $_SESSION['messageErreur'] = 0; ?>
                                    </span>
                                </div>
                            </div>
                        </div><?php

                            } else {
                                ?>

                        <div class="warning-active" id="warning-content">
                            <div class="rectangle">
                                <div class="notification-text">
                                    <i class="gg-info"></i>
                                    <span style="text-align: right;">


                                        <?php
                                        if ($_SESSION['messageErreur'] == 1) {
                                            echo "&nbsp;&nbsp;Les nouveaux mots de passe saisis ne sont pas identiques.";
                                            $_SESSION['messageErreur'] = 0;
                                        } else if ($_SESSION['messageErreur'] == 2) {
                                            echo "&nbsp;&nbsp;L'ancien mot de passe saisi est incorrect.";
                                            $_SESSION['messageErreur'] = 0;
                                        } ?>

                                        <!-- &nbsp;&nbsp;This is a test notification. -->

                                    </span>
                                </div>
                            </div>
                        </div>
                <?php
                            }
                        }

                ?>

                <footer class="channels-footer">
                    <img class="avatar" alt="409" src="<?php $User1->getAvatar(); ?>" />
                    <div class="channels-footer-details">
                        <span class="username"><?php $User1->getPseudo(); ?></span>
                        <span class="tag">#<?php $User1->getId(); ?></span>
                    </div>
                    <div class="channels-footer-controls button-group">
                        <!-- <button role="button" aria-label="Mute" class="button button-mute" style="cursor: not-allowed;"><svg>
                                <use xlink:href="#icon-mute" />
                            </svg></button>
                        <button role="button" aria-label="Deafen" class="button button-deafen" style="cursor: not-allowed;"><svg>
                                <use xlink:href="#icon-deafen" />
                            </svg></button> -->
                        <button role="button" id="opensettings" aria-label="Settings" class="button button-settings"><svg>
                                <use xlink:href="#icon-settings" />
                            </svg></button>
                    </div>
                </footer>
            </aside>



            <div class="vert-container">
                <menu type="toolbar" class="menu">
                    <h2 class="menu-name"><?php $SERV->getServerByID($_SESSION['idServer']) ?></h2>
                </menu>
                <section class="chat" id="messages-container">
                    <!-- <span style="display: flex;justify-content: center;align-items: center;font-weight: 300;">Le
                    chat n'est pas disponible pour le moment car cette fonctionnalité est en développement ...</span> -->

                    <?php


                    $Mess->getServer($_SESSION['idServer']);




                    /*$_SESSION['idServer'] = 1;
                        $requetes = "SELECT * FROM `message` WHERE idServer=1 ;";
                        $resultat2 = $GLOBALS["pdo"]->query($requetes);
                        $tabMessage = $resultat2->fetchALL();

                        foreach ($tabMessage as $Message) {
                            $test = $Message['id'];
                            $Mess->afficheMessage($test);
                        }*/
                    ?>



                    <script>
                        // scrollToBottom();
                        function scrollToBottom() {
                            var messagesContainer = document.getElementById("messages-container");
                            messagesContainer.scrollTop = messagesContainer.scrollHeight;
                        }

                        // Faire défiler jusqu'en bas au chargement de la page
                        window.onload = function() {
                            scrollToBottom();
                        }
                    </script>
                </section>
                <form method="post" onsubmit="return verifierContenuMess();">
                    <div id="chat-container">
                        <div id="input-container">
                            <input type="text" autocomplete="off" name="contenuMess" id="chat-input" placeholder="Saisissez votre message" maxlength="1000">
                            <button name="envoiMess" id="send-button" onclick="">Envoyer</button>
                        </div>
                    </div>
                </form>
                <script>
                    function verifierContenuMess() {
                        var input = document.getElementById('chat-input').value;
                        var pattern = /([<>])+|(--+)|(%[0-9a-fA-F]{2})/;
                        if (pattern.test(input)) {
                            alert("Votre saisie contient des caractères interdits. Veuillez saisir un texte valide.");
                            return false;
                        }
                        return true;
                    }
                </script>
                <script>
                    const form = document.getElementById('myForm');
                    const result = document.getElementById('result');

                    form.addEventListener('submit', function(event) {
                        event.preventDefault();
                        const input = document.getElementById('inputField').value;
                        fetch('/url-du-serveur', {
                                method: 'POST',
                                body: new URLSearchParams({
                                    input
                                })
                            })
                            .then(response => response.text())
                            .then(data => {
                                result.innerHTML = 'Le serveur a répondu : ' + data;
                            })
                            .catch(error => {
                                result.innerHTML = 'Une erreur s\'est produite : ' + error.message;
                            });
                    });
                </script>

                <?php
                /*
                $idSession = $_SESSION['id'];
                if (isset($_POST['envoiMess']) and strlen($_POST_["contenuMess"] == 0)) {
                    $requeteMess = "INSERT INTO `message` (`date`, `contenu`, `idServer`, `idUser`) VALUES ('" . date('Y-m-d H:i:s') . "', '" . $_POST['contenuMess'] . "', '" . $_SESSION['idServer'] . "', '" . $idSession . "')";
                    $resultMess = $GLOBALS["pdo"]->query($requeteMess);
                }*/
                ?>

            </div>

            

            



            <aside class="accounts">
                <?php $User1->affichePseudoServ2($_SESSION['idServer']); ?>
                

                <div class="member" aria-expanded="false" id="openprofile" class="openprofile" >
                    <div class="layout">
                        <div class="avatar">
                            <div class="wrapper-3Un6-K" style="width: 32px; height: 32px;">
                                <svg width="40" height="40" viewBox="0 0 40 40" class="mask" aria-hidden="true">
                                    <foreignObject x="0" y="0" width="32" height="32" mask="url(#svg-mask-avatar-status-round-32)">
                                        <div class="avatarStack-3Bjmsl">
                                            <img src="https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png" alt=" " class="avatar-31d8He" aria-hidden="true">
                                        </div>
                                    </foreignObject>
                                    <circle cx="27" cy="27" r="5" fill="#00ff0c" mask="url(#svg-mask-status-dnd)" class="pointerEvents"></circle>
                                </svg>
                            </div>
                        </div>
                        <div class="content-1U25dZ">
                            <div class="nameAndDecorators-3ERwy2">
                                <div class="name-3Vmqxm">
                                    <span class="username-i5-wv-">
                                        <span class="username-3_PJ5r desaturateUserColors-1O-G89">ADMINISTRATEUR</span>
                                    </span>
                                </div>
                                <img style="padding-left:8px;height:15px" src="https://freepngimg.com/save/107722-verified-badge-facebook-free-download-png-hd/940x930">
                            </div>
                            <div class="subText-OGOWMj">functionality in progress...</div>
                        </div>
                    </div>
                </div>

               

                <!-- <aside class="channels" style="flex: 1 1;padding-bottom: 5px;" >
                <footer class="channels-footer">
                    <button name="deconnexion" id="logout-button">Déconnexion</button>
                </footer>
            </aside> -->
            </aside>
        </main>

        <div class="modalsettings-container" id="modalsettings_container">
            <div class="modalsettings">
                <button id="closesettings" style="top: 10px; right: 10px; background: none; border: none; outline: none; cursor: pointer;float:right;">
                    <svg viewBox="0 0 24 24" width="40" height="40" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
                <div id="main">
                    <div id="settings-panel">
                        <div class="button" id="close-button"><i class="fas fa-times"></i></div>
                        <div id="options">
                            <div id="options-label">
                                <h1>PARAMÈTRES UTILISATEUR</h1>
                            </div>
                            <div class="option" id="option-1">
                                <h1>Vue globale</h1>
                            </div>
                            <div class="option" id="option-2">
                                <h1>Mon compte</h1>
                            </div>
                            <div class="option" id="option-3">
                                <h1>Photo de profil</h1>
                            </div>
                            <div class="option" id="option-4">
                                <h1>Changer mot de passe</h1>
                            </div>
                            <div class="option" id="option-5">
                                <h1>Confidentialité</h1>
                            </div>
                        </div>
                        <div id="details-view-wrapper">

                            <div id="option1">
                                <div class="profile">
                                    <div class="banner">
                                        <div class="change-banner">
                                        </div>
                                        <script>
                                            // Liste des classes CSS correspondant aux différentes images de fond possibles
                                            var backgrounds = ['background-1', 'background-2', 'background-3'];

                                            // Choix aléatoire d'une classe CSS parmi les images de fond possibles
                                            var randomBackground = backgrounds[Math.floor(Math.random() * backgrounds.length)];

                                            // Ajout de la classe CSS choisie à l'élément HTML correspondant à la bannière
                                            document.getElementsByClassName('banner')[0].classList.add(randomBackground);
                                        </script>
                                    </div>
                                    <div class="avatar2__wrapper">
                                        <div class="avatar2">
                                            <style>
                                                .avatar2 {
                                                    pointer-events: all;
                                                    z-index: 101;
                                                    border-radius: 50%;
                                                    width: 100px;
                                                    height: 100px;
                                                    background: url('<?php $User1->getAvatar(); ?>');
                                                    background-size: cover;
                                                    border: 6px solid #18191c;
                                                    cursor: pointer;
                                                }
                                            </style>

                                            <div class="change-avatar2">
                                                <div class="status-icon"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php $User1->setPseudoNomPrenomMail($_SESSION['id']); 
                                    ?>
                                    
                                    <div class="headerTop" >
                                        <div class="badges">
                                        <span style="padding-right: 20px;" ><?php $User1->getClasse($id); ?></span>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;">
                                                <?php $User1->afficheIcon1(); ?>
                                            </div>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;">
                                                <?php $User1->afficheIcon2(); ?>
                                            </div>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;padding-right:5px">
                                                <?php $User1->afficheIcon3(); ?>
                                            </div>
                                        </div>
                                        <div class="headerText">
                                            <p style="text-align: left;">
                                                <strong>
                                                    <span style=" color: ;text-align: left;"><b><?php $User1->getPseudo(); ?></b></span>
                                                </strong>
                                                <span style="color: #ffffff;">
                                                    <span style="color: #b6b8bb;text-align: left;">#<span><?php $User1->getId(); ?></span></span>
                                                </span>


                                            </p>
                                            <div class="headerTag">
                                                <p style="color:#ffffff;text-align: left;">Statut : <span style="color:#b6b8bb"><?php $User1->getRole(); ?></span></p>
                                                <p style="color:#b6b8bb;text-align: left;"><?php $User1->getNomPrenom(); ?></p><br>
                                                <p style="color:#ffffff;text-align: left;">Description : </p>
                                                <p style="color:#b6b8bb;text-align: left;"><?php $User1->getDescription(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="option2">
                                <div id="details-view-label">
                                    <h1>MON COMPTE</h1>
                                </div>
                                <form method="post">
                                    <div id="my-account-info-wrapper">
                                        <div id="my-account-info">
                                            <div id="profile-pic">
                                                <img id="profile-pic" src="<?php $User1->getAvatar(); ?>" alt="EMPTY">
                                            </div>

                                            <div id="account-fields">
                                                <div class="account-field">
                                                    <h1 style="padding-top: 0px;" class="label">Nom d'utilisateur :</h1><input class="input" type="text" name="login" value="<?php $User1->getPseudo(); ?>" />
                                                </div>
                                                <div class="account-field">
                                                    <h1 class="label">Adresse e-mail :</h1><input class="input" type="text" name="mail" value="<?php $User1->getMail(); ?>" />
                                                </div>
                                                <div class="account-field">
                                                    <h1 class="label">Nom :</h1><input class="input" type="text" name="nom" value="<?php $User1->getNom(); ?>" />
                                                </div>
                                                <div class="account-field">
                                                    <h1 class="label">Prenom :</h1><input class="input" type="text" name="prenom" value="<?php $User1->getPrenom(); ?>" />
                                                </div>
                                                <div class="account-field">
                                                    <h1 class="label">Description : (non-obligatoire)</h1><input class="input" type="text" name="description" value="<?php $User1->getDescription(); ?>" />
                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                    <div id="save-options">

                                        <!-- <div class="save-option-button" id="cancel-button">
                                            <h1 type="submit">Supprimer le compte</h1>
                                        </div> -->
                                        <div class="save-option-button" id="save-button">
                                            <input type="submit" class="save-option-button" id="save-button" value="Modifier le profil" name="boutonEnvoiModif">


                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="option3">
                                <div class="container3">
                                    <div class="account-field">
                                        <h1 class="label">Apercu :</h1><br>
                                    </div>
                                    <img class="profile-pic" src="<?php $User1->getAvatar(); ?>" alt="EMPTY"><br><br>

                                    <div class="account-field">
                                        <h1 class="label" style="font-size : 16px">Changer sa photo de profil :</h1><br>
                                    </div>
                                    <div class="profile-form">
                                        <form method="post">

                                            <!-- <input type="file" style="display: none;" name="avatarFile" placeholder="Par Lien"></label><br> -->
                                            <input type="text" id="backgroundlink" name="avatarText" style="width: 100%;" placeholder="Copiez votre lien ici" value="<?php $User1->getAvatar(); ?>" /><br><br>
                                            <button type="submit" class="profile-btn" name="buttonChangeImg">Changer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="option4">
                                <div id="details-view-label">
                                    <h1>CHANGER MOT DE PASSE</h1>
                                </div>
                                <form method="post" id="nom-du-formulaire">
                                    <div id="my-account-info-wrapper">
                                        <div id="my-account-info">
                                            <div id="profile-pic">
                                                <img id="profile-pic" src="<?php $User1->getAvatar(); ?>" alt="EMPTY">
                                            </div>

                                            <div id="account-fields">
                                                <div class="account-field">
                                                    <h1 style="padding-top: 0px;" class="label">Saisissez votre ancien mot de passe :</h1><input class="input" type="password" name="oldPass" />
                                                </div>
                                                <div class="account-field">
                                                    <h1 class="label">Saisissez votre nouveau mot de passe :</h1><input class="input" type="password" name="newPass" />
                                                </div>
                                                <div class="account-field">
                                                    <h1 class="label">Confirmer votre nouveau mot de passe :</h1><input class="input" type="password" name="confirmNewPass" />
                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                    <div id="save-options">

                                        <!-- <div class="save-option-button" id="cancel-button">
                                            <h1 type="submit">Supprimer le compte</h1>
                                        </div> -->
                                        <div class="save-option-button" id="save-button">
                                            <input onclick="toggleDiv();" type="submit" class="save-option-button" id="save-button" value="Changer mot de passe" name="boutonChangePass">


                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="option5">
                                Fonctionnalité en cours de développement ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="modalprofile-container" id="modalprofile_container">
                    <div class="modalprofile">
                        <button id="closeprofile" style="top: 10px; right: 10px; background: none; border: none; outline: none; cursor: pointer;float:right;">
                            <svg viewBox="0 0 24 24" width="40" height="40" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                        <div class="profile">
                                    <div class="banner">
                                        <div class="change-banner">
                                        </div>
                                        <script>
                                            // Liste des classes CSS correspondant aux différentes images de fond possibles
                                            var backgrounds = ['background-1', 'background-2', 'background-3'];

                                            // Choix aléatoire d'une classe CSS parmi les images de fond possibles
                                            var randomBackground = backgrounds[Math.floor(Math.random() * backgrounds.length)];

                                            // Ajout de la classe CSS choisie à l'élément HTML correspondant à la bannière
                                            document.getElementsByClassName('banner')[0].classList.add(randomBackground);
                                        </script>
                                    </div>
                                    <div class="avatar2__wrapper">
                                        <div class="avatar2">
                                            <style>
                                                .avatar2 {
                                                    pointer-events: all;
                                                    z-index: 101;
                                                    border-radius: 50%;
                                                    width: 100px;
                                                    height: 100px;
                                                    background: url('<?php //$User1->getAvatar(); ?>');
                                                    background-size: cover;
                                                    border: 6px solid #18191c;
                                                    cursor: pointer;
                                                }
                                            </style>

                                            <div class="change-avatar2">
                                                <div class="status-icon"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php //$User1->setPseudoNomPrenomMail($_SESSION['id']); ?>
                                    <div class="headerTop" >
                                        <div class="badges">
                                        <span style="padding-right: 20px;" ><?php //$User1->getClasse($id); ?></span>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;">
                                                <img src="<?php //$User1->getIcon1(); ?>" alt=""></img>
                                            </div>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;">
                                                <img src="<?php //$User1->getIcon2(); ?>" alt=""></img>
                                            </div>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;padding-right:5px">
                                                <img src="<?php //$User1->getIcon3(); ?>" alt=""></img>
                                            </div>
                                        </div>
                                        <div class="headerText">
                                            <p style="text-align: left;">
                                                <strong>
                                                    <span style=" color: ;text-align: left;"><b><?php //$User1->getPseudo(); ?></b></span>
                                                </strong>
                                                <span style="color: #ffffff;">
                                                    <span style="color: #b6b8bb;text-align: left;">#<span><?php //$User1->getId(); ?></span></span>
                                                </span>


                                            </p>
                                            <div class="headerTag">
                                                <p style="color:#ffffff;text-align: left;">Statut : <span style="color:#b6b8bb"><?php //$User1->getRole(); ?></span></p>
                                                <p style="color:#b6b8bb;text-align: left;"><?php //$User1->getNomPrenom(); ?></p><br>
                                                <p style="color:#ffffff;text-align: left;">Description : </p>
                                                <p style="color:#b6b8bb;text-align: left;"><?php //$User1->getDescription(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div> -->
        

        <script>
            // Récupérer les éléments du DOM nécessaires
            const options = document.querySelectorAll('.option');
            const detailsViews = document.querySelectorAll('#details-view-wrapper > div');

            // Fonction pour masquer toutes les vues détaillées
            function hideAllDetailsViews() {
                detailsViews.forEach((view) => {
                    view.style.display = 'none';
                });
            }

            // Fonction pour afficher une vue détaillée
            function showDetailsView(viewId) {
                // Masquer toutes les vues détaillées
                hideAllDetailsViews();

                // Retirer la classe "selected" de toutes les options
                options.forEach((option) => {
                    option.classList.remove('selected');
                });

                // Ajouter la classe "selected" à l'option correspondante
                const selectedOption = document.querySelector(`#option-${viewId}`);
                selectedOption.classList.add('selected');

                // Afficher la vue détaillée correspondant à l'option sélectionnée
                const detailsView = document.querySelector(`#option${viewId}`);
                detailsView.style.display = 'block';
            }

            // Écouteurs d'événements pour chaque option
            options.forEach((option) => {
                option.addEventListener('click', () => {
                    const viewId = option.id.replace('option-', '');
                    showDetailsView(viewId);
                });
            });

            // Masquer toutes les vues détaillées initialement
            hideAllDetailsViews();

            // Afficher la première vue détaillée (option1) initialement
            const firstDetailsView = document.querySelector('#option1');
            firstDetailsView.style.display = 'block';
            const firstOption = document.querySelector('#option-1');
            firstOption.classList.add('selected');
        </script>

        <script>
            const opensettings = document.getElementById('opensettings');
            const modalsettings_container = document.getElementById('modalsettings_container');
            const closesettings = document.getElementById('closesettings');

            opensettings.addEventListener('click', () => {
                modalsettings_container.classList.add('show');
            });
            closesettings.addEventListener('click', () => {
                modalsettings_container.classList.remove('show');
            });
        </script>
         <!-- A déplacer dans User.php [!] -->
         
            <!-- A déplacer dans User.php [!] -->

        
        <!-- ICONS -->
        <svg id="icon-friends" viewBox="-289 382 32 27.1">
            <style id="style3">
                .st0 {
                    fill: #FFFFFF;
                }

                .st1 {
                    opacity: 0.6;
                }
            </style>
            <g id="g4145" fill="#fff">
                <path id="path5" d="M-273 409.1c-4.1 0-6.8-.6-7.9-1.7-.5-.6-.6-1.1-.6-1.3 0-.7.1-2.9.6-3.8.1-.3.5-1 4.5-2.4-1.6-1.4-2.6-4-2.6-7.1 0-4.2 2.3-7 5.9-7.1h.1c3.6.1 5.9 2.8 5.9 7.1 0 3.1-1 5.7-2.6 7.1 4 1.4 4.4 2.1 4.5 2.4.4.9.5 3.1.6 3.8 0 .2 0 .7-.6 1.3-1.1 1.1-3.7 1.7-7.8 1.7zm0-2c5.1 0 6.2-.9 6.4-1.1-.1-1.1-.2-2.3-.3-2.7-.6-.4-2.9-1.3-4.8-1.9l-.7-.2-.1-2 .7-.3c1.7-.6 2.8-3.1 2.8-6.1 0-3.1-1.5-5-3.9-5.1-2.5 0-4 2-4 5.1 0 3 1.1 5.5 2.8 6.1l.7.3-.1 2-.7.2c-1.9.6-4.2 1.5-4.8 1.9-.1.4-.3 1.6-.3 2.7.1.2 1.3 1.1 6.3 1.1z" class="st0" />
                <g id="g7" class="st1" opacity=".6">
                    <path id="path9" d="M-257 402.4c0-.7-.1-2.9-.6-3.8-.1-.3-.5-1-4.5-2.4 1.6-1.4 2.6-4 2.6-7.1 0-4.2-2.3-7-5.9-7.1h-.1c-1.9 0-3.5.8-4.5 2.2.6.3 1.2.6 1.8 1 .7-.8 1.6-1.3 2.8-1.3 2.4 0 3.9 2 3.9 5.1 0 3-1.1 5.5-2.8 6.1l-.7.3.1 2 .7.2c1.9.6 4.3 1.5 4.8 1.9.1.4.3 1.6.3 2.7-.2.2-1 .8-3.8 1 .1.6.2 1.2.2 2 2.5-.2 4.2-.8 5-1.6.7-.5.7-1 .7-1.2z" class="st0" />
                    <path id="path11" d="M-287 402.3c.1-1.1.2-2.3.3-2.7.6-.4 2.9-1.3 4.8-1.9l.7-.2.1-2-.7-.3c-1.6-.6-2.8-3.1-2.8-6.1 0-3.1 1.5-5 4-5.1 1.2 0 2.1.5 2.8 1.3.5-.4 1.1-.8 1.8-1-1-1.4-2.6-2.2-4.5-2.2h-.1c-3.6 0-5.9 2.8-5.9 7.1 0 3.1 1 5.7 2.6 7.1-4 1.4-4.4 2.1-4.5 2.4-.4.9-.5 3.1-.6 3.8 0 .2 0 .7.6 1.3.8.9 2.5 1.4 5.1 1.6 0-.7.1-1.4.2-2-2.9-.3-3.7-.9-3.9-1.1z" class="st0" />
                </g>
            </g>
        </svg>

        <svg id="icon-mute" viewBox="0 0 16 16">
            <path fill="#5D6063" d="M12.5,8v1c0,2.2-1.8,4-4,4h-1c-2.2,0-4-1.8-4-4V8h-1v1 c0,2.8,2.2,5,5,5v1H7c-0.3,0-0.5,0.2-0.5,0.5C6.5,15.8,6.7,16,7,16h2c0.3,0,0.5-0.2,0.5-0.5C9.5,15.2,9.3,15,9,15H8.5v-1 c2.8,0,5-2.2,5-5V8H12.5z M8,12c1.9,0,3.5-1.6,3.5-3.5v-5C11.5,1.6,9.9,0,8,0C6.1,0,4.5,1.6,4.5,3.5v5C4.5,10.4,6.1,12,8,12z M5.5,3.5C5.5,2.1,6.6,1,8,1c1.4,0,2.5,1.1,2.5,2.5v5C10.5,9.9,9.4,11,8,11c-1.4,0-2.5-1.1-2.5-2.5V3.5z" />
        </svg>

        <svg id="icon-deafen" viewBox="0 0 16 16">
            <path fill="#5D6063" d="M15.9,9C16,8.7,16,8.3,16,8c0-4.4-3.6-8-8-8C3.6,0,0,3.6,0,8 c0,0.3,0,0.7,0.1,1h0C0,9.2,0,9.3,0,9.5v4C0,14.3,0.7,15,1.5,15h2C4.3,15,5,14.3,5,13.5v-4C5,8.7,4.3,8,3.5,8h-2 C1.3,8,1.2,8,1,8.1C1,8.1,1,8,1,8c0-3.9,3.1-7,7-7c3.9,0,7,3.1,7,7c0,0,0,0.1,0,0.1C14.8,8,14.7,8,14.5,8h-2C11.7,8,11,8.7,11,9.5 v4c0,0.8,0.7,1.5,1.5,1.5h2c0.8,0,1.5-0.7,1.5-1.5v-4C16,9.3,16,9.2,15.9,9L15.9,9z M1.5,9h2C3.8,9,4,9.2,4,9.5v4 C4,13.8,3.8,14,3.5,14h-2C1.2,14,1,13.8,1,13.5v-4C1,9.2,1.2,9,1.5,9z M15,13.5c0,0.3-0.2,0.5-0.5,0.5h-2c-0.3,0-0.5-0.2-0.5-0.5 v-4C12,9.2,12.2,9,12.5,9h2C14.8,9,15,9.2,15,9.5V13.5z" />
        </svg>

        <svg id="icon-settings" viewBox="0 0 16 16">
            <path fill="#5D6063" d="M8,5C6.3,5,5,6.3,5,8c0,1.7,1.3,3,3,3c1.7,0,3-1.3,3-3 C11,6.3,9.7,5,8,5z M8,10c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2s2,0.9,2,2C10,9.1,9.1,10,8,10z M16,8c0-1-0.8-1.9-1.8-2 c-0.1-0.3-0.3-0.7-0.4-1c0.7-0.8,0.6-1.9-0.1-2.7c-0.7-0.7-1.9-0.8-2.7-0.1c-0.3-0.2-0.6-0.3-1-0.4C9.9,0.8,9,0,8,0 C7,0,6.1,0.8,6,1.8C5.7,1.9,5.3,2.1,5,2.2C4.2,1.6,3.1,1.6,2.3,2.3C1.6,3.1,1.6,4.2,2.2,5C2.1,5.3,1.9,5.7,1.8,6C0.8,6.1,0,7,0,8 c0,1,0.8,1.9,1.8,2c0.1,0.3,0.3,0.7,0.4,1c-0.7,0.8-0.6,1.9,0.1,2.7c0.7,0.7,1.9,0.8,2.7,0.1c0.3,0.2,0.6,0.3,1,0.4 C6.1,15.2,7,16,8,16c1,0,1.9-0.8,2-1.8c0.3-0.1,0.7-0.3,1-0.4c0.8,0.7,1.9,0.6,2.7-0.1c0.7-0.7,0.8-1.9,0.1-2.7 c0.2-0.3,0.3-0.6,0.4-1C15.2,9.9,16,9,16,8z M13.4,9c-0.1,0.8-0.5,1.5-0.9,2.1l0.4,0.4c0.4,0.4,0.4,1,0,1.4c-0.4,0.4-1,0.4-1.4,0 l-0.4-0.4C10.5,13,9.8,13.3,9,13.4V14c0,0.6-0.4,1-1,1c-0.6,0-1-0.4-1-1v-0.6c-0.8-0.1-1.5-0.5-2.1-0.9l-0.4,0.4 c-0.4,0.4-1,0.4-1.4,0c-0.4-0.4-0.4-1,0-1.4l0.4-0.4C3,10.5,2.7,9.8,2.6,9H2C1.4,9,1,8.6,1,8c0-0.6,0.4-1,1-1h0.6 C2.7,6.2,3,5.5,3.5,4.9L3.1,4.5c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0l0.4,0.4C5.5,3,6.2,2.7,7,2.6V2c0-0.6,0.4-1,1-1 c0.6,0,1,0.4,1,1v0.6c0.8,0.1,1.5,0.5,2.1,0.9l0.4-0.4c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4l-0.4,0.4C13,5.5,13.3,6.2,13.4,7 H14c0.6,0,1,0.4,1,1c0,0.6-0.4,1-1,1H13.4z" />
        </svg>

        <svg id="icon-dropdown" viewBox="0 0 18 18">
            <style>
                .dd {
                    stroke: #ABADAF;
                    stroke-width: 2px;
                    stroke-dashoffset: 1;
                    stroke-dasharray: inherit
                }
            </style>
            <path class="dd" stroke="#FFF" d="M4.5 4.5l9 9" stroke-linecap="round"></path>
            <path class="dd" stroke="#FFF" d="M13.5 4.5l-9 9" stroke-linecap="round"></path>
        </svg>

        <svg id="icon-invite" viewBox="0 0 16 16">
            <path fill="#fff" d="M6.3,3.4L8,1.7v9.8C8,11.8,8.2,12,8.5,12C8.8,12,9,11.8,9,11.5V1.7l1.7,1.7c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7L8.9,0.2c0,0,0,0,0-0.1C8.8,0,8.6,0,8.5,0c0,0,0,0,0,0c0,0,0,0,0,0C8.4,0,8.2,0,8.1,0.1c0,0,0,0,0,0.1L5.6,2.7c-0.2,0.2-0.2,0.5,0,0.7C5.8,3.5,6.1,3.5,6.3,3.4z M14,4h-1.5v1h1C13.8,5,14,5.2,14,5.5v9c0,0.3-0.2,0.5-0.5,0.5h-10C3.2,15,3,14.8,3,14.5v-9C3,5.2,3.2,5,3.5,5h1V4H3C2.4,4,2,4.4,2,5v10c0,0.6,0.4,1,1,1h11c0.6,0,1-0.4,1-1V5C15,4.4,14.6,4,14,4z" />
        </svg>

        <svg id="icon-channel-settings" viewBox="0 0 16 16">
            <path fill="#fff" d="M8,5C6.3,5,5,6.3,5,8c0,1.7,1.3,3,3,3c1.7,0,3-1.3,3-3 C11,6.3,9.7,5,8,5z M8,10c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2s2,0.9,2,2C10,9.1,9.1,10,8,10z M16,8c0-1-0.8-1.9-1.8-2 c-0.1-0.3-0.3-0.7-0.4-1c0.7-0.8,0.6-1.9-0.1-2.7c-0.7-0.7-1.9-0.8-2.7-0.1c-0.3-0.2-0.6-0.3-1-0.4C9.9,0.8,9,0,8,0 C7,0,6.1,0.8,6,1.8C5.7,1.9,5.3,2.1,5,2.2C4.2,1.6,3.1,1.6,2.3,2.3C1.6,3.1,1.6,4.2,2.2,5C2.1,5.3,1.9,5.7,1.8,6C0.8,6.1,0,7,0,8 c0,1,0.8,1.9,1.8,2c0.1,0.3,0.3,0.7,0.4,1c-0.7,0.8-0.6,1.9,0.1,2.7c0.7,0.7,1.9,0.8,2.7,0.1c0.3,0.2,0.6,0.3,1,0.4 C6.1,15.2,7,16,8,16c1,0,1.9-0.8,2-1.8c0.3-0.1,0.7-0.3,1-0.4c0.8,0.7,1.9,0.6,2.7-0.1c0.7-0.7,0.8-1.9,0.1-2.7 c0.2-0.3,0.3-0.6,0.4-1C15.2,9.9,16,9,16,8z M13.4,9c-0.1,0.8-0.5,1.5-0.9,2.1l0.4,0.4c0.4,0.4,0.4,1,0,1.4c-0.4,0.4-1,0.4-1.4,0 l-0.4-0.4C10.5,13,9.8,13.3,9,13.4V14c0,0.6-0.4,1-1,1c-0.6,0-1-0.4-1-1v-0.6c-0.8-0.1-1.5-0.5-2.1-0.9l-0.4,0.4 c-0.4,0.4-1,0.4-1.4,0c-0.4-0.4-0.4-1,0-1.4l0.4-0.4C3,10.5,2.7,9.8,2.6,9H2C1.4,9,1,8.6,1,8c0-0.6,0.4-1,1-1h0.6 C2.7,6.2,3,5.5,3.5,4.9L3.1,4.5c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0l0.4,0.4C5.5,3,6.2,2.7,7,2.6V2c0-0.6,0.4-1,1-1 c0.6,0,1,0.4,1,1v0.6c0.8,0.1,1.5,0.5,2.1,0.9l0.4-0.4c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4l-0.4,0.4C13,5.5,13.3,6.2,13.4,7 H14c0.6,0,1,0.4,1,1c0,0.6-0.4,1-1,1H13.4z" />
        </svg>


    <?php


} else {

    // Si il n'est pas de FR, on refuse l'accès en affichant l'adresse IP de l'utilisateur, aisni que le nom et le drapeau de son pays récupérés dans le tableau du fichier codes.php
    $country = property_exists($info, 'country') ? (array_key_exists($info->country, $countryCodes) ? $countryCodes[$info->country] : 'Unknown location') : 'Unknown location';
    echo "
            <div class='error'>
                Sorry, this website is only accessible to users with an IP address located in<strong> France 🇫🇷</strong><br><br>
                Your IP address is : <strong>" . $ip . "</strong>, and it comes from <strong>" . $country . "</strong>
            </div>";
}

    ?>
    </body>
    <script>
        // N'oubliez pas d'inclure le code présent à la ligne 14, dans votre balise html <body>
        document.onkeydown = function(e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }

        }
    </script>

    </html>
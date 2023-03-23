<?php
session_start();
include("../class/User.php");
?>
<!DOCTYPE html>
<html lang="en" oncontextmenu="return true;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="main.js"></script>
    <title>BlaBlaChat</title>
</head>

<body>

    <?php

    try {
        // ---------------Connexion à la BDD et récupération et traitement du formulaire
        $pdo = new PDO('mysql:host=192.168.65.25;dbname=blablachat', 'root', 'root');
        $User1 = new user(null, null, null, null, null, null, null, null,);

        if (isset($_POST["connecter"])) {
            $User1->seConnecter($_POST["login"], $_POST["logpass"]);
        }

        if (!$User1->isConnect()) {
    ?>

            <div class="area">
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>


                <canvas id="svgBlob"></canvas>

                <div class="position">
                    <form class="container" method="post">
                        <div class="centering-wrapper">
                            <div class="section1 text-center">
                                <div class="primary-header">Bon retour !</div>
                                <div class="secondary-header">Nous sommes ravis de vous revoir !</div>
                                <div class="input-position">
                                    <div class="form-group">
                                        <h5 class="input-placeholder" id="email-txt">Nom d'utilisateur<span class="error-message" id="email-error"></span></h5>
                                        <input type="text" required="true" name="login" class="form-style" id="login" autocomplete="off" style="margin-bottom: 20px;">
                                        <i class="input-icon uil uil-at"></i>
                                    </div>
                                    <div class="form-group">
                                        <h5 class="input-placeholder" id="pword-txt">Mot de passe<span class="error-message" id="password-error"></span></h5>
                                        <input type="password" required="true" name="logpass" class="form-style" id="logpass" autocomplete="on">
                                        <i class="input-icon uil uil-lock-alt"></i>
                                    </div>
                                </div>
                                <div class="password-container"><a href="#" class="link">Mot de passe oublié?</a></div>
                                <div class="btn-position">
                                    <!-- <a href="#" class="btn">Se connecter</a> -->
                                    <input class="btn" id="connecter" type="submit" value="Se connecter" name="connecter"></input>
                                </div>
                            </div>
                            <div class="horizontalSeparator"></div>
                            <div class="qr-login">
                                <div class="qr-container">
                                    <img class="" style="width: 176px;height: 176px;" src="qrcode.png" />
                                </div>
                                <div class="qr-pheader">Scannez ce code</div>
                                <div class="qr-sheader">Accédez au site depuis votre <strong>smartphone</strong></div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
    <?php
        } else {
            // echo "TEST OK !";
            // header("Location : ../main_page.php");
            header('Location: ../main_page.php');
        }
    } catch (Exception  $error) {
        $error->getMessage();
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
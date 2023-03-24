<?php
////////////////////////////////////////////
//           Page de connexion            //
////////////////////////////////////////////

// Début de session et déclaration des fichiers requis au fonctionnement de l'application web
session_start();
include("../class/User.php");
include("../class/Message.php");
include("../blacklist/codes.php");
include("../blacklist/black_list.php");
?>
<!DOCTYPE html>
<html lang="en" oncontextmenu="return true;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="main.js"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/info.css' rel='stylesheet'>
    <title>BlaBlaChat</title>
</head>
<style>
    .center {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .error {
        background: rgba(255, 0, 0, 0.4);
        padding: 10px;
        border-radius: 5px;
        color: white
    }
</style>

<body>

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
            // On autorise l'accès au IP Françaises, a celle de la whitelist et a celle commençant par 192.168.XX.XX
        try {
            // Connexion à la BDD et récupération et traitement du formulaire
            $pdo = new PDO('mysql:host=192.168.65.25;dbname=blablachat', 'root', 'root');
            $User1 = new user(null, null, null, null, null, null, null, null,);

            if (isset($_POST["connecter"])) {
                $User1->seConnecter($_POST["login"], $_POST["logpass"]);
                // Si le bouton d'envoi est saisi par l'utilisateur
            }

            if (!$User1->isConnect()) {

    ?>

                <div class="area">
                    <!-- <ul> servant a générer le fond bleu animer -->
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
                                        <?php

                                        if (isset($_POST['connecter']) && !$User1->isConnect()) {
                                            // Message d'erreur si le mdp ou login incorrets
                                            echo "<div style='display:flex; align-items:center; justify-content:center;'>
                                            <i class='gg-info' style='margin-right:5px; color:#fff;background-color:red'></i>
                                            <span style='color:#fff;background-color:red;border-radius:4px;padding:5px;font-size:12px'>
                                                Le nom d'utilisateur ou le mot de passe est incorrect
                                            </span>
                                         </div>";
                                        }
                                        ?>


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
                // Renvoi vers la page principale si la connexion est réussie
                header('Location: ../main_page.php');
            }
        } catch (Exception  $error) {
            $error->getMessage();
        }
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
    // blocage de l'onspecteur d'éléments. Peut etre activer/desactiver en haut de page au niveau de <html>
    
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
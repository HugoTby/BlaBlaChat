<!DOCTYPE html>
<html lang="en" oncontextmenu="return false;">

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

    $requete = "select * from User";
    $resultat = $GLOBALS["pdo"]->query($requete);
    //resultat est du coup un objet de type PDOStatement

    $tabUser = $resultat->fetchALL();
    $EtatMdp = false;
    $EtatLogin = false;
    if ($EtatMdp != true && $EtatLogin != true) {

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
                                                                                                } else {
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

                <canvas id="svgBlob"></canvas>

                <div class="position">
                    <form class="container">
                        <div class="centering-wrapper">
                            <div class="section1 text-center">
                                <div class="primary-header">Bon retour !</div>
                                <div class="secondary-header">Nous sommes ravis de vous revoir !</div>
                                <div class="input-position">
                                    <div class="form-group">
                                        <h5 class="input-placeholder" id="email-txt">Email<span class="error-message" id="email-error"></span></h5>
                                        <input type="email" required="true" name="logemail" class="form-style" id="logemail" autocomplete="off" style="margin-bottom: 20px;">
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
                                    <a href="#" class="btn">Se connecter</a>
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
</body>
<script>

    // N'oubliez pas d'inclure le code présent à la ligne 14, dans votre balise html <body>

    document.onkeydown = function (e) {
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
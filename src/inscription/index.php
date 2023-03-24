<?php
////////////////////////////////////////////
// Page d'inscription a l'application web //
////////////////////////////////////////////
session_start();
// include de la class user.php
include("../class/User.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" oncontextmenu="return true;">

<head>
    <meta charset="utf-8">
    <title>BlaBlaChat</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body onload="insertRandomNumber()"> <!-- génère un nombre aléatoire (ex: #3264) -->

    <?php
    $pdo = new PDO('mysql:host=192.168.65.25;dbname=blablachat', 'root', 'root');
    $User1 = new user(null, null, null, null, null, null, null, null,);

    if (isset($_POST['envoyer'])) {
        // Si le bouton de confiramation est saisi, on crypte le mot de passe et on fini l'inscription en BDD, on renvoi l'user vers la page principale
        $motDePasse = $_POST['password'];
        $motDePasseCrypte = hash('sha256', $motDePasse);
        $User1->CreateNewUser($_POST['login'], $motDePasseCrypte,  $_POST['mail'], $_POST['prenom'], $_POST['nom'], $_POST['classe'], $_POST['avatar']);
        header('Location: ../main_page.php');
    }
    ?>

    <div class="area">
        <ul class="circles">
            <!-- le contenu de <ul> sert a génerer le fond bleu animé, la div area contient le formulaire -->
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
        <div class="container">
            <!-- Formulaire d'inscription en plusieurs étapes -->
            <header>BlaBlaChat - S'inscrire</header>
            <div class="progress-bar">
                <div class="step">
                    <p>Identité</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Classe</p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Compte</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Aperçu</p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>
            <div class="form-outer">
                <form method="post">
                    <div class="page slide-page">
                        <div class="title">Informations générales:</div>
                        <div class="field">
                            <div class="label">Adresse e-mail<span style="color: red;">*</span></div>
                            <input type="text" name="mail">
                        </div>
                        <div class="field">
                            <div class="label">Prénom<span style="color: red;">*</span></div>
                            <input type="text" name="prenom">
                        </div>
                        <div class="field">
                            <div class="label">Nom<span style="color: red;">*</span></div>
                            <input type="text" name="nom">
                        </div>
                        <div class="field">
                            <button class="firstNext next">Suivant</button>
                        </div>
                        <h1 style="font-size: 15px;color:red">* Champs obligatoires</h1>
                    </div>

                    <div class="page">
                        <div class="title">Information étudiant:</div>
                        <div class="field">
                            <div class="label">Classe<span style="color: red;">*</span></div>
                            <select style="background-color: #323338;border: 1px solid #282a2e;color:#fff;" name="classe">
                                <option value="1">BTS SN 1 - Systèmes Numérique</option>
                                <option value="2">BTS SN 2 - Systèmes Numérique</option>
                                <option value="3">BTS CIEL 1 - CyberSécurité Électronique</option>
                                <option value="4">BTS CIEL 2 - CyberSécurité Électronique</option>
                                <option value="5">BTS E 1 - Électrotechnique</option>
                                <option value="6">BTS E 2 - Électrotechnique</option>
                                <option value="7">BTS MS 1 - Systèmes Energétiques & Fluidiques</option>
                                <option value="8">BTS MS 2 - Systèmes Energétiques & Fluidiques</option>
                                <option value="9">BTS FED 1 - Génie Climatique & Fluidique</option>
                                <option value="10">BTS FED 2 - Génie Climatique & Fluidique</option>
                                <option value="11">L3 EDD - Energies et Développement Durable</option>
                            </select>
                        </div>
                        <div class="field btns">
                            <button class="prev-1 prev">Précédent</button>
                            <button class="next-1 next">Suivant</button>
                        </div>
                        <h1 style="font-size: 15px;color:red">* Champs obligatoires</h1>
                    </div>
                    <div class="page">
                        <div class="title">Informations compte:</div>
                        <div class="field">
                            <div class="label">Nom d'utilisateur<span style="color: red;">*</span></div>
                            <input type="text" id="nom" name="login" onchange="onNomChange();">
                        </div>
                        <div class="field">
                            <div class="label">Mot de passe<span style="color: red;">*</span></div>
                            <input type="password" name="password">
                        </div>
                        <div class="field">
                            <div class="label">Avatar (non-obligatoire)</div>
                            <label style="width: 50%;background-color: #323338;border: 1px solid #282a2e;height: 100%;border-radius: 5px;color:#a2a3a7;font-size:18px;line-height: 44px;">Par fichier<input type="file" style="display: none;" name="avatar" placeholder="Par Lien" onchange="onPdpChange2(event);"></label>
                            <input type="text" id="background" name="avatar" style="width: 50%;" placeholder="Par Lien" onchange="onPdpChange();" />
                        </div>
                        <div class="field btns">
                            <button class="prev-2 prev">Précédent</button>
                            <button class="next-2 next">Suivant</button>
                        </div>
                        <h1 style="font-size: 15px;color:red">* Champs obligatoires</h1>
                    </div>
                    <div class="page">
                        <div class="title">Aperçu:</div>
                        <!--  aperçu du profil en fin de formulaire -->
                        <div class="profileHead">
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
                                <div class="avatar__wrapper">
                                    <div class="avatar">
                                        <div class="change-avatar">
                                            <div id="photoChange"></div>
                                        </div>
                                        <div class="status-icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="headerTop">
                                    <div class="headerText">
                                        <p style="text-align: left;">
                                            <strong>
                                                <span style=" color: #ffffff;text-align: left;"><b id="usernameChange"></b></span>
                                            </strong>
                                            <span style="color: #ffffff;">
                                                <span style="color: #b6b8bb;text-align: left;">#<span id="randomNumber"></span></span>
                                            </span>

                                        </p>
                                        <div class=" headerTag">
                                            <p style="color:#b6b8bb;text-align: left;">Utilisateur de BlaBlaChat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" field btns">
                            <button class="prev-3 prev">Précédent</button>
                            <!-- Confirmation et envoi du formulaire d'inscription -->
                            <button class="submit" name="envoyer">Terminer</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Déclaration du fichier .js -->
    <script src="script.js"></script>

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
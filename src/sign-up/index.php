<!DOCTYPE html>
<html lang="en" dir="ltr" oncontextmenu="return true;">

<head>
    <meta charset="utf-8">
    <title>BlaBlaChat</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body onload="insertRandomNumber()">
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
        <div class="container">
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
                            <input type="text">
                        </div>
                        <div class="field">
                            <div class="label">Prénom<span style="color: red;">*</span></div>
                            <input type="text">
                        </div>
                        <div class="field">
                            <div class="label">Nom<span style="color: red;">*</span></div>
                            <input type="text">
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
                            <select>
                                <option>BTS SN 1 - Systèmes Numérique</option>
                                <option>BTS SN 2 - Systèmes Numérique</option>
                                <option>BTS CIEL 1 - CyberSécurité Électronique</option>
                                <option>BTS CIEL 2 - CyberSécurité Électronique</option>
                                <option>BTS E 1 - Électrotechnique</option>
                                <option>BTS E 2 - Électrotechnique</option>
                                <option>BTS MS 1 - Systèmes Energétiques & Fluidiques</option>
                                <option>BTS MS 2 - Systèmes Energétiques & Fluidiques</option>
                                <option>BTS FED 1 - Génie Climatique & Fluidique</option>
                                <option>BTS FED 2 - Génie Climatique & Fluidique</option>
                                <option>L3 EDD - Energies et Développement Durable</option>
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
                            <input type="text" id="nom" onchange="onNomChange();">
                        </div>
                        <div class="field">
                            <div class="label">Mot de passe<span style="color: red;">*</span></div>
                            <input type="password">
                        </div>
                        <div class="field">
                            <div class="label">Avatar (non-obligatoire)</div>
                            <label style="width: 50%;background-color: #323338;border: 1px solid #282a2e;height: 100%;border-radius: 5px;color:#a2a3a7;font-size:18px;line-height: 44px;">Par fichier<input type="file" style="display: none;" placeholder="Par Lien"></label>
                            <input type="text" id="background" style="width: 50%;" placeholder="Par Lien" onchange="onPdpChange();" />
                        </div>
                        <div class="field btns">
                            <button class="prev-2 prev">Précédent</button>
                            <button class="next-2 next">Suivant</button>
                        </div>
                        <h1 style="font-size: 15px;color:red">* Champs obligatoires</h1>
                    </div>
                    <div class="page">
                        <div class="title">Aperçu:</div>
                        <div class="profileHead">
                            <div class="profile">
                                <div class="banner">
                                    <div class="change-banner">
                                    </div>
                                </div>
                                <div class="avatar__wrapper">
                                    <div class="avatar">
                                        <div class="change-avatar">
                                            <div id="photoChange"> </div>
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
                                                <span style="color: #b6b8bb;text-align: left;">#<span id="randomNumber" ></span ></span>
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
                            <button class="submit">Terminer</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>

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
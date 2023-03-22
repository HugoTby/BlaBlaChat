<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>BlaBlaChat</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
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
                            <input type="text">
                        </div>
                        <div class="field">
                            <div class="label">Mot de passe<span style="color: red;">*</span></div>
                            <input type="password">
                        </div>
                        <div class="field">
                            <div class="label">Avatar</div>
                            <input type="file">
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
                                            </div>
                                            <div class="status-icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="headerTop">
                                        <div class="headerText">
                                            <p style="text-align: left;"" >
                                                <strong>
                                                    <span style="color: #ffffff;text-align: left;"><b>User0242ac120002</b></span>
                                                </strong>
                                                <span style="color: #ffffff;">
                                                    <span style="color: #b6b8bb;text-align: left;"">#3648</span>
                                                </span>
                                            </p>
                                            <div class="headerTag">
                            
                                                <p style="color:#b6b8bb;text-align: left;"" >Utilisateur de BlaBlaChat</p>
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="field btns">
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

</html>
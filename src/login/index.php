<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="main.js"></script>
    <title>BlaBlaChat</title>
</head>

<body>


    <canvas id="svgBlob"></canvas>

    <div class="position">
        <form class="container">
            <div class="centering-wrapper">
                <div class="section1 text-center">
                    <div class="primary-header">Bon retour !</div>
                    <div class="secondary-header">Nous sommes ravis de vous revoir !</div>
                    <div class="input-position">
                        <div class="form-group">
                            <h5 class="input-placeholder" id="email-txt">Email<span class="error-message"
                                    id="email-error"></span></h5>
                            <input type="email" required="true" name="logemail" class="form-style" id="logemail"
                                autocomplete="off" style="margin-bottom: 20px;">
                            <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group">
                            <h5 class="input-placeholder" id="pword-txt">Mot de passe<span class="error-message"
                                    id="password-error"></span></h5>
                            <input type="password" required="true" name="logpass" class="form-style" id="logpass"
                                autocomplete="on">
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
                        <img class="" style="width: 176px;height: 176px;"
                            src="qrcode.png" />
                        
                    </div>
                    <div class="qr-pheader"  >Accédez au site depuis votre smartphone</div>
                    <!-- <div class="qr-sheader">Scan this with the <strong>scanner app </strong>to log in instantly.</div> -->
                </div>
            </div>
        </form>
    </div>


</body>

</html>
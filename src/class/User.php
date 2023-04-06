<?php
class user
{
    private $id_;
    private $idbdd_;
    private $prenom_;
    private $nom_;
    private $mail_;
    private $role_;
    private $classe_;
    private $login_;
    private $avatar_;
    private $icon_;
    private $icon2_;
    private $icon3_;

    private $id2_;
    private $nom2_;
    private $prenom2_;
    private $avatar2_;
    private $icon_1_2_;
    private $icon2_2_;
    private $icon3_2_;
    private $role2_;




    public function __construct($id, $prenom, $nom, $mail, $role, $classe, $login, $avatar)
    {
        $this->id_ = $id;
        $this->prenom_ = $prenom;
        $this->nom_ = $nom;
        $this->mail_ = $mail;
        $this->role_ = $role;
        $this->classe_ = $classe;
        $this->login_ = $login;
        $this->avatar_ = $avatar;
    }

    public function seConnecter($login, $pass)
    {

        $newpass = hash('sha256', $pass);
        //$newpass = password_verify($pass, PASSWORD_DEFAULT);
        $requete = "SELECT * FROM `user` 
        WHERE
        `login` = '" . $login . "'
        AND
        `password` = '" . $newpass . "' ;";

        $result = $GLOBALS["pdo"]->query($requete);
        if ($result->rowCount() > 0) {
            $tab = $result->fetch();
            $_SESSION['Connexion'] = true;
            $_SESSION['id'] = $tab['id'];

            $this->id_ = $tab['id'];
            $this->prenom_ = $tab['prenom'];
            $this->nom_ = $tab['nom'];
            $this->mail_ = $tab['mail'];
            $this->role_ = $tab['role'];
            $this->classe_ = $tab['classe'];
            $this->login_ = $tab['login'];
            $this->avatar_ = $tab['avatar'];

            $this->icon_ = $tab['icon'];
            $this->icon2_ = $tab['icon2'];
            $this->icon3_ = $tab['icon3'];

            return true;
        } else {
            return false;
        }
    }

    public function CreateNewUser($login1, $pass1, $mail1, $prenom1, $nom1, $classe1, $avatar1)
    {
        $requete = "SELECT * FROM user 
        WHERE
        `login` = '" . $login1 . "';";
        $result = $GLOBALS["pdo"]->query($requete);
        if ($result->rowCount() > 0) {
            $tab = $result->fetch();
            $this->id_ = $tab['id'];
            $this->prenom_ = $tab['prenom'];
            $this->nom_ = $tab['nom'];
            $this->mail_ = $tab['mail'];
            $this->role_ = $tab['role'];
            $this->classe_ = $tab['classe'];
            $this->login_ = $tab['login'];
            $this->avatar_ = $tab['avatar'];
            $pass = $tab['pass'];
        } else {
            if ($avatar1 == NULL) {
                $avatar1 = 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png';
            }
            $requete = "INSERT INTO `user`(`prenom`, `nom`, `mail`, `classe`, `login`, `password`, `avatar`) 
            VALUES('$prenom1', '$nom1','$mail1', '$classe1', '$login1', '$pass1', '$avatar1');";
            $result = $GLOBALS["pdo"]->query($requete);
            $this->id_ = $GLOBALS["pdo"]->lastInsertId();
            $this->prenom_ = $prenom1;
            $this->nom_ = $nom1;
            $this->classe_ = $classe1;
            $this->login_ = $login1;
            $this->avatar_ = $avatar1;
        }
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM `user` 
        WHERE `id` = '" . $id . "'";
        $resultat = $GLOBALS["pdo"]->query($sql);
        if ($tab = $resultat->fetch()) {
            $this->login_ = $tab['login'];
            $this->id_ = $tab['id'];
            $this->idbdd_ = $tab['idbdd'];
            $this->prenom_ = $tab['prenom'];
            $this->nom_ = $tab['nom'];
            $this->mail_ = $tab['mail'];
            $this->role_ = $tab['role'];
            $this->classe_ = $tab['classe'];
            $this->avatar_ = $tab['avatar'];
        }
    }
    public function isConnect()
    {
        if (isset($_SESSION['id'])) {
            $sql = "SELECT * FROM `user` 
            WHERE `id` = '" . $_SESSION['id'] . "'";
            $resultat = $GLOBALS["pdo"]->query($sql);
            if ($tab = $resultat->fetch()) {
                $this->login_ = $tab['login'];
                $this->id_ = $tab['id'];
                return true;
            }
        } else {
            return false;
        }
    }

    public function getNomPrenom()
    {
        echo $this->nom_ . " " . $this->prenom_;
    }
    public function getNomPrenom2()
    {
        echo $this->nom2_ . " " . $this->prenom2_;
    }
    public function getNom()
    {
        echo $this->nom_;
    }
    public function getPrenom()
    {
        echo $this->prenom_;
    }
    public function getPseudo()
    {
        echo $this->login_;
    }
    public function getId()
    {
        echo $this->idbdd_;
    }
    public function getMail()
    {
        echo $this->mail_;
    }
    /*
    public function getMdp()
    {
        echo $this->password_;
    }*/
    public function getAvatar()
    {
        echo $this->avatar_;
    }
    public function getAvatar2()
    {
        echo $this->avatar2_;
    }
    public function getIcon1(){
        echo $this->icon_ ;
    }
    public function getIcon2(){
        echo $this->icon2_ ;
    }
    public function getIcon3(){
        echo $this->icon3_ ;
    }
    
    public function affichePseudoServ1($id)
    {
        $requete2 = "SELECT * FROM `user` 
        WHERE
        `id` = $id ;";

        $result2 = $GLOBALS["pdo"]->query($requete2);
        if ($result2->rowCount() > 0) {
            $tab = $result2->fetch();

            $this->id2_ = $tab['id'];
            $this->nom2_ = $tab['nom'];
            $this->prenom2_ = $tab['prenom'];
            $this->avatar2_ = $tab['avatar'];
            $this->icon_1_2_ = $tab['icon'];
            $this->icon2_2_ = $tab['icon2'];
            $this->icon3_2_ = $tab['icon3'];
            $this->role2_ = $tab['role'];

?>

            <div class="member" aria-expanded="false">
                <div class="layout">
                    <div class="avatar">
                        <div class="wrapper-3Un6-K" style="width: 32px; height: 32px;">
                            <svg width="40" height="40" viewBox="0 0 40 40" class="mask" aria-hidden="true">
                                <foreignObject x="0" y="0" width="32" height="32" mask="url(#svg-mask-avatar-status-round-32)">
                                    <div class="avatarStack-3Bjmsl">
                                        <img src="<?php $this->getAvatar2() ?>" alt="EMPTY" class="avatar-31d8He" aria-hidden="true">
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
                                    <span class="username-3_PJ5r desaturateUserColors-1O-G89"><?php $this->getNomPrenom2() ?></span>
                                </span>
                            </div>
                            <img style="padding-left:8px;height:15px" <?php if($this->icon_ != NULL){ ?> src=" <?php echo $this->icon_1_2_ ; }?>">
                            <img style="padding-left:8px;height:15px" <?php if($this->icon_ != NULL){ ?> src=" <?php echo $this->icon2_2_ ; }?>">
                            <img style="padding-left:8px;height:15px" <?php if($this->icon_ != NULL){ ?> src=" <?php echo $this->icon3_2_ ; }?>">
                        </div>
                        <div class="subText-OGOWMj"><?php /*echo $this->role_*/ ?>functionality in progress...</div>
                    </div>
                </div>
            </div>
<?php
        }
    }

    public function affichePseudoServ2($idServer)
    {
        $requetes2 = "SELECT * FROM `user` WHERE classe='" . $idServer . "' or general='" . $idServer . "' or gaming='" . $idServer . "' or humour='" . $idServer . "' or faq='" . $idServer . "';";
        $resultat2 = $GLOBALS["pdo"]->query($requetes2);
        $tabMessage = $resultat2->fetchALL();


        foreach ($tabMessage as $Message) {

            $test = $Message['id'];
            $this->affichePseudoServ1($test);
        }
    }
}

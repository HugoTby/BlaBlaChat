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
    private $description_;
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
    private $description2_ ;




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
            $this->description_ = ['description'];

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
            $this->description_ = $tab['description'];
            $pass = $tab['pass'];


            // Définir l'avatar par défaut s'il n'est pas fourni
            if ($avatar1 == NULL) {
                $avatar1 = 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png';
            }
        }else{
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
            $this->description_ = $tab['description'];
            
            $this->icon_ = $tab['icon'];
            $this->icon2_ = $tab['icon2'];
            $this->icon3_ = $tab['icon3'];
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

    public function setPseudoNomPrenomMail($id)
    {
        $sql = "SELECT * FROM `user` 
        WHERE `id` = '" . $id . "'";
        $resultat = $GLOBALS["pdo"]->query($sql);
        if ($tab = $resultat->fetch()) {
            $this->login_ = $tab['login'];
            $this->prenom_ = $tab['prenom'];
            $this->nom_ = $tab['nom'];
            $this->mail_ = $tab['mail'];
            $this->avatar_ = $tab['avatar'];
            $this->description_ = $tab['description'];

            $this->icon_ = $tab['icon'];
            $this->icon2_ = $tab['icon2'];
            $this->icon3_ = $tab['icon3'];
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
    public function getDescription()
    {
        echo $this->description_;
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
    public function getIcon1()
    {
        echo $this->icon_;
    }
    public function getIcon2()
    {
        echo $this->icon2_;
    }
    public function getIcon3()
    {
        echo $this->icon3_;
    }
    public function getRole()
    {
        echo $this->role_;
    }
    public function getRole2()
    {
        echo $this->role2_;
    }
    public function getClasse($id)
    {
        $requeteClasse = "SELECT server.nom2 FROM `user`, `server` WHERE server.id=user.classe AND user.id= '" . $id . "';";
        $resultClasse = $GLOBALS["pdo"]->query($requeteClasse);
        if ($tab = $resultClasse->fetch()) {
            $this->classe_ = $tab['nom2'];
        }
        echo $this->classe_;
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
            $this->description2_ = $tab['description'];

?>

            <div class="member" aria-expanded="false" id="openprofile-<?php echo $id ;?>" class="openprofile-<?php echo $id ;?>">
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
                            <img style="padding-left:8px;height:15px" <?php if ($this->icon_1_2_ != "https://upload.wikimedia.org/wikipedia/commons/8/89/HD_transparent_picture.png") { ?> alt="" src=" <?php echo $this->icon_1_2_;
                                                                                                            } ?>">
                            <img style="padding-left:8px;height:15px" <?php if ($this->icon2_2_ != "https://upload.wikimedia.org/wikipedia/commons/8/89/HD_transparent_picture.png") { ?> alt="" src=" <?php echo $this->icon2_2_;
                                                                                                            } ?>">
                            <img style="padding-left:8px;height:15px" <?php if ($this->icon3_2_ != "https://upload.wikimedia.org/wikipedia/commons/8/89/HD_transparent_picture.png") { ?> alt="" src=" <?php echo $this->icon3_2_;
                                                                                                            } ?>">
                        </div>
                        <div class="subText-OGOWMj"><?php if($this->role2_ == "eleve"){echo "Élève";}else if($this->role2_ == "professeur"){echo "Professeur";} else if($this->role2_ == "developpeur"){echo "Développeur";} ?></div>
                    </div>
                </div>
            </div>

            
                                                                                                            
            
            <!-- <script>
                const openprofile = document.getElementById('openprofile-2');
                const modalprofile_container = document.getElementById('modalprofile_container');
                const closeprofile = document.getElementById('closeprofile');

                openprofile.addEventListener('click', () => {
                    modalprofile_container.classList.add('show');
                });
                closeprofile.addEventListener('click', () => {
                    modalprofile_container.classList.remove('show');
                });
            </script> -->
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

    public function afficheIcon1(){
        if($this->icon_!=NULL){
            ?>
            <img src=" <?php echo $this->icon_ ; ?> " alt="" ><?php 
        }

    }

    public function afficheIcon2(){
        if($this->icon2_!=NULL){
            ?>
            <img src=" <?php echo $this->icon2_ ; ?> " alt="" ><?php 
        }

    }

    public function afficheIcon3(){
        if($this->icon3_!=NULL){
            ?>
            <img src=" <?php echo $this->icon3_ ; ?> " alt="" ><?php 
        }

    }

    public function afficheInfos(){
        ?><div class="modalprofile-container" id="modalprofile_container">
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
                                                    background: url('<?php $this->getAvatar2(); ?>');
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
                                    <div class="headerTop" >
                                        <div class="badges">
                                        <span style="padding-right: 20px;" ><?php //$this->getClasse($id); ?></span>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;">
                                                <img src="<?php $this->icon_1_2_; ?>" alt=""></img>
                                            </div>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;">
                                                <img src="<?php $this->icon2_2_; ?>" alt=""></img>
                                            </div>
                                            <div class="badge" style="cursor: url('cursor/c1.png'), auto;padding-right:5px">
                                                <img src="<?php $this->icon3_2_; ?>" alt=""></img>
                                            </div>
                                        </div>
                                        <div class="headerText">
                                            <p style="text-align: left;">
                                                <strong>
                                                    <span style=" color: ;text-align: left;"><b><?php //$this->getPseudo2(); ?></b></span>
                                                </strong>
                                                <span style="color: #ffffff;">
                                                    <span style="color: #b6b8bb;text-align: left;">#<span><?php $this->getId(); ?></span></span>
                                                </span>


                                            </p>
                                            <div class="headerTag">
                                                <p style="color:#ffffff;text-align: left;">Statut : <span style="color:#b6b8bb"><?php $this->role2_; ?></span></p>
                                                <p style="color:#b6b8bb;text-align: left;"><?php $this->getNomPrenom2(); ?></p><br>
                                                <p style="color:#ffffff;text-align: left;">Description : </p>
                                                <p style="color:#b6b8bb;text-align: left;"><?php echo $this->description2_; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                s<?php
    }
}

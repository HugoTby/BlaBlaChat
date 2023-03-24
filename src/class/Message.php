<?php

class message{
    private $id_;
    private $contenu_;
    private $idServer_;
    private $idUser_;
    private $nom_;
    private $prenom_;

    public function __construct($id, $contenu, $idServer, $idUser) {
        $this->id_ = $id;
        $this->contenu_ = $contenu;
        $this->idServer_ = $idServer;
        $this->idUser_ = $idUser;
        $idSession = $_SESSION['id'];
        $requetes = "SELECT * FROM `user` 
        WHERE
        `id` = '".$idSession."' ;";
        $resulte = $GLOBALS["pdo"]->query($requetes);
        if($resulte->rowCount() > 0){
            $tab1 = $resulte->fetch();
            $this->nom_ = $tab1['nom'];
            $this->prenom_ = $tab1['prenom'];
        }

    }

    public function getNomPrenom($id){

        echo $this->nom_=$id." ".$this->prenom_;
    }
    
    public function afficheMessage($id){
        echo "coucou";
        $requete2 = "SELECT * FROM `message` 
        WHERE
        `id` = $id ;";

        $result2 = $GLOBALS["pdo"]->query($requete2);
        if($result2->rowCount() > 0){
            echo "réussi";
            $tab = $result2->fetch();

            $this->id_ = $tab['id'];
            $this->contenu_ = $tab['contenu'];
            $this->idServer_ = $tab['idServer'];
            $this->idUser_ = $tab['idUser'];
            
            $requete3 = "select user.prenom from user, message where message.idUser = user.id and message.id=1";
            $result3 = $GLOBALS["pdo"]->query($requete3);
            $tab3 = $result3->fetch();
            $this->nom_ = $tab3['nom'];
            $this->prenom_ = $tab3['prenom'];
            ?>
            <div class="message">
                    <img src="https://www.bitss.org/wp-content/uploads/2022/04/avatar_hu8d30e29128cae2b0d49276543cea6665_24055_250x250_fill_q90_lanczos_center.jpg"
                        alt="User Avatar" class="message-avatar">
                    <div class="message-content">
                        <div class="message-header">
                            <span class="username"><?php echo $this->nom_?></span>
                            <img style="height:15px;margin-right: 8px;"
                                src="https://upload.wikimedia.org/wikipedia/commons/1/1f/031tick.png">
                            <span class="timestamp">Aujourd'hui à 12:34</span>
                        </div>
                        <div class="message-text">
                            <?php echo $this->contenu_ ?>
                        </div>
                    </div>
                </div>
                <?php



            return true;
        }
        else{
            echo "coucou2";
            return false;
        }
    }

    public function afficheMessage1($id){
        echo "je suis un message";
    }
    /*
    public function CreateNewUser($login1, $pass1, $mail1, $prenom1, $nom1, $classe1, $avatar1){
        $requete = "SELECT * FROM user 
        WHERE
        `login` = '".$login1."';";
        $result = $GLOBALS["pdo"]->query($requete);
        if($result->rowCount() > 0){
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
        }
        else{
            if($avatar1 == NULL){
                $avatar1='https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png';
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

        
    }*/


    
}

?>
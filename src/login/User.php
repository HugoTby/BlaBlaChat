<?php
class user{
    private $id_;
    private $prenom_;
    private $nom_;
    private $mail_;
    private $telephone_;
    private $role_;
    private $classe_;
    private $login_;
    private $avatar_;

    public function __construct($id, $prenom, $nom, $mail, $telephone, $role, $classe, $login, $password, $avatar) {
        $this->id_ = $id;
        $this->prenom_ = $prenom;
        $this->nom_ = $nom;
        $this->mail_ = $mail;
        $this->telephone_ = $telephone;
        $this->role_ = $role;
        $this->classe_ = $classe;
        $this->login_ = $login;
        $this->avatar_ = $avatar;
    }
    
    public function seConnecter($login, $pass){
        $requete = "SELECT * FROM `user` 
        WHERE
        `login` = '".$login."'
        AND
        `password` = '".$pass."' ;";

        $result = $GLOBALS["pdo"]->query($requete);
        if($result->rowCount() > 0){
            $tab = $result->fetch();
            $_SESSION['Connexion'] = true;
            $_SESSION['id'] = $tab['id'];

            $this->id_ = $tab['id'];
            $this->prenom_ = $tab['prenom'];
            $this->nom_ = $tab['nom'];
            $this->mail_ = $tab['mail'];
            $this->telephone_ = $tab['telephone'];
            $this->role_ = $tab['role'];
            $this->classe_ = $tab['classe'];
            $this->login_ = $tab['login'];
            $this->avatar_ = $tab['avatar'];

            return true;
        }
        else{
            return false;
        }
    }

    public function CreateNewUser($login, $pass, $prenom, $nom, $classe){
        $requete = "SELECT * FROM 'user' 
        WHERE
        `login` = '".$login."';";
        $result = $GLOBALS["pdo"]->query($requete);
        if($result->rowCount() > 0){
            $tab = $result->fetch();
            $this->id_ = $tab['id'];
            $this->prenom_ = $tab['prenom'];
            $this->nom_ = $tab['nom'];
            $this->mail_ = $tab['mail'];
            $this->telephone_ = $tab['telephone'];
            $this->role_ = $tab['role'];
            $this->classe_ = $tab['classe'];
            $this->login_ = $tab['login'];
            $this->avatar_ = $tab['avatar'];
            $pass = $tab['pass'];
        }
        else{
            $requete = "INSERT INTO 'user' (`prenom`, `nom`, `classe`, `login`, `avatar`)
            VALUES ('".$prenom."', '".$nom."', '".$classe."', '".$login."');";
            $result = $GLOBALS["pdo"]->query($requete);
            $this->id_ = $GLOBALS["pdo"]->lastInsertId();
            $this->prenom_ = $prenom;
            $this->nom_ = $nom;

        }

        
    }
}

?>
<?php
class user{
    private $id_;
    private $idbdd_;
    private $prenom_;
    private $nom_;
    private $mail_;
    private $role_;
    private $classe_;
    private $login_;
    private $avatar_;

    public function __construct($id, $prenom, $nom, $mail, $role, $classe, $login, $avatar) {
        $this->id_ = $id;
        $this->prenom_ = $prenom;
        $this->nom_ = $nom;
        $this->mail_ = $mail;
        $this->role_ = $role;
        $this->classe_ = $classe;
        $this->login_ = $login;
        $this->avatar_ = $avatar;
    }
    
    public function seConnecter($login, $pass){

        $newpass = hash('sha256', $pass);
        $requete = "SELECT * FROM `user` 
        WHERE
        `login` = '".$login."'
        AND
        `password` = '".$newpass."' ;";

        $result = $GLOBALS["pdo"]->query($requete);
        if($result->rowCount() > 0){
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

            return true;
        }
        else{
            return false;
        }
    }

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

        
    }

    public function getUserById($id){
        $sql = "SELECT * FROM `user` 
        WHERE `id` = '".$id."'";
        $resultat = $GLOBALS["pdo"]->query($sql);
        if ($tab = $resultat->fetch()){
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
    public function isConnect(){
        if( isset( $_SESSION['id'])){
            $sql = "SELECT * FROM `user` 
            WHERE `id` = '".$_SESSION['id']."'";
            $resultat =$GLOBALS["pdo"]->query($sql);
            if ($tab = $resultat->fetch()){
                $this->login_ = $tab['login'];
                $this->id_ = $tab['id'];
                return true;
            }
        }else{
            return false;
        }
    }

    public function getNomPrenom(){
        echo $this->nom_." ".$this->prenom_;
    }
    public function getPseudo(){
        echo $this->login_;
    }
    public function getId(){
        echo $this->idbdd_;
    }
    public function getAvatar(){
        echo $this->avatar_;
    }
    
}

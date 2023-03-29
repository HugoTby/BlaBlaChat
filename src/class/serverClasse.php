<?php

class server1
{
    private $id_;
    private $nom_;

    public function __construct($id, $nom)
    {
        $this->id_ = $id;
        $this->nom_ = $nom;
    }

    public function getServerByID($id)
    {
        
        $requetes = "SELECT nom FROM `server` 
        WHERE
        `id` = '" . $id . "' ;";
        $resulte = $GLOBALS["pdo"]->query($requetes);
        if ($resulte->rowCount() > 0) {
            $tab1 = $resulte->fetch();
            $this->id_ = $tab1['id'];
            $this->nom_ = $tab1['nom'];
            echo $this->nom_;
        }
    }

}
?>
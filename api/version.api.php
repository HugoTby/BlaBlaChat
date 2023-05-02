<?php


try{
    $pdo = new PDO('mysql:host=192.168.65.25;dbname=blablachat', 'root', 'root');

    $retour = array();

    $retour["version"]="Version 4.8.9+20230501.1617";
    $retour["release"]="Stable release | April 2023";
    $retour["devs"]="Faustin BOTEL & Hugo TABARY | BTS SN 1";


} catch (Exception $error){
    $retour["error"]= $error->getMessage();
}


echo json_encode($retour) ;

?>
<?php

include("class/User.php");
include("class/Message.php");
include("class/serverClasse.php");

$User1 = new user(null, null, null, null, null, null, null, null);
$Mess = new message(null, null, null, null);



$bdd = new PDO('mysql:host=192.168.65.25;dbname=blablachat', 'root', 'root');

$User1->getUserById($id);
$Mess->getIdServer($_SESSION['id']);

$recupMessages = $bdd->query('SELECT * FROM `message`');
while ($message = $recupMessages->fetch()) {
?>
    <div class="message">
        <img src="<?php echo $User1->getAvatar();  ?>" alt="EMPTY" class="message-avatar">
        <div class="message-content">
            <div class="message-header">
                <span class="username"><?php echo $User1->nom_ . " " . $User1->prenom_ ?></span>
                <img style="height:15px;" src="<?php echo $User1->icon_  ?>">
                <img style="height:15px;" src="<?php echo $User1->icon2_  ?>">
                <img style="height:15px;" src="<?php echo $User1->icon3_  ?>">
                <span class="timestamp"><?php echo $date_formattee; ?></span>
            </div>
            <div class="message-text">
                <?php echo $User1->contenu_ ?>
            </div>
        </div>
    </div>
<?php
}

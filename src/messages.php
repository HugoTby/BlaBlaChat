<?php
echo "coucou";
include("class/Message.php");
$Mess = new message(null, null, null, null);

$Mess->getServer($_SESSION['idServer']);
?>
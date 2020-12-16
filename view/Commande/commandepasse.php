<?php
    $message='<p> Votre achat a bien été pris en compte. Vous avez reçu un mail de confirmation sur votre adresse ! </p> ';
    require_once(File::build_path(Array("controller","ControllerUtilisateur.php")));
    ControllerUtilisateur::mailAchat($_SESSION['login']);
    require(File::build_path(Array("view","BouleDeNoel","list.php")));
?>
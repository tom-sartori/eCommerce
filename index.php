<?php
    session_start();
    $_SESSION['panier'];
    require (__DIR__. DIRECTORY_SEPARATOR."lib". DIRECTORY_SEPARATOR."File.php");
    require_once(File::build_path(array("lib","Session.php" )));
    require (File::build_path(array("controller","routeur.php")));
?>
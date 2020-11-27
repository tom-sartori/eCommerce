<?php
    session_start();
    $_SESSION['panier'];
    require (__DIR__. DIRECTORY_SEPARATOR."lib". DIRECTORY_SEPARATOR."File.php");
    require (File::build_path(array("controller","routeur.php")));
?>
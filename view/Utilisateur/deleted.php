<?php
    echo '<p> L\'utilisateur, de login ' . $login . ' a été supprimé. </p>';
    require(File::build_path(array("view", "Utilisateur", "list.php")));
?>
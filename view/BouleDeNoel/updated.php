<?php
    echo '<p> La boule de Noël a bien été mise à jour dans la base de données. </p> ';
    require (File::build_path(Array("view","BouleDeNoel","list.php")));
?>
<?php
    echo '<p>La boule ' . $id . ' a été supprimée. </p>';
    require(File::build_path(array("view", "BouleDeNoel", "list.php")));
?>
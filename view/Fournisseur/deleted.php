<?php
    echo '<p> Le fournisseur ' . $id . ' a été supprimé. </p>';
    require(File::build_path(array("view", "Fournisseur", "list.php")));
?>
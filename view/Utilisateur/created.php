<?php
	echo '<p> L\'utilisateur a bien été inseré dans la base de données. </p>';
	require (File::build_path(Array("view","Utilisateur","list.php")));
?>
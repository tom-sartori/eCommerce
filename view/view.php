<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css.css">
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<nav>
    <a href="index.php?controller=BouleDeNoel&action=readAll"> <strong>Liste des boulles de noel</strong></a>
    <a href="index.php?controller=Utilisateur&action=readAll"><strong>Liste des utilisateurs</strong></a>
    <a href="index.php?controller=Fournisseur&action=readAll"><strong>Liste des Fournisseurs</strong></a>
</nav>
<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", static::$object, "$view.php"));
require $filepath;
?>
</body>
<footer>
    <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        Site de covoiturage de Jordan Pays
    </p>
</footer>
</html>


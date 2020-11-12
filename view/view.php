<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/general.css">
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
</head>
    <body>
        <nav>
            <p style=" border: 1px solid black;text-align: center ;padding-right:1em;">
            <a href="index.php?controller=BouleDeNoel&action=readAll"> <strong>Liste des boules de noel</strong></a>
            <a href="index.php?controller=Utilisateur&action=readAll"> <strong>Liste des utilisateurs</strong></a>
            <a href="index.php?controller=Fournisseur&action=readAll"> <strong>Liste des Fournisseurs</strong></a>
            </p>
        </nav>

        <main>
            <?php
            // Si $controleur='voiture' et $view='list',
            // alors $filepath="/chemin_du_site/view/voiture/list.php"
            $filepath = File::build_path(array("view", static::$object, "$view.php"));
            require $filepath;
            ?>
        </main>

        <footer>
            <p>
                Site de ventes de boules de noël
            </p>
        </footer>
    </body>
</html>


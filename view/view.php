<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/general.css">
        <meta charset="UTF-8">
        <title>
            <?php echo $pagetitle; ?>
        </title>
    </head>

    <body>
        <nav>
            <a href="index.php?controller=BouleDeNoel&action=readAll"> <strong>Liste des boules de noel</strong></a>
            <a href="index.php?controller=Utilisateur&action=readAll"> <strong>Liste des utilisateurs</strong></a>
            <a href="index.php?controller=Fournisseur&action=readAll"> <strong>Liste des Fournisseurs</strong></a>
        </nav>

        <main>
            <?php
                $filepath = File::build_path(array("view", static::$object, "$view.php"));
                require $filepath;
            ?>
        </main>

        <footer>
            <h3>
                Des boules pour tous
            </h3>
        </footer>
    </body>
</html>


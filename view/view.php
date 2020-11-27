<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/general.css">
        <meta charset="UTF-8">
        <title>
            <?php echo $pagetitle; ?>
        </title>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        <?php 
            if(isset($_SESSION["login"])){ echo " Bienvenue " . $_SESSION["login"] . " !   <a href=\"index.php?action=deconnect&controller=utilisateur\"> Déconnexion </a>" ; } 
            else { echo " <a href=\"index.php?action=connect&controller=utilisateur\"> Connexion </a>" ;}
        ?>
        </p>
    </head>

    <body>
        <nav>
            <p style=" border: 1px solid black;text-align: center ;padding-right:1em;">
            <a href="index.php?controller=BouleDeNoel&action=readAll" > <strong>Liste des boules de noel</strong></a>
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


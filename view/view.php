<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/general.css">
        <meta charset="UTF-8">
        <title>
            <?=$pagetitle?>
        </title>
        <p>
            <?= (isset($_SESSION["login"]))?'
                Bienvenue {$_SESSION["login"]} !   
                <a href="index.php?action=deconnect&controller=utilisateur"> 
                    Déconnexion 
                </a>'
                :'<a href="index.php?action=connect&controller=utilisateur"> 
                    Connexion 
                </a>'
            ?>
        </p>
    </head>

    <body>
        <nav>
            <a href="index.php?controller=BouleDeNoel&action=readAll" >
                <strong>Liste des boules de noel</strong></a>
            <a href="index.php?controller=Utilisateur&action=readAll">
                <strong>Liste des utilisateurs</strong>
            </a>
            <a href="index.php?controller=Fournisseur&action=readAll">
                <strong>Liste des Fournisseurs</strong>
            </a>
        </nav>

        <main>
            <?php
                $filepath = File::build_path(array("view", static::$object, "$view.php"));
                require $filepath;
            ?>
        </main>

        <footer>
            <?php
                if($_GET['action']!='afficher'){
                    echo '
                        <a href="./index.php?controller=Utilisateur&action=afficher">
                            <button> <img src="images/panier.png" alt="panier" width="55" height="55"></button>
                        </a>';
                }
            ?>
            <h3>
                Des boules pour tous !
            </h3>
        </footer>
    </body>
</html>


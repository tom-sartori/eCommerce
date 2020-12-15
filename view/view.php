<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/general.css">
        <meta charset="UTF-8">
        <title>
            <?=$pagetitle?>
        </title>
    </head>

    <body>
        <p class="connexion">
            <?php
                if (isset($_SESSION["login"])) {
                    echo 'Bienvenue ' . $_SESSION["login"] . ' !  
                    <a href="index.php?action=deconnect&controller=utilisateur"> 
                        Déconnexion 
                    </a>';
                }
                else {
                    echo '<a href="./index.php?controller=Utilisateur&action=create">
                        S\'inscrire | 
                        </a>
                        <a href="index.php?action=connect&controller=utilisateur"> 
                            Connexion 
                        </a>';
                }
            ?>
        </p>
        <nav>
                <a href="index.php?controller=BouleDeNoel&action=readAll" >
                    <strong>Liste des boules de noel</strong></a>
                <a id="navMid" href="index.php?controller=Utilisateur&action=readAll">
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
            <div>
                <?php
                    if($_GET['action']!='afficherPanier'){
                        echo '
                            <a href="./index.php?controller=Utilisateur&action=afficherPanier">
                                <button> <img src="images/panier.png" alt="panier" width="82" height="54"></button>
                            </a>';
                    }
                ?>
            </div>
            <h3>
                Des boules pour tous !
            </h3>
        </footer>
    </body>
</html>


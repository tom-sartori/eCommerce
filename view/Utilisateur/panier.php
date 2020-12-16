<?php
    if(isset($_SESSION['panier'])) {
        $somme = 0;
        $panier=array_count_values($_SESSION['panier']);
        foreach ($panier as $key => $value) {
            $b = ModelBouleDeNoel::select($key);
            $somme = $somme + ($value * htmlspecialchars($b->get('prix')));
            echo <<< EOT
        Vous avez {$value} boules de noël d'identifiant <a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel={$key}">
                {$key}
            </a> à votre panier. Cliquer dessus pour avoir plus de détails. <br>
EOT;
        }
        echo 'le prix total du panier est ' . $somme;
        echo '<br> <a href="./index.php?controller=Utilisateur&action=viderPanier"><button>Vider le panier</button></a>';
        echo '<br> <a href="./index.php?controller=Commande&action=passerCommande"><button>Acheter les articles</button></a>';
    } else
        echo 'Votre panier est vide veuillez faire des achats';
echo '<br> <a href="./index.php?controller=Commande&action=historiqueCommande"><button>Historique de commande</button></a>';
?>
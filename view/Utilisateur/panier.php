<?php
    if(isset($_SESSION['panier'])) {
        $somme = 0;
        foreach ($_SESSION['panier'] as $key => $value) {
            $b = ModelBouleDeNoel::select($value);
            $somme = $somme + htmlspecialchars($b->get('prix'));
            echo <<< EOT
        <p>
            Vous avez rajouté la boule de noël d'identifiant <a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel={$value}">{$value}</a> à votre panier. Cliquer dessus pour avoir plus de détails. </p>
EOT;
        }
        echo ' <p> Le prix total du panier est de' . $somme . '€ </p>';
        echo '<p> <a href="./index.php?controller=Utilisateur&action=viderPanier"><button>Vider le panier</button></a> </p>';
        echo '<p> <a href="./index.php?controller=Utilisateur&action=acheterPanier"><button>Acheter les articles</button></a> </p>';
    } else
        echo '<p> Votre panier est vide veuillez faire des achats </p>';
echo '<p> <a href="./index.php?controller=Utilisateur&action=afficherHistorique"><button>Historique de commande</button> </p>';
?>
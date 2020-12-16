<?php
    echo '<h1> Votre panier : </h1>';
    if(isset($message))
        echo $message;
    if(isset($_SESSION['panier'])) {
        $somme = 0;
        $panier=array_count_values($_SESSION['panier']);
        foreach ($panier as $key => $value) {
            $b = ModelBouleDeNoel::select($key);
            $somme = $somme + ($value * htmlspecialchars($b->get('prix')));
            echo <<< EOT
                <p>
                    Vous avez {$value} boules de noël d'identifiant 
                    <a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel={$key}">
                        {$key}
                    </a> 
                    dans votre panier. 
                </p>        
EOT;
        }
        echo <<< EOT
            <p>
                Le prix total du panier est de {$somme} €. 
            </p>
            <p>
                <a href="./index.php?controller=Utilisateur&action=viderPanier">
                    <button>Vider le panier</button>
                </a> 
                <a href="./index.php?controller=Commande&action=passerCommande">
                    <button>Acheter les articles</button>
                </a>
            </p>
EOT;
    } else
        echo '
            <p> 
                Votre panier est vide. Veuillez acheter un maximum de boules pour passer un joyeux Noël ! 
            </p>';

    if (isset($_SESSION['login']))
        echo '
            <p> 
                <a href="./index.php?controller=Commande&action=historiqueCommande">
                    <button>Historique de commande</button>
                </a>
            </p>';
?>
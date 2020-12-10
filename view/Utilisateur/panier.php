<?php
    if(!is_null($tab_panier)) {
        $somme = 0;
        foreach ($tab_panier as $key => $value) {
            $b = ModelBouleDeNoel::select($value);
            $somme = $somme + htmlspecialchars($b->get('prix'));
            echo <<< EOT
        Vous avez achétée la boule de noël d'identifiant <a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel={$value}">
                {$value}
            </a>  Cliquer dessus pour avoir plus de détails. <br>
EOT;
        }
        echo 'le prix total du panier est ' . $somme;
    } else
        echo 'Votre panier est vide veuillez faire des achats';
?>
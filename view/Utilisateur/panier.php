<?php

    foreach ($tab_panier as  $key=>$value){
        foreach ($value as $key1=>$value1) {
            $b=ModelBouleDeNoel::select($value1);

            $somme=$somme+htmlspecialchars($b->get('prix'));
            echo <<< EOT
        Vous avez achété la boile de noël d'identifiant <a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel={$value1}">
                {$value1}
            </a>  Cliquer dessus pour avoir plus de détails. {$prix} le prix <br>
EOT;
        }
    }
    echo 'prix total du panier est '. $somme;
?>
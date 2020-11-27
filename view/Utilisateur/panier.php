<?php

    foreach ($tab_panier as  $key=>$value){
        foreach ($value as $key1=>$value1) {
            echo <<< EOT
        Vous avez achété la boile de noël didentifiant <a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel={$value1}">
                {$value1}
            </a>  Cliquer dessus pour avoir plus de détails. <br>
EOT;
        }
    }
    /*echo 'prix total du panier est '. $somme;*/
?>
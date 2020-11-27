<?php

    foreach ($tab_panier as  $key=>$value){
        foreach ($value as $key1=>$value1) {
            $b=ModelBouleDeNoel::select($value1);
            $controller='BouleDeNoel';
            $view = 'detail';
            $pagetitle = 'Details boule de noel';
            require(File::build_path(array("view", "view.php")));
        }
            /*
            echo <<< EOT
        Vous avez achété la boile de noël didentifiant <a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel={$value1}">
                {$value1}
            </a>  Cliquer dessus pour avoir plus de détails. <br>
EOT;
        }
    }*/
    /*echo 'prix total du panier est '. $somme;*/
?>
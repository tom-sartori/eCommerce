<?php
    echo'<h1>Voici vos commandes : </h1>';
    $memoire=0;

    foreach ($tab_c as $c){
        $c_htmllogin = htmlspecialchars($c->get('login'));
        $c_htmlIdBouleDeNoel = htmlspecialchars($c->get('idBouleDeNoel'));
        $c_htmlidCommande = htmlspecialchars($c->get('idCommande'));
        $c_htmldateAchat = htmlspecialchars($c->get('dateAchat'));
        $c_htmlquantite = htmlspecialchars($c->get('quantite'));

        if($memoire == $c_htmlidCommande)
            echo <<< EOT
                    <li>
                        <p>
                            {$c_htmlquantite} boules de noel d'identifiant {$c_htmlIdBouleDeNoel} 
                        </p>
                    </li>
EOT;
        else {
            if ($memoire != 0)
                echo '</ul>';

            $memoire = $c->get('idCommande');
            echo <<< EOT
                    <br> 
                    <h4> 
                        La Commande N° {$c_htmlidCommande} faite le {$c_htmldateAchat}, contient les articles suivants : 
                    </h4>
                    <ul>
                        <li>
                            <p>
                                {$c_htmlquantite} boules de noel d'identifiant {$c_htmlIdBouleDeNoel}
                            </p>
                        </li>
EOT;
        }
    }
    echo '</ul>';
?>
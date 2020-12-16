<?php
echo'Voici vos commandes : <br> ';
$memoire=0;
foreach ($tab_c as $c){
    $c_htmllogin = htmlspecialchars($c->get('login'));
    $c_htmlIdBouleDeNoel = htmlspecialchars($c->get('idBouleDeNoel'));
    $c_htmlidCommande = htmlspecialchars($c->get('idCommande'));
    $c_htmldateAchat = htmlspecialchars($c->get('dateAchat'));
    $c_htmlquantite = htmlspecialchars($c->get('quantite'));
    if($memoire==$c_htmlidCommande){
        echo $c_htmlquantite .' boules de noel d\'identifiant ' . $c_htmlIdBouleDeNoel . '<br>';
    } else {
        $memoire = $c->get('idCommande');
        echo '<br>La Commande N° ' . $c_htmlidCommande . ' faite le ' . $c_htmldateAchat . ', contient les articles suivant :
        <br>'
            . $c_htmlquantite . ' boules de noel d\'identifiant ' . $c_htmlIdBouleDeNoel . '<br>';
    }
}
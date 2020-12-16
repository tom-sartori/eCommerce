<?php
    echo '
        <h1> 
            Liste des boules de Noël de la base de données : 
        </h1> ';
    if(isset($message)){
        echo $message;
    }
    echo '<ul>';

    foreach ($tab_b as $b) {
        $b_raw = rawurlencode($b->get('idBouleDeNoel'));
        $b_htmlNom = htmlspecialchars($b->get('nom'));

        echo <<< EOT
            <li>
                <p>
                    La boule de noël : 
                    <a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel={$b_raw}">
                        {$b_htmlNom}
                    </a> 
                    <a href="./index.php?controller=Utilisateur&action=addPanier&idBouleDeNoel={$b_raw}">
                        <button>Ajouter au panier</button>
                    </a>
EOT;

        if (Session::is_admin())
            echo <<< EOT
                <a href="./index.php?controller=BouleDeNoel&action=delete&idBouleDeNoel={$b_raw}">
                    <button>Supprimer cette boule de noël</button>
                </a> 
EOT;
        echo '</p>
            </li>';
    }

    if (Session::is_admin())
        echo '</ul>
            <a class="bAjout" href="./index.php?controller=BouleDeNoel&action=create">
                <button>Ajouter une boule de noël</button>
            </a>';
?>

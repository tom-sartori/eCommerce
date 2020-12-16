<?php

    echo '<h1> Liste des fournisseurs de la base de données : </h1> <br> <ul>';
    foreach ($tab_f as $f) {
        $f_raw = rawurlencode($f->get('idFournisseur'));
        $f_html = htmlspecialchars($f->get('idFournisseur'));
        $f_htmlNom = htmlspecialchars($f->get('nom'));

        echo <<< EOT
            <li>
                <p>
                    {$f_htmlNom}, d'identifiant : 
                    <a href="./index.php?controller=Fournisseur&action=read&idFournisseur={$f_raw}">
                    {$f_html}
                    </a> 
                    <a href="./index.php?controller=Fournisseur&action=delete&idFournisseur={$f_raw}">
                    <button>Supprimer ce fournisseur</button>
                    </a>
                </p>
            </li>
EOT;
    }

    echo <<< EOT
        </ul> 
        <a href="./index.php?controller=Fournisseur&action=create">
            <button>Ajouter un fournisseur</button>
        </a>
EOT;

?>
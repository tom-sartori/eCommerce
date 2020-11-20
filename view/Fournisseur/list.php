<?php

    foreach ($tab_f as $f) {
        $f_raw = rawurlencode($f->get('idFournisseur'));
        $f_html = htmlspecialchars($f->get('idFournisseur'));
        echo <<< EOT
            <p>
                Fournisseur d'identifiant : 
                <a href="./index.php?controller=Fournisseur&action=read&idFournisseur={$f_raw}">
                    {$f_html}
                </a> . 
                <br>
                <a href="./index.php?controller=Fournisseur&action=delete&idFournisseur={$f_raw}">
                    <button>Supprimer ce fournisseur</button>
                </a>
            </p>
EOT;
    }

    echo <<< EOT
        <a href="./index.php?controller=Fournisseur&action=create">
            <button>Ajouter un fournisseur</button>
        </a>
EOT;

?>
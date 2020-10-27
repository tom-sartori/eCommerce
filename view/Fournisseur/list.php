<?php

foreach ($tab_f as $f) {
    $f_raw = rawurlencode($f->getIdBouleDeNoel());
    $f_spe = htmlspecialchars($f->getIdBouleDeNoel());
    echo '<p> ' . 'Fournisseur d\'identifiant : ' .
        '<a href="./index.php?controller=Fournisseur&action=read&id_Fournisseur=' . $f_raw . '">' . $f_spe . '</a>' . " " .
        '<a href="./index.php?controller=Fournisseur&action=delete&id_Fournisseur=' . $f_raw . '">' . '<button>' . 'Supprimer ce fournisseur' . '</button>' .
        '</a>' . '</p>';
}
echo '<a href="./index.php?controller=Fournisseur&action=create">' . '<button>' . 'Ajouter un fournisseur' . '</button>' . '</a>';

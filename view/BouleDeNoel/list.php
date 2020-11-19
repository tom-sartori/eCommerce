<?php

foreach ($tab_b as $b) {
    $b_raw = rawurlencode($b.get('idBouleDeNoel'));
    $b_spe = htmlspecialchars($b->getIdBouleDeNoel());
    echo '<p> ' . 'Boule de noel de numero de série : ' .
        '<a href="./index.php?controller=BouleDeNoel&action=read&idBouleDeNoel=' . $b_raw . '">' . $b_spe . '</a>' . " " .
        '<a href="./index.php?controller=BouleDeNoel&action=delete&idBouleDeNoel=' . $b_raw . '">' . '<button>' . 'Supprimer cette boule de noel' . '</button>' .
        '</a>' . '</p>';
}
echo '<a href="./index.php?controller=BouleDeNoel&action=create">' . '<button>' . 'Ajouter une boule de noel' . '</button>' . '</a>';

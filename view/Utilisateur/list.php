<?php

foreach ($tab_u as $u) {
    $u_raw = rawurlencode($u->getLogin());
    $u_spe = htmlspecialchars($u->getLogin());
    echo '<p> ' . 'Utilisateur de login : ' .
        '<a href="./index.php?controller=Utilisateur&action=read&login=' . $u_raw . '">' . $u_spe . '</a>' . " " .
        '<a href="./index.php?controller=Utilisateur&action=delete&login=' . $u_raw . '">' . '<button>' . ' Supprimer cet Utilisateur' . '</button>' .
        '</a>' . '</p>';
}
echo '<a href="./index.php?controller=Utilisateur&action=create">' . '<button>' . 'Ajouter un utilisateur' . '</button>' . '</a>';

<?php

foreach ($tab_u as $u) {
    $u_raw = rawurlencode($u->get('login'));
    $u_spe = htmlspecialchars($u->get('login'));
    echo <<< EOT
        <p>
            Utilisateur de login : 
            <a href="./index.php?controller=Utilisateur&action=read&login={$u_raw}">
                {$u_spe}
            </a>
            <br>
            <a href="./index.php?controller=Utilisateur&action=delete&login={$u_raw}">
                <button>Supprimer cet Utilisateur</button>
            </a>
        </p>
EOT;
}

echo '<a href="./index.php?controller=Utilisateur&action=create"><button>Ajouter un utilisateur</button></a>';

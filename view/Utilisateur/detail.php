<?php
    $u_raw = rawurlencode($u->get('login'));
    $u_htmlNom = htmlspecialchars($u->get('nom'));
    $u_htmlPrenom = htmlspecialchars($u->get('prenom'));
    $u_htmlLogin = htmlspecialchars($u->get('login'));
    $u_htmlAdresse = htmlspecialchars($u->get('adresse'));
    $u_htmlAdresseMail = htmlspecialchars($u->get('adresseMail'));
    $u_htmlPays = htmlspecialchars($u->get('pays'));
    $is_user = Session::is_user($u->get('login'));
    $is_admin = Session::is_admin();

    echo <<< EOT
        <p>
            <p>
                Utilisateur : {$u_htmlLogin}
            </p>
            <p>
                L'utilisateur s'appelle : {$u_htmlNom} {$u_htmlPrenom}
            </p>
            <p>
                Adresse mail : {$u_htmlAdresseMail}
            </p>
            <p>
                Adresse : {$u_htmlAdresse}, {$u_htmlPays}
            </p>
EOT;

    if ($is_user || $is_admin) {
        echo <<< EOT
        <p>
            <a href="./index.php?controller=Utilisateur&action=delete&login={$u_raw}">
                <button>Supprimer cet Utilisateur</button>
            </a>
        </p>
        <p>
            <a href="./index.php?controller=Utilisateur&action=update&login={$u_raw}">
                <button>Mettre à jour l\'utilisateur</button>
            </a>
        </p>
EOT;
    }

    echo'</p>';
?>

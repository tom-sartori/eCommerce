<?php
$u_raw = rawurlencode($u->get('login'));
$u_htmlNom = htmlspecialchars($u->get('nom'));
$u_htmlPrenom = htmlspecialchars($u->get('prenom'));
$u_htmlLogin = htmlspecialchars($u->get('login'));
$u_htmlAdresse = htmlspecialchars($u->get('adresse'));
$u_htmlAdresseMail = htmlspecialchars($u->get('adresseMail'));
$u_htmlPays = htmlspecialchars($u->get('pays'));
$is_user=Session::is_user($u->get('login'));

echo <<< EOT
    <p>
        Utilisateur : {$u_htmlLogin}
        <br>
        L'utilisateur s'appelle : {$u_htmlNom} {$u_htmlPrenom}
        <br>
        Adresse mail : {$u_htmlAdresseMail}
        <br>
        Adresse : {$u_htmlAdresse}, {$u_htmlPays}
        <br>
EOT;
        if ($is_user) {'
            <a href="./index.php?controller=Utilisateur&action=delete&login={$u_raw}">
                <button>Supprimer cet Utilisateur</button>
            </a>
            <br>
            <a href="./index.php?controller=Utilisateur&action=update&login={$u_raw}">
                <button>Mettre à jour l\'utilisateur</button>
            </a>';
        }
    echo'</p>';
?>

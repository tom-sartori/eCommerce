<?php
    echo '<h1> Liste des utilisateurs de la base de données : </h1>';
    if(isset($message))
        echo $message;
    echo'<ul>';
    foreach ($tab_u as $u) {
        $u_raw = rawurlencode($u->get('login'));
        $is_user=Session::is_user($u->get('login'));
        $is_admin=Session::is_admin();
        $u_html = htmlspecialchars($u->get('login'));

        echo <<< EOT
            <li>
                <p>
                    Utilisateur de login : 
                    <a href="./index.php?controller=Utilisateur&action=read&login={$u_raw}">
                        {$u_html}
                    </a>
                
        EOT;
                if ($is_user || $is_admin) {
                    echo '
                        <a href="./index.php?controller=Utilisateur&action=delete&login=' . $u_raw . '">
                            <button>Supprimer cet Utilisateur</button>
                        </a>';
                }
            echo '</p></li>';
    }

    echo '</ul>
        <a class="bAjout" href="./index.php?controller=Utilisateur&action=create">
            <button>Ajouter un utilisateur</button>
        </a>';
?>

<?php
$u_raw = rawurlencode($u->getLogin());
$u_htmlNom=htmlspecialchars($u->getNom());
$u_htmlPrenom=htmlspecialchars($u->getPrenom());
$u_htmlLogin=htmlspecialchars($u->getLogin());
$u_htmlAdresse=htmlspecialchars($u->getAdresse());
$u_htmlAdresseMail=htmlspecialchars($u->getAdresseMail());
$u_htmlPays=htmlspecialchars($u->getPays());
echo '<p> '.'L\'utilisateur s\'appelle :' . $u_htmlNom . ' ' . $u_htmlPrenom . ', son adresse mail est : '. $u_htmlAdresseMail .' qui habite au ' . $u_htmlAdresse .  ' qui se trouve en ' . $u_htmlPays
    .' de Login '. $u_htmlLogin.' '.
    '<a href="./index.php?controller=Utilisateur&action=delete&login=' . $u_raw  . '">'. '<button>' .'Supprimer cet Utilisateur'.'</button>' .'</a>'. ' '
    .'<a href="./index.php?controller=Utilisateur&action=update&login=' . $u_raw  . '">'. '<button>'.'Mettre à jour l\'utilisateur'.'</button>' .'</a>'.'</p>'

?>

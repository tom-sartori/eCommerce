<?php
$f_raw = rawurlencode($f->getIdFournisseur());
$f_htmlNom=htmlspecialchars($f->getNom());
$f_htmlIdFournisseur=htmlspecialchars($f->getIdFournisseur());
$f_htmlAdresse=htmlspecialchars($f->getAdresse());
$f_htmlAdresseMail=htmlspecialchars($f->getAdresseMail());
$f_htmlPays=htmlspecialchars($f->getPays());
echo '<p> '.'Le fournisseur du nom de : ' . $f_htmlNom . ', son adresse mail est : '. $f_htmlAdresseMail . ' qui se situe au ' . $f_htmlAdresse  . 'qui se trouve en ' . $f_htmlPays
    .' d\'identifiant '. $f_htmlIdFournisseur.' '.
    '<a href="./index.php?controller=Fournisseur&action=delete&idFournisseur=' . $f_raw  . '">'. '<button>' .'Supprimer ce fournisseur'.'</button>' .'</a>'. ' '
    .'<a href="./index.php?controller=Fournisseur&action=update&idFournisseur=' . $f_raw  . '">'. '<button>'.'Mettre à jour le fournisseur'.'</button>' .'</a>'.'</p>'

?>

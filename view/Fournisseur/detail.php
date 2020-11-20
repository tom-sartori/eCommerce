<?php
$f_raw = rawurlencode($f->get('idFournisseur'));
$f_htmlNom = htmlspecialchars($f->get('nom'));
$f_htmlIdFournisseur = htmlspecialchars($f->get('idFournisseur'));
$f_htmlAdresse = htmlspecialchars($f->get('adresse'));
$f_htmlAdresseMail = htmlspecialchars($f->get('adresseMail'));
$f_htmlPays = htmlspecialchars($f->get('pays'));

echo <<< EOT
    <p>
        Fournisseur {$f_htmlIdFournisseur}. Son nom est {$f_htmlNom}, il a pour adresse mail : {$f_htmlAdresseMail}. Il se situe au {$f_htmlAdresse}, {$f_htmlPays}. 
        <a href="./index.php?controller=Fournisseur&action=delete&idFournisseur={$f_raw}">
            <button>Supprimer ce fournisseur</button>
        </a>
        <br>
        <a href="./index.php?controller=Fournisseur&action=update&idFournisseur={$f_raw}">
            <button>Mettre à jour le fournisseur</button>
        </a>
    </p>
EOT;

?>

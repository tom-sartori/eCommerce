<?php
$b_raw = rawurlencode($b->getIdBouleDeNoel());
$b_rawFournisseur=($b->getIdFournisseur());
$b_htmlNom=htmlspecialchars($b->getNom());
$b_htmlIdBouleDeNoel=htmlspecialchars($b->getIdBouleDeNoel());
$b_htmlCouleur=htmlspecialchars($b->getCouleur());
$b_htmlTaille=htmlspecialchars($b->getTaille());
$b_htmlMatiere=htmlspecialchars($b->getMatiere());
$b_htmlStocks=htmlspecialchars($b->getStock());
$b_htmlFournisseur=htmlspecialchars($b->getIdFournisseur());

echo <<< EOT
    <p> 
        Numéro de série : {$b_htmlIdBouleDeNoel} 
        <br>
        Nom : {$b_htmlNom} 
        <br>
        Couleur : {$b_htmlCouleur} 
        <br>
        Taille : {$b_htmlTaille}cm 
        <br>
        Matiere : {$b_htmlMatiere} 
        <br>
        Stocks : {$b_htmlStocks} 
        <br>
        Fournit  par : <a href="./index.php?controller=Fournisseur&action=read&idFournisseur={$b_rawFournisseur}"> 
            {$b_htmlFournisseur} 
        </a>
        <br>
        <a href="./index.php?controller=BouleDeNoel&action=delete&idBouleDeNoel={$b_raw}">
            <button>Supprimer cette boule de noël. </button>
        </a>
        <br>
        <a href="./index.php?controller=BouleDeNoel&action=update&idBouleDeNoel={$b_raw}">
            <button>Mettre à jour la boule de noël. </button>
        </a>
    </p>
EOT;



?>

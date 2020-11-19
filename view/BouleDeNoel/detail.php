<?php
    $b_raw = rawurlencode($b->get('idBouleDeNoel'));
    $b_rawFournisseur=($b->get('idFournisseur'));
    $b_htmlNom=htmlspecialchars($b->get('nom'));
    $b_htmlIdBouleDeNoel=htmlspecialchars($b->get('idBouleDeNoel'));
    $b_htmlCouleur=htmlspecialchars($b->get('couleur'));
    $b_htmlTaille=htmlspecialchars($b->get('taille'));
    $b_htmlMatiere=htmlspecialchars($b->get('matiere'));
    $b_htmlStocks=htmlspecialchars($b->get('stock'));
    $b_htmlFournisseur=htmlspecialchars($b->get('idFournisseur'));

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

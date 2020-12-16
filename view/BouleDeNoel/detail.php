<?php
    $b_raw = rawurlencode($b->get('idBouleDeNoel'));
    $b_rawFournisseur = rawurldecode(($b->get('idFournisseur')));
    $b_htmlNom = htmlspecialchars($b->get('nom'));
    $b_htmlIdBouleDeNoel = htmlspecialchars($b->get('idBouleDeNoel'));
    $b_htmlCouleur = htmlspecialchars($b->get('couleur'));
    $b_htmlTaille = htmlspecialchars($b->get('taille'));
    $b_htmlMatiere = htmlspecialchars($b->get('matiere'));
    $b_htmlStocks = htmlspecialchars($b->get('stock'));
    $b_htmlPrix = htmlspecialchars($b->get('prix'));
    $b_htmlFournisseur = htmlspecialchars($b->get('idFournisseur'));
    $f = ModelFournisseur::select($b->get('idFournisseur'));
    $b_htmlFNom = htmlspecialchars($f->get('nom'));

    echo <<< EOT
        <p> 
        <p>
                Numéro de série : {$b_htmlIdBouleDeNoel} 
            </p>
            <p>
                Nom : {$b_htmlNom} 
            </p>
            <p>
                Couleur : {$b_htmlCouleur} 
            </p>
            <p>
                Taille : {$b_htmlTaille} cm 
            </p>
            <p>
                Matiere : {$b_htmlMatiere} 
            </p>
            <p>
                Stocks : {$b_htmlStocks} 
            </p>
            <p>
                prix : {$b_htmlPrix} €
            </p>
EOT;

    if (Session::is_admin()) {
        echo <<< EOT
            <p>
            Fournit  par : <a href="./index.php?controller=Fournisseur&action=read&idFournisseur={$b_rawFournisseur}"> 
                {$b_htmlFNom} 
            </a>. 
            </p>
            <p>
              <a href="./index.php?controller=BouleDeNoel&action=delete&idBouleDeNoel={$b_raw}">
                  <button>Supprimer cette boule de noël. </button>
              </a>            
              <a href="./index.php?controller=BouleDeNoel&action=update&idBouleDeNoel={$b_raw}">
                  <button>Mettre à jour la boule de noël. </button>
              </a>
            </p>
        </p>
EOT;
    }
    else {
        echo'
            <p>
                Fournit  par ' . $b_htmlFNom . '. 
            </p>';
    }

?>

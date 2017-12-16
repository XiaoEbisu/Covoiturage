<?php
  foreach ($tab_v as $v){

    $vNom = htmlspecialchars($v->get('nom'));
    $vPrenom = htmlspecialchars($v->get('prenom'));

    echo "<h2>".$vNom . $vPrenom. "</h2>";
  }
 ?>

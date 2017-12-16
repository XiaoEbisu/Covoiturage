<?php
  foreach ($tab_v as $v){
    $vType = htmlspecialchars($v->get('type'));
    $vPlace = htmlspecialchars($v->get('place'));
    $vIdV = htmlspecialchars($v->get('IdV'));

    echo "<h2>".$vIdV . ' ' .$vType . ' ' . $vPlace. "</h2>";
  }
 ?>
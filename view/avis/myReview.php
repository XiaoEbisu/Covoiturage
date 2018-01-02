 <table id="myTable" class="table table-striped text-center">
  <thead>
    <tr>
      <th class="text-center"><i class="fa fa-star" aria-hidden="true"></i></th>
      <th class="text-center"> Avis reçus</th>
    </tr>
  </thead>


<?php
  $compteur = 0;
	foreach ($tab_v as $v){	
    $vIdA = htmlspecialchars($v->get('IdA'));
    $vIdU = htmlspecialchars($v->get('IdU'));
    $vEtoile = htmlspecialchars($v->get('etoile'));
    $vDescription = htmlspecialchars($v->get('description'));

    echo "<tr>";
    switch ($vEtoile) {
      case '1':
        echo "<td>À éviter</td>";
        break;
      
      case '2':
        echo "<td>Décevant</td>";
        break;

      case '3':
        echo "<td>Bien</td>";
        break;

      case '4':
        echo "<td>Très bien</td>";
        break;
        
      case '5':
        echo "<td>Parfait</td>";
        break;
            
      default:
        break;
    }
    echo "<td>" . $vDescription . "</td>";
    echo "</tr>";
    $compteur++;
  }
    echo "</table>";
    if($compteur == 0){
    echo '<div class= "alert alert-warning text-center"> ';
    echo 'Il n\' y a pas d\'avis X__X';
    echo '</div>';
  }
  ?>
<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-center">Immatriculation</th>
      <th class="text-center">Marque</th>
      <th class="text-center">Place(s)</th>
    </tr>
  </thead>

  <?php 
  $idU = $_SESSION['IdU'];
  $compteur = 0;
	foreach ($tab_v as $v){	
    	$vIdV = htmlspecialchars($v['IdV']);
  		foreach ($tab_car as $c) {
  			$cIdV = htmlspecialchars($c->get('IdV'));
    		$cType = htmlspecialchars($c->get('type'));
    		$cPlace = htmlspecialchars($c->get('place'));
  			if ($vIdV == $cIdV){
  				$compteur = $compteur + 1;
  				echo "<tr class='text-center'>";
          echo "<td>" . $cIdV . "</td>";
          echo "<td>" . $cType . "</td>";
          echo "<td>" . $cPlace . "</td>";
          echo "<td><input type='button' class='btn btn-basic btn-sm' value='Supprimer' onclick=window.location.href='index.php?action=supprimerVoiture&controller=voiture&IdV=" .$cIdV. "'>
          <input type='button' class='btn btn-basic btn-sm' value='Modifier' onclick=window.location.href='index.php?action=update&controller=voiture&IdV=" .$cIdV."'></td>";
  				echo "</tr>";
  			}
  		}
  	}
  	echo "</table>";
    if($compteur == 0){
    echo '<div class= "alert alert-warning text-center"> ';
    echo 'Vous n\'avez pas de véhicule X__X';
    echo '</div>';
}
?>
</table>
</div>

<p class="text-center">
	<input type="button" class="btn btn-basic" value="Ajouter un véhicule" onclick="window.location.href='index.php?action=create&controller=voiture'" />
</p>
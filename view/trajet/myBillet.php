<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-center"><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
      <th class="text-center"><i class="fa fa-circle-o" aria-hidden="true"></i> Ville Départ</th>
      <th class="text-center"><i class="fa fa-map-marker" aria-hidden="true"></i> Ville Arrivée</th>
      <th class="text-center"><i class="fa fa-clock-o" aria-hidden="true"></i> Heure</th>
      <th class="text-center"><i class="fa fa-money" aria-hidden="true"></i> Prix</th> 
      <th class="text-center"><i class="fa fa-info" aria-hidden="true"></i></th>
    </tr>
  </thead>


  <?php 
  $idUtilisateur = $_SESSION['IdU'];
  $compteur = 0;
	foreach ($tab_v as $v){	
    	$vId = htmlspecialchars($v['Id_Trajet']);
  		foreach ($tab_billet as $b) {
  			$bId = htmlspecialchars($b->get('Id_Trajet'));
    		$bVd = htmlspecialchars($b->get('vd'));
    		$bVa = htmlspecialchars($b->get('va'));
    		$bDate = htmlspecialchars($b->get('date'));
    		// date_format($bDate, 'm/d/Y');
  			$bHeure = htmlspecialchars($b->get('heure'));
  			$bPrix = htmlspecialchars($b->get('prix'));

			$date = date('m/d/Y');
  			if (($vId == $bId) && ($bDate >= $date)){
  				$compteur = $compteur + 1;
  				echo "<tr class='text-center'>";
          echo "<td>" . $bDate . "</td>";
          echo "<td>" . $bVd . "</td>";
          echo "<td>" . $bVa . "</td>";
  				echo "<td>" . $bHeure . "</td>";
  				echo "<td>" . $bPrix . " € </td>";
          echo "<td><input type='button' class='btn btn-basic btn-sm' value='Détail' onclick=window.location.href='index.php?action=read&controller=trajet&Id_Trajet=" . $bId ."' > ". " " . "<input type='button' class='btn btn-basic btn-sm' value='Supprimer' onclick=window.location.href='index.php?action=supprimerReservation&controller=trajet&IdU=" . $idUtilisateur . "&Id_Trajet=" . $bId ."'></td>";

  				echo "</tr>";
  			}
  		}
  	}
  	echo "</table>";
    if($compteur == 0){
    echo '<div class= "alert alert-warning text-center"> ';
    echo 'Vous n\' avez pas de réservations X__X';
    echo '</div>';
}

?>
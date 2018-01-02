<div class="box_profile">
<?php
	$IdU = $v->get('IdU');
	$nom = $v->get('nom');
	$prenom = $v->get('prenom');
	$age = $v->get('age');
	$adresse = $v->get('adresse');
	$mail = $v->get('mail');
	$image = $v->get('image');

	
	if ($_SESSION['mail'] == $mail){
		echo '<a href="index.php?action=update&controller=utilisateur"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><b> ' . $nom . ' '. $prenom . '</a></b><br>';
		echo $age .' ans <br>';
		echo $adresse .'<br>';
		echo '<i class="fa fa-envelope-o" aria-hidden="true"></i> ' . $mail ;
	}
	else {
		echo '<b>' . $nom . ' '. $prenom . '</b><br>';
		echo $age .' ans <br>';
	}

	echo '<hr>';
	echo '<b>Activités</b><br>';
	echo 'Anonces publiées : '. $trajet;
	echo '<br>';
	echo 'Dernière connexion : #';
	echo '<br>';
	echo 'Membre depuis : #';
	echo '<br>';
	echo '<hr>';
	if ($_SESSION['mail'] == $mail){	
		echo '<a href="index.php?action=mes_vehicules&controller=voiture"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <b>Véhicules</b></a><br>';
	}
	else {
		echo '<b> Véhicules</b><br>';
	}

	foreach ($voiture as $car) {
		$nomVoiture = $car['type'];
		$place = $car['place'];
		echo $nomVoiture . ' (' . $place .' places)<br>';
	}

	if ($_SESSION['mail'] != $mail){
		echo '<hr>';
		echo '<a href="index.php?action=create&controller=avis&IdU='.$IdU.'"><b>Avis</b></a><br>';
		echo 'Avis moyen : ' . $totalStar .'/5 - ' .$totalAvis. ' avis <br>';

		echo '<hr>';
		echo '<a href="#myPopup" data-rel="popup" ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Signaler ce membre</a>';
	}
	else{
		echo '<hr>';
		echo '<b>Avis</b><br>';
		echo 'Avis moyen : ' . $totalStar .'/5 - ' .$totalAvis. ' avis <br>';
	}	
	
?>
</div>


<div class="profile">
<hr>
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

</div>
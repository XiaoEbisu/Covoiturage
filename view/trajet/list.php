<?php  
    echo "<div class='row'>";
    echo "<p class='col-lg-3 col-lg-push-2'><i class='fa fa-circle-o' aria-hidden='true'></i> Départ : " . ucfirst($vd1) . "<br></p>";
    echo "<p class='col-lg-3 col-lg-push-3'><i class='fa fa-map-marker' aria-hidden='true'></i> Arrivé : " . ucfirst($va1) . "<br></p>";
    echo "<p class='col-lg-3 col-lg-push-4'><i class='fa fa-calendar' aria-hidden='true'></i> Date : " . $date1 . "<br></p>";
    echo "</div>";

    if (!isset($_SESSION['mail'])){
      echo "<div class= 'alert alert-warning text-center'>";
      echo "<p> Vous devez connecter pour réserver une trajet ou bien voir les informations qui concernent ces conducteurs</p>";
      echo "</div>";
    }
?>


<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-center"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Conducteur</th>
      <th class="text-center" ><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
      <th class="text-center"><i class="fa fa-clock-o" aria-hidden="true"></i> Heure</th>
      <th class="text-center"><i class="fa fa-money" aria-hidden="true"></i> Prix</th> 
    </tr>
  </thead>

  <?php 
  $compteur = 0;
	foreach ($tab_v as $v){	
    	$vId = htmlspecialchars($v->get('Id_Trajet'));
      $vIdU = htmlspecialchars($v->get('IdU'));
    	$vVd = htmlspecialchars($v->get('vd'));
    	$vVa = htmlspecialchars($v->get('va'));
    	$vDate = htmlspecialchars($v->get('date'));
  		$vHeure = htmlspecialchars($v->get('heure'));
  		$vPrix = htmlspecialchars($v->get('prix'));
  		if($vVd==$vd1 && $vVa == $va1 && $vDate >= $date1){


          $compteur = $compteur + 1;
  				echo "<tr class='text-center'>";

        foreach ($tab_c as $c){
          $cIdU = htmlspecialchars($c->get('IdU'));
          $cNom = htmlspecialchars($c->get('nom'));
          $cPrenom = htmlspecialchars($c->get('prenom'));

          if ($vIdU == $cIdU){
            if (!isset($_SESSION['mail'])){
              echo "<td>" . $cNom . " " . $cPrenom . "</td>";
            }
            else{
              echo "<td><a href='index.php?action=read&controller=utilisateur&IdU=" . $vIdU ."'>" . $cNom . " " . $cPrenom . "</td>";
            }
          }
        }
          
          echo "<td>" . $vDate ."</td>";
  				echo "<td>" . $vHeure . "</td>";
  				echo "<td><a href='index.php?action=read&controller=trajet&Id_Trajet=". $vId . "'>" . $vPrix . " €</td>";
  				echo "</tr>";
  		}
  	}
    echo "</table>";
    if($compteur == 0){
    echo '<div class= "alert alert-warning text-center"> ';
    echo 'Il n\' y a pas de trajet selon votre critère X__X';
    echo '</div>';
  }
  ?>






   
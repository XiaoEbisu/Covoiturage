<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-center" ><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
      <th class="text-center"><i class="fa fa-circle-o" aria-hidden="true"></i> Ville Départ</th>
      <th class="text-center"><i class="fa fa-map-marker" aria-hidden="true"></i> Ville Arrivée</th>
      <th class="text-center"><i class="fa fa-clock-o" aria-hidden="true"></i> Heure</th>
      <th class="text-center"><i class="fa fa-money" aria-hidden="true"></i> Prix</th> 
      <th class="text-center"><i class="fa fa-info" aria-hidden="true"></i></th>
    </tr>
  </thead>

  <?php 
  $compteur = 0;
  foreach ($tab_offer as $o) {
    if ($my_idu == $o->get('IdU')){
      $oIdU = htmlspecialchars($o->get('IdU'));
      $oId = htmlspecialchars($o->get('Id_Trajet'));
      $oVd = htmlspecialchars($o->get('vd'));
      $oVa = htmlspecialchars($o->get('va'));
      $oDate = htmlspecialchars($o->get('date'));
      // date_format($bDate, 'm/d/Y');
      $oHeure = htmlspecialchars($o->get('heure'));
      $oPrix = htmlspecialchars($o->get('prix'));

      $date = date('m/d/Y');
      if ($oDate >= $date){
        $compteur = $compteur + 1;
          echo "<tr class='text-center'>";
          echo "<td>" . $oDate . "</td>";
          echo "<td>" . $oVd . "</td>";
          echo "<td>" . $oVa . "</td>";
          echo "<td>" . $oHeure . "</td>";
          echo "<td>" . $oPrix . " € </td>";
          echo "<td><input type='button' class='btn btn-basic btn-sm' value='Détail' onclick=window.location.href='index.php?action=read&controller=trajet&Id_Trajet=" . $oId ."' > ". " " . "<input type='button' class='btn btn-basic btn-sm' value='Supprimer' onclick=window.location.href='index.php?action=supprimerProposition&controller=trajet&Id_Trajet=" . $oId ."'></p></td>";
          echo "</tr>";
        }
      }
    }
  echo "</table>";
  if($compteur == 0){
  echo '<div class= "alert alert-warning text-center"> ';
  echo 'Vous n\' avez pas de propositionss X__X';
  echo '</div>';
}

?>
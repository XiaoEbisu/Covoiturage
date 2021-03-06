<?php


    $conducteur = $v->get('IdU');
    $IdT = $v->get('Id_Trajet');
    $Vd = $v->get('vd');
    $Va = $v->get('va');
    $Type = $v->get('type_voiture');
    $Place = $v->get('place');
    $Adr_RV = $v->get('adr_RV');
    $Adr_DP = $v->get('adr_DP');
    $Date = $v->get('date');
  	$Heure = $v->get('heure');
  	$Prix = $v->get('prix');


if (isset($_SESSION['mail'])){
    $idUtilisateur = $_SESSION['IdU'];
    
    //verif si utilisateur a déjà réservé ce trajet
    $bool = 0;
    $myPlace = 0;
    foreach ($tab_guest as $guest){
      if ($guest['IdU'] == $idUtilisateur){
        $bool = 1;
        $myPlace = $guest['placeReserve'];
      }
    }
    foreach ($driver as $d) {
      if ($conducteur == $d->get('IdU')){
        $NomDriver = $d->get('nom');
        $prenomDriver = $d->get('prenom');
      }
    }
    echo '<legend class="text-center">Détail de votre trajet</legend>';
    echo '<div class="row">';
    echo '<p class="col-lg-7 col-lg-push-5"><a href="index.php?action=read&controller=utilisateur&IdU=' . $conducteur .'"><b> ' .$NomDriver. " ". $prenomDriver .'</b></a></p>';
  	echo '<p  class="col-lg-7 col-lg-push-5"><i class="fa fa-circle-o" aria-hidden="true"></i> Ville départ : ' . $Vd . '</p>';
  	echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-map-marker" aria-hidden="true"></i> Ville arrivé : ' . $Va . '</p>';
  	echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-car" aria-hidden="true"></i> Type de voiture : ' . $Type . '</p>';

    if ($bool == 1){
      echo '<p class="col-lg-7 col-lg-push-5">Place réservé : ' . $myPlace . '</p>';
    }
    
  	echo '<p class="col-lg-7 col-lg-push-5">Place(s) restante(s) : ' . $places_Restant . '</p>';
  	echo '<p class="col-lg-7 col-lg-push-5">Adresse rendez-vous : ' . $Adr_RV . '</p>';
  	echo '<p class="col-lg-7 col-lg-push-5">Adresse déposé : ' . $Adr_DP . '</p>';
  	echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-calendar" aria-hidden="true"></i> Date : ' . $Date . '</p>';
  	echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-clock-o" aria-hidden="true"></i> Heure : ' . $Heure . '</p>';

    if ( $bool == 1){
      echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-money" aria-hidden="true"></i> Prix : ' . $Prix*$myPlace .' € </p>';
    }
    else{
  	echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-money" aria-hidden="true"></i> Prix : ' . $Prix . ' € </p>';
    }
    echo '</div>';


    echo '<div class="row text-center">';
    if (($idUtilisateur != $conducteur) && ($bool == 0) ){
      if($places_Restant > 0){

        echo '<form>';
        echo '<input type="hidden" name="action" value="reserver"/>';
        echo '<input type="hidden" name="controller" value="trajet"/>';
        echo '<input type="hidden" name="Id_Trajet" value=" '. $v->get('Id_Trajet') .'"/>';
        echo '<select name="place">'; 
        for($i=1;$i <= $places_Restant; $i++){
          echo '<option value='. $i . '>'. $i . ' places </option>';
        }
        echo '</select>';
        echo '        ';
        echo '<input type="submit" class=" btn btn-basic" value="Reserve">';
        echo  '</form>';
      }
      else{
        echo '<div class="alert alert-warning text-center">';
        echo '<p>';
        echo 'Pas de places disponibles';
        echo '</p>';
        echo '</div>';
      }
    }
    echo "</div>";
    }

    else {

      foreach ($driver as $d) {
      if ($conducteur == $d->get('IdU')){
        $NomDriver = $d->get('nom');
        $prenomDriver = $d->get('prenom');
      }
    }
    echo '<legend class="text-center">Détail de votre trajet</legend>';
    echo '<div class="row">';
    echo '<p class="col-lg-7 col-lg-push-5"><a href="index.php?action=read&controller=utilisateur&IdU=' . $conducteur .'"><b> ' .$NomDriver. " ". $prenomDriver .'</b></a></p>';
    echo '<p  class="col-lg-7 col-lg-push-5"><i class="fa fa-circle-o" aria-hidden="true"></i> Ville départ : ' . $Vd . '</p>';
    echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-map-marker" aria-hidden="true"></i> Ville arrivé : ' . $Va . '</p>';
    echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-car" aria-hidden="true"></i> Type de voiture : ' . $Type . '</p>';
    echo '<p class="col-lg-7 col-lg-push-5">Place(s) restante(s) : ' . $places_Restant . '</p>';
    echo '<p class="col-lg-7 col-lg-push-5">Adresse rendez-vous : ' . $Adr_RV . '</p>';
    echo '<p class="col-lg-7 col-lg-push-5">Adresse déposé : ' . $Adr_DP . '</p>';
    echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-calendar" aria-hidden="true"></i> Date : ' . $Date . '</p>';
    echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-clock-o" aria-hidden="true"></i> Heure : ' . $Heure . '</p>';
    echo '<p class="col-lg-7 col-lg-push-5"><i class="fa fa-money" aria-hidden="true"></i> Prix par place: ' . $Prix . ' € </p>';
    echo '</div>';

    echo '<div class="row text-center">';
    if ($places_Restant == 0){
      echo '<div class="alert alert-warning text-center">';
      echo '<p>';
      echo 'Pas de places disponibles';
      echo '</p>';
      echo '</div>';
    }
    echo "</div>";
    }
    
?>


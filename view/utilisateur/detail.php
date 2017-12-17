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
		echo '<a href="index.php?action=mes_vehicules&controller=voiture"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i> <b>Véhicules</b></a><br>';
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
		echo '<a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Signaler ce membre </a>';
	}





?>
</div>

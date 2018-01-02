<div class="box_profile">
<?php
	$IdU = $v->get('IdU');
	$nom = $v->get('nom');
	$prenom = $v->get('prenom');
	$age = $v->get('age');
	$adresse = $v->get('adresse');
	$mail = $v->get('mail');
	$image = $v->get('image');
	$isAdmin = $v->get('isAdmin');
	
	echo '<b> ' . $nom . ' '. $prenom . '</b><br>';
	if ($isAdmin == 1){
		echo '<b>Admin</b><br>';
	}
	echo $age .' ans <br>';
	echo $adresse .'<br>';
	echo '<i class="fa fa-envelope-o" aria-hidden="true"></i> ' . $mail ;
	echo '<hr>';
	echo '<b>Activités</b><br>';
	echo 'Anonces publiées : '. $trajet;
	echo '<br>';
	echo 'Dernière connexion : #';
	echo '<br>';
	echo 'Membre depuis : #';
	echo '<br>';
	echo '<hr>';
	echo '<b>Véhicules</b><br>';
	foreach ($voiture as $car) {
		$nomVoiture = $car['type'];
		$place = $car['place'];
		echo $nomVoiture . ' (' . $place .' places)<br>';
	}
	echo '<hr>';
	if (isset($_SESSION['mail'])){
		if (($_SESSION['mail']) != $mail){
			echo '<a href="index.php?action=create&controller=avis&IdU='. $IdU .'"><b>Avis</b></a><br>';
			echo 'Avis moyen : ' . $totalStar .'/5 - ' .$totalAvis. ' avis <br>';
		}
		else {
			echo '<b>Avis</b><br>';
			echo 'Avis moyen : ' . $totalStar .'/5 - ' .$totalAvis. ' avis <br>';
		}
	}
?>
</div>
<?php
	$nom = $v->get('nom');
	$prenom = $v->get('prenom');
	$adresse = $v->get('adresse');
	$mail = $v->get('mail');
	$image = $v->get('image');
	echo '<p>' . $nom . ' '. $prenom . '</p>';
	echo '<p>' . $adresse. '</p>';
	echo '<p>' . $mail . '</p>';
?>
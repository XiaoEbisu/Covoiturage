<table class="table table-striped">
  <thead>
    <tr>
    	<th class="text-center"> ID</th>
      	<th class="text-center"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Utilisateur</th>
      	<th class="text-center"><i class="fa fa-info" aria-hidden="true"></i></th>
      	<th class="text-center"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</th>
    </tr>
  </thead>

<?php
	$compteur = 0;
  	foreach ($tab_v as $v){
	    $vNom = htmlspecialchars($v->get('nom'));
	    $vPrenom = htmlspecialchars($v->get('prenom'));
	    $vIdU = htmlspecialchars($v->get('IdU'));
	    $vBan = htmlspecialchars($v->get('isBan'));
	    $vIsAdmin = htmlspecialchars($v->get('isAdmin'));

	   	$compteur = $compteur + 1;
	   	echo "<tr class='text-center'>";
	   	echo "<td>" . $vIdU . "</td>";
	   	echo "<td>" . $vNom . ' ' . $vPrenom ."</td>";
	   	echo "<td><input type='button' class='btn btn-basic btn-sm' value='Détail' onclick=window.location.href='index.php?action=read&controller=Utilisateur&IdU=" . $vIdU . "'>" ;

	   	if ($vIsAdmin != 1){
		   	if ($vBan == 0){
		   		echo "<td><input type='button' class='btn btn-basic btn-sm' value='Bannir' onclick=window.location.href='index.php?action=ban&controller=Utilisateur&IdU=" .$vIdU ."'></td>";
		   	}
		   	else {
				echo "<td><input type='button' class='btn btn-basic btn-sm' value='Re-activer' onclick=window.location.href='index.php?action=unban&controller=Utilisateur&IdU=" .$vIdU ."'></td>";
		   }
		}
		else {
			echo '<td></td>';
		}


	   	echo "</tr>";
  	}
 ?>
</table>
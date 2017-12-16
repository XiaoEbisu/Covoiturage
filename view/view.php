<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pagetitle ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--BOOTSTRAP-->

	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/covoiturage.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
  <script src="assets/bootstrap/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- <script src="asssets/boostrap/js/boostrap.min.js"></script> -->
  <script src="assets/js/covoiturage.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuYpMjrQ_N5Tz77yUzTKc8B-Eybb1N9Nc&libraries=places&region=FR"></script>
  <script type="text/javascript" src="assets/js/covoiturage.js"></script>
  
</head>

<body>
<!-- Navigation -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php?">BossCar</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="index.php?action=create&controller=<?php if(!isset($_SESSION['mail'])) echo "utilisateur"; else { echo "trajet"; } ?>"><i class="fa fa-plus" aria-hidden="true"></i> Proposer un trajet</a></li>
          
          <?php
          //Menu  dropdown connexion
          if(isset($_SESSION['mail'])) {
            echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> '. $_SESSION['prenom'] . '<span class="caret"></span></a>';
            echo '<ul class="dropdown-menu">';
            echo '<li><a href="index.php?action=update&controller=utilisateur"><i class="fa fa-cog" aria-hidden="true"></i> Modifier</a></li>';
            echo '<li><a href="index.php?action=mes_reservations&controller=trajet"><i class="fa fa-ticket" aria-hidden="true"></i> Mes réservations</a></li>';
            echo '<li><a href="index.php?action=mes_propositions&controller=trajet"><i class="fa fa-handshake-o" aria-hidden="true"></i> Mes propositions</a></li>';
            echo '<li><a href="index.php?action=mes_vehicules&controller=voiture"><i class="fa fa-car" aria-hidden="true"></i> Véhicule </a></li>';
            echo '<li><a href ="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Message</a></li>';
            echo '<li><a href="index.php?action=deconnect&controller=utilisateur"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a></li>';
            echo '</ul>';
          }
          else {
            //menu not connected
            echo '<li><a href="index.php?action=connect&controller=utilisateur"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a></li>';
            echo '<li><a href="index.php?action=create&controller=utilisateur"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Inscription</a></li>';
          }
          ?>

            
            
          </ul>
        </div>
      </nav>  

<?php

  $filepath = file::build_path(array("view", self::$object, "$view.php"));//cho nay la "$view".php chu ko phai la view.php ==> vi du : list.php hoac pasAdmin.php hoac error.php
  require_once $filepath;

?>


<footer>

</footer>
  
<!-- footer -->
</body>


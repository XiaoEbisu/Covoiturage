<?php
  require_once file::build_path(array("controller","controllerUtilisateur.php"));
  require_once file::build_path(array("controller","controllerTrajet.php"));
  require_once file::build_path(array("controller","controllerVoiture.php"));


  //controller
  if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
  }
  else {
    $controller = "trajet";
  }

  //action
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  }
  else {
    $action = "accueil"; //afficher tous les résultats
  }
  $controller_class = 'controller'.ucfirst($controller);
  //ucfirst = viết hoa chữ cái đầu
  $upController = 'Controller'.ucfirst($controller);

  // vérifier si l'action appelé existe
  if (in_array("$action", get_class_methods($controller_class))) {
    $upController::$action();//ControllerUtilisateur::readAll();
  }
  else {
    echo "Cette fonction n'existe pas !";
  }
?>

<?php
  require_once file::build_path(array("model","ModelVoiture.php"));

  class ControllerVoiture {

    protected static $object = 'voiture';

    public static function readAll(){
          $tab_v = ModelVoiture::selectAll();
          $view = 'list';
          $controller = 'voiture';
          $pagetitle = 'Listes des voitures';
          require file::build_path(array("view", "view.php"));// dan den file view/view.php
    }

    public static function read(){  //read detail 1 voiture
      $v = ModelVoiture::select($_GET['IdV']);
      if ($v){
        $controller = 'voiture';
        $view = 'detail';
        $pagetitle = 'Votre voiture';
        require file::build_path(array("view","view.php"));
      }
      else {
        $controller = 'voiture';
        $view = 'pasVoiture';
        $pagetitle = 'erreur';
        require file::build_path(array("view", "view.php"));
      }
    }

    public static function create(){
      if(isset($_SESSION['mail'])){
        $voiture = new ModelVoiture("",""," ","");
        $todo = 'Ajouter une voiture';
        $controller = 'voiture';
        $view = 'update';
        $action = 'created';
        $pagetitle = 'Formulaire de création';
        require file::build_path(array("view","view.php"));
      }
      else{
        $view = 'pasConnect';
        $pagetitle = 'Listes des voitures';
        require file::build_path(array("view","view.php"));
      }
    }

    public static function created(){
      if (isset($_SESSION['mail'])){
        try{
          $voiture = new ModelVoiture($_GET["IdV"],
                                      $_SESSION["IdU"],
                                      $_GET["type_voiture"],
                                      $_GET["place"]);
        }catch (Exception $e){
          echo "erreur de création un objet";
        }
          ModelVoiture::save($voiture);
          $view = 'created';
          $controller='voiture';
          $pagetitle = 'Formulaire de creation';
          require file::build_path(array("view", "view.php"));
      }
      else{
        $view = 'pasConnect';
        $pagetitle = 'Formulaire';
        require file::build_path(array("view","view.php"));
      }
    }

    public static function mes_vehicules(){
      if (!isset($_SESSION['mail'])){
        $view = 'pasConnect';
        $pagetitle = 'Veuillez-vous connecter';
        require file::build_path(array("view", "view.php"));
      }

      if (isset($_SESSION['mail'])){
        $tab_v = ModelVoiture::my_car($_SESSION['IdU']);
        $tab_car = ModelVoiture::selectAll();
        $view = 'myCar';
        $pagetitle = 'Mes véhicule';
        require file::build_path(array("view","view.php"));
      }
    }

    public static function supprimerVoiture(){
      if (!isset($_SESSION['mail'])){
        $view = 'pasConnect';
        $pagetitle = 'Veuillez_vous connecter';
        require file::build_path(array("view","view.php"));
      }

      if (isset($_SESSION['mail']) && (isset($_GET['IdV']))) {
        $res =  ModelVoiture::deleteVoiture($_GET['IdV']);
        $view = 'deleteVoiture';
        $controller = 'voiture';
        $pagetitle = 'Supprimer votre voiture';
        require file::build_path(array("view", "view.php"));
      }
    }

    public static function  update(){
      if (isset($_SESSION['mail'])){
        $voiture = ModelVoiture::select($_GET['IdV']);
        $view = 'update';
        $todo = 'Modifier';
        $action = 'modifier';
        $controller = 'voiture';
        $pagetitle = 'Modifier votre voiture';
        require file::build_path(array("view", "view.php"));
      }
      else {
        $view = 'pasConnect';
        $controller = 'voiture';
        $pagetitle = 'Veuillez_vous connecter';
        require file::build_path(array("view","view.php"));
      }
    }

    public static function modifier(){
      if (!isset($_SESSION['mail'])){
        $view = 'pasConnect';
        $pagetitle = 'Veuillez_vous connecter';
        require file::build_path(array("view","view.php"));
      }

      if (isset($_SESSION['mail'])){
          $voiture = new ModelVoiture($_GET['IdV'],
                                  $_SESSION["IdU"],
                                  $_GET["type_voiture"],
                                  $_GET["place"]);
          ModelVoiture::update($voiture);
          $view = 'created';
          $controller = 'voiture';
          $pagetitle = 'Mise à jour';
          require file::build_path(array("view","view.php"));
      }
    }
}
?>
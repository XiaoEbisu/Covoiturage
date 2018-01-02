<?php
  require_once file::build_path(array("model","ModelAvis.php"));

  class ControllerAvis{

  	protected static $object = 'avis';

  	public static function readAll(){
  		$tab_v = ModelAvis::selectAll();
  		$view = 'list';
  		$Controller = 'avis';
  		$pagetitle = 'Listes des avis';
  		require file::build_path(array("view","view.php"));
  	}

  	public static function read(){  //read detail 1 avis
      $v = ModelAvis::select($_GET['IdA']);
      if ($v){
        $controller = 'avis';
        $view = 'detail';
        $pagetitle = 'Votre avis';
        require file::build_path(array("view","view.php"));
      }
      else {
        $controller = 'avis';
        $view = 'pasAvis';
        $pagetitle = 'erreur';
        require file::build_path(array("view", "view.php"));
      }
    }

	public static function create(){
      if(isset($_SESSION['mail'])){
        $avis = new ModelAvis(""," ","");
        $idReviewed = $_GET['IdU'];

        $controller = 'avis';
        $view = 'update';
        $action = 'created';
        $pagetitle = 'Formulaire d\'avis';
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
          $avis = new ModelAvis(NULL,
                                $_GET["IdU"],
                                $_GET["rating"],
                                $_GET["description"]);
        }
        catch (Exception $e){
          echo "erreur de création un objet";
        }
          	ModelAvis::save($avis);
          	var_dump($avis);
          	$view = 'created';
          	$controller='avis';
          	$pagetitle = 'Formulaire d\'avis';
          	require file::build_path(array("view", "view.php"));
	    }
	    else {
	        $view = 'pasConnect';
	        $pagetitle = 'Formulaire';
	        require file::build_path(array("view","view.php"));
	    }
    }

    public static function mes_avis(){
    	if (!isset($_SESSION['mail'])){
        $view = 'pasConnect';
        $pagetitle = 'Veuillez-vous connecter';
        require file::build_path(array("view", "view.php"));
      }

      if (isset($_SESSION['mail'])){
      	$total = ModelAvis::totalStar($_SESSION['IdU']);
        $tab_v = ModelAvis::my_review($_SESSION['IdU']);
        $view = 'myReview';
        $pagetitle = 'Mes avis';
        require file::build_path(array("view","view.php"));
      }
    }

    public static function supprimerAvis(){
      if (!isset($_SESSION['mail'])){
        $view = 'pasConnect';
        $pagetitle = 'Veuillez_vous connecter';
        require file::build_path(array("view","view.php"));
      }

      if (isset($_SESSION['mail']) && isset($_GET['IdA']) && (isset($_GET['isAdmin']) == 1)) {
        $res =  ModelAvis::deleteAvis($_GET['IdA']);
        $view = 'deleteAvis';
        $controller = 'avis';
        $pagetitle = 'Supprimer avis';
        require file::build_path(array("view", "view.php"));
      }
    }

	public static function update(){
      if (isset($_SESSION['mail'])){
        $voiture = ModelAvis::select($_GET['IdA']);
        $view = 'update';
        $todo = 'Modifier';
        $action = 'modifier';
        $controller = 'avis';
        $pagetitle = 'Modifier votre avis';
        require file::build_path(array("view", "view.php"));
      }
      else {
        $view = 'pasConnect';
        $controller = 'avis';
        $pagetitle = 'Veuillez-vous connecter';
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
          $avis = new ModelAvis( $_GET['IdV'],
                                 	$_GET["IdU"],
                                    $_GET["etoile"],
                                    $_GET["description"]);
          ModelAvis::update($avis);
          $view = 'created';
          $controller = 'avis';
          $pagetitle = 'Mise à jour';
          require file::build_path(array("view","view.php"));
      }
    }



  }
?>
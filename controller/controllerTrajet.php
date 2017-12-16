<?php
	require_once file::build_path(array("model","ModelTrajet.php"));
	class ControllerTrajet {
		protected static $object = "trajet";

		public static function accueil(){
			$action = 'found';
        	$view = 'accueil';
        	$controller = 'trajet';
        	$pagetitle = 'Accueil';
        	require file::build_path(array("view", "view.php"));
    	}

		public static function readAll(){ // read all trajet
			$tab_v = ModelTrajet::selectAll();
			$action = "readAll";
			$view = 'list';
			$controller = 'trajet';
			$pagetitle = 'Listes des trajets';
			require file::build_path(array("view","view.php"));// dan den file view/view.php
		}

		public static function read(){  //read detail 1 trajet
			$v = ModelTrajet::select($_GET['Id_Trajet']);
			if ($v){

				$tab_guest = ModelTrajet::my_guest($_GET['Id_Trajet']);
				$places_Restant = ModelTrajet::verif_place_restant($v->get('Id_Trajet'));

				$controller = 'trajet';
				$view = 'detail';
				$pagetitle = 'trajet';
				require file::build_path(array("view","view.php"));
			}
			else {
				$controller = 'trajet';
				$view = 'pasTrajet';
				$pagetitle = 'erreur';
				require file::build_path(array("view", "view.php"));
			}


		}

		public static function create(){
			if(isset($_SESSION['mail'])){
				$trajet = new ModelTrajet("","","","","","","","");
				$v = ModelTrajet::verifVoiture($_SESSION['IdU']);
				if ($v){
					$listVoiture = ModelTrajet::choixVoiture($_SESSION['IdU']);
					$controller = 'trajet';
					$view = 'update';
					$action = 'created';
					$pagetitle = 'Formulaire de création';
					require file::build_path(array("view","view.php"));
				}
				else {
					$controller ='trajet';
					$view = 'pasVoiture';
					$pagetitle= 'Pas de voiture';
					require file::build_path(array("view","view.php"));
				}

			}
			else{
				$view = 'pasConnect';
				$pagetitle = 'Listes des trajets';
				require file::build_path(array("view","view.php"));
			}
		}

		public static function created(){
			if (isset($_SESSION['mail'])){
				try{
					$trajet = new ModelTrajet(NULL,
									$_SESSION['IdU'],
									$_GET["vd"],
									$_GET["va"],
									$_GET["type_voiture"],
									$_GET["place"],
									$_GET["adr_RV"],
									$_GET["adr_DP"],
									$_GET["date"],
									$_GET["heure"],
									$_GET["prix"]);
				}catch(Exception $e){
	              echo "erreur de création un objet";
	            }
	            ModelTrajet::save($trajet);
	            $view = 'created';
	            $controller='trajet';
	            $pagetitle = 'Formulaire de creation';
	            require file::build_path(array("view", "view.php"));
			}
			else{
				$view = 'pasConnect';
				$pagetitle = 'Formulaire';
				require file::build_path(array("view","view.php"));
			}
		}

	//formulaire de tim trajet
		public static function found(){
			$tab_v = ModelTrajet::selectAll();
			$vd1 = $_GET['vd'];
			$va1 = $_GET['va'];
			$date1 = $_GET['date'];
			//$place = $_GET['place'];
			$view = 'list';
			$action ="found";
			$pagetitle = 'Sélectionnez votre trajet';
			require file::build_path(array("view","view.php"));
			
		}

		public static function reserver(){
	    	if (!isset($_SESSION['mail'])){
		      $view = 'pasConnect';
		      $pagetitle = 'Veuillez_vous connecter';
		      require file::build_path(array("view","view.php"));
		    }

		    if (isset($_SESSION['mail']) && (isset($_GET['Id_Trajet']))) {
		      $bool = ModelTrajet::verif_reservation($_SESSION['mail'] , $_GET['Id_Trajet']);
		      if ($bool == 0){
		      $res =  ModelTrajet::booking($_SESSION['IdU'] , $_GET['Id_Trajet'], $_GET['place'] );
			  $view = 'reservationComplete';
			  $controller = 'trajet';
			  $pagetitle = 'Nice Choice';
			  require file::build_path(array("view", "view.php"));
			  }
		    }
		}
		   
		public static function mes_reservations(){
			if (!isset($_SESSION['mail'])){
		      $view = 'pasConnect';
		      $pagetitle = 'Veuillez-vous connecter';
		      require file::build_path(array("view","view.php"));
		    }

		    if (isset($_SESSION['mail'])){
		    	$tab_v = ModelTrajet::my_booking($_SESSION['IdU']);
		    	$tab_billet = ModelTrajet::selectAll();
		    	$view = 'myBillet';
		    	$pagetitle = 'Mes réservations';
		    	require file::build_path(array("view", "view.php"));
		    }
		}

		public static function supprimerReservation(){
			if (!isset($_SESSION['mail'])){
		      $view = 'pasConnect';
		      $pagetitle = 'Veuillez_vous connecter';
		      require file::build_path(array("view","view.php"));
		    }

		    if (isset($_SESSION['mail']) && (isset($_GET['Id_Trajet']))) {
		      $bool = ModelTrajet::verif_reservation($_SESSION['IdU'] , $_GET['Id_Trajet']);
		      if ($bool == 1){
			      $res =  ModelTrajet::deleteReservation($_SESSION['IdU'],$_GET['Id_Trajet']);
				  $view = 'deleteReservation';
				  $controller = 'trajet';
				  $pagetitle = 'Supprimer une reservation';
				  require file::build_path(array("view", "view.php"));
			  }
		    }
		}

		public static function supprimerProposition(){
			if (!isset($_SESSION['mail'])){
		      $view = 'pasConnect';
		      $pagetitle = 'Veuillez_vous connecter';
		      require file::build_path(array("view","view.php"));
		    }
		
		    if (isset($_SESSION['mail']) && (isset($_GET['Id_Trajet']))) {
		      $bool = ModelTrajet::verif_participant($_GET['Id_Trajet']);

		      if ($bool == 1){
			      $res =  ModelTrajet::deleteProposition($_GET['Id_Trajet']);
				  $view = 'deleteProposition';
				  $controller = 'trajet';
				  $pagetitle = 'Supprimer une proposition';
				  require file::build_path(array("view", "view.php"));
			  }
		    }
		}

		public static function mes_propositions(){
			if (!isset($_SESSION['mail'])){
		      $view = 'pasConnect';
		      $pagetitle = 'Veuillez-vous connecter';
		      require file::build_path(array("view","view.php"));
		    }

		    if (isset($_SESSION['mail'])){
		    	$my_idu = $_SESSION['IdU'];
		    	$tab_offer = ModelTrajet::selectAll();
		    	$view = 'myOffer';
		    	$pagetitle = 'Mes propositions';
		    	require file::build_path(array("view", "view.php"));
		    }
		}
	}
?>
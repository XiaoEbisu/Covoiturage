<?php
	require_once file::build_path(array("model","model.php"));

	class ModelAvis extends model{
		private $IdA;
		private $IdU;
		private $etoile;
		private $description;

		protected static $object = 'avis';
		protected static $primary = 'IdA';

		//méthode générique pour getter
	    public function get($nom_attribut){
	      if (property_exists($this, $nom_attribut))
	        return $this->$nom_attribut;
	      return false;
	    }

	    //setter
	    public function set($nom_attribut, $valeur) {
	      if (property_exists($this, $nom_attribut))
	        $this->$nom_attribut = $valeur;
	      return false;
	    }

	    public function __construct($IdA = NULL, $IdU = NULL, $etoile = NULL, $description = NULL){
	      	if (!is_null($IdU) && !is_null($etoile) && !is_null($description)){
		        $this->IdA = $IdA;
		        $this->IdU = $IdU;
		        $this->etoile = $etoile;
		        $this->description = $description;
		      }
	    }

    	public function tabKey(){
      		$tab = array();
		    foreach ($this as $key => $value) {
		        $tab[] = $key;
		    }
		    return $tab;
		}

	    public function tabVal(){
	      	$tab = array();
	      	foreach ($this as $key => $value){
	        	$tab[$key] = $value;
	      	}
	      	return $tab;
	    }

 	public static function my_review($IdU){
      try{
        $sql = "SELECT * FROM avis WHERE IdU=:IdU_tag";
        $value = array("IdU_tag" => $IdU);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
       	$req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelAvis");
       	$res = $req_prep->fetchAll();
       	return $res;
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function deleteAvis($IdA){
      try{
        $sql = "DELETE FROM avis WHERE IdA=:IdA_tag";
        $value = array("IdA_tag" => $IdA);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function totalStar($IdU){
    	try{
    		$sql = "SELECT COUNT(IdA) AS totalStar FROM avis WHERE IdU=:IdU_tag";
    		$value = array("IdU_tag" => $IdU);
    		$req_prep = model::$pdo->prepare($sql);
    		$req_prep->execute($value);
    		$res = $req_prep->fetch(PDO::FETCH_ASSOC);
    		$total = $res['totalStar'];

    		$sql = "SELECT SUM(etoile) AS sommeStar FROM avis WHERE IdU=:IdU_tag";
    		$value = array( "IdU_tag" => $IdU);
    		$req_prep = model::$pdo->prepare($sql);
    		$req_prep->execute($value);
    		$row = $req_prep->fetch(PDO::FETCH_ASSOC);
    		$somme = $row['sommeStar'];

    		return $somme/$total;
    	}
    	catch(Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

	}
?>
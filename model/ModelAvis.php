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
	      	if (!is_null($IdA) && !is_null($IdU) && !is_null($etoile) && !is_null($description)){
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


	    
	}
?>
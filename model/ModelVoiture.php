<?php
  require_once file::build_path(array("model","model.php"));

  class ModelVoiture extends model {
    private $IdV;
    private $IdU;
    private $type;
    private $place;
        
        
    protected static $object = 'voiture';
    protected static $primary ='IdV';


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

    public function __construct($IdV = NULL, $IdU = NULL, $type = NULL, $place = NULL){
      if (!is_null($IdV) && !is_null($IdU) && !is_null($type) && !is_null($place)){
        $this->IdV = $IdV;
        $this->IdU = $IdU;
        $this->type = $type;
        $this->place = $place;
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

    public static function my_car($IdU){
      try{
        $sql = "SELECT * FROM voiture WHERE IdU=:IdU_tag";
        $value = array("IdU_tag" => $IdU);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->fetchAll();
        return $res;
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function deleteVoiture($IdV){
      try{
        $sql = "DELETE FROM voiture WHERE IdV=:IdV_tag";
        $value = array("IdV_tag" => $IdV);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }
}
?>
<?php
  require_once file::build_path(array("model","model.php"));

  class ModelTrajet extends model {
    private $Id_Trajet;
    private $IdU;
    private $vd;
    private $va;
    private $type_voiture;
    private $place;
    private $adr_RV;
    private $adr_DP;
    private $date;
    private $heure;
    private $prix;
    
    protected static $object = 'trajet';
    protected static $primary ='Id_Trajet';


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

    //constructeur
    public function __construct($Id_Trajet = NULL, $IdU = NULL, $vd = NULL, $va = NULL,$type_voiture = NULL, $place = NULL, $adr_RV = NULL, $adr_DP = NULL, $date = NULL, $heure = NULL, $prix = NULL){
      if (!is_null($IdU) && !is_null($vd) && !is_null($va) && !is_null($type_voiture) && !is_null($place) && !is_null($adr_RV)
        && !is_null($adr_DP)){
        $this->Id_Trajet = $Id_Trajet;
        $this->IdU = $IdU;
        $this->vd = $vd;
        $this->va = $va;
        $this->type_voiture = $type_voiture;
        $this->place = $place;
        $this->adr_RV = $adr_RV;
        $this->adr_DP = $adr_DP;
        $this->date = $date;
        $this->heure = $heure;
        $this->prix = $prix;
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

    public static function recherche($vd, $va, $date, $place){
      try{
        $sql = "SELECT * FROM trajet WHERE vd=:vd_tag AND va=:va_tag AND date=:date_tag AND place=:place_tag";
        $req_prep = model::$pdo->prepare($sql);
        $value = array( "vd_tag" => $vd,
                        "va_tag" => $va,
                        "date_tag" => $date,
                        "place_tag" => $place);
        $req_prep->execute($value);
        $res = $req_prep->fetchAll();
        return $res;
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function verif_reservation($IdU, $Id_Trajet){
      try{
        $sql = "SELECT * FROM reservation WHERE IdU=:IdU_tag AND Id_Trajet=:Id_Trajet_Tag";
        $value = array( "IdU_tag" => $IdU,
                        "Id_Trajet_Tag" => $Id_Trajet);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->rowCount();
        return $res;
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function verif_participant($Id_Trajet){
      try{
        $sql = "SELECT * FROM trajet WHERE Id_Trajet=:Id_Trajet_Tag";
        $value = array("Id_Trajet_Tag" => $Id_Trajet);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->rowCount();
        return $res;
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }


    public static function verif_place_restant($Id_Trajet){
      try{
        $sql = "SELECT SUM(placeReserve) as somme FROM reservation WHERE Id_Trajet=:Id_Trajet_Tag";
        $value = array( "Id_Trajet_Tag" => $Id_Trajet);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->bindParam(":Id_Trajet_Tag", $Id_Trajet, PDO::PARAM_INT);
        $req_prep->execute();
        $row = $req_prep->fetch(PDO::FETCH_ASSOC);
        $somme = $row["somme"];

        $sql = "SELECT place FROM trajet WHERE Id_Trajet=:Id_Trajet_Tag";
        $value = array( "Id_Trajet_Tag" => $Id_Trajet);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->fetch(PDO::FETCH_ASSOC);
        $placesDispo = $res['place'];
        

        return $placesDispo - $somme;
      }catch(Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function booking($IdU , $Id_Trajet, $placeAReserve){
      try{
          $sql = "INSERT INTO reservation (IdU, Id_Trajet, placeReserve) VALUES (:IdU_tag,:Id_Trajet_Tag, :placeReserve_tag)";
          $value = array( "IdU_tag" => $IdU,
                          "Id_Trajet_Tag" => $Id_Trajet,
                          "placeReserve_tag" => $placeAReserve);
          $req_prep = model::$pdo->prepare($sql);
          $req_prep->execute($value);
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

 //list reservation de $IdU (là khách)
    public static function my_booking($IdU){
      try{
        $sql = "SELECT * FROM reservation WHERE IdU=:IdU_tag";
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

  //list de participants de $Id_Trajet 
    public static function my_guest($Id_Trajet){
      try{
        $sql = "SELECT * FROM reservation WHERE Id_Trajet=:Id_Trajet_tag";
        $value = array("Id_Trajet_tag" => $Id_Trajet);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->fetchAll();
        return $res;
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    //hơi xấu vì trong model trajet mà gọi table voiture, hết cách r or chưa nghĩ ra
    public static function verifVoiture($IdU){
      try{
        $sql = "SELECT * FROM voiture WHERE IdU=:IdU_tag";
        $value = array("IdU_tag" => $IdU);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->rowCount();
        return $res;
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function deleteReservation($IdU,$Id_Trajet){
      try{
        $sql = "DELETE FROM reservation WHERE IdU=:IdU_tag AND Id_Trajet=:Id_Trajet_tag";
        $value = array( "IdU_tag" => $IdU,
                        "Id_Trajet_tag" => $Id_Trajet);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function deleteProposition($Id_Trajet){
      try{
        $sql = "DELETE FROM trajet WHERE Id_Trajet=:Id_Trajet_tag";
        $value = array("Id_Trajet_tag" => $Id_Trajet);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    public static function choixVoiture($IdU){
      try{
        $sql = "SELECT * FROM voiture WHERE IdU=:IdU_tag";
        $value = array("IdU_tag" => $IdU);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->fetchAll(PDO::FETCH_OBJ);
        return $res;
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }
}
?>

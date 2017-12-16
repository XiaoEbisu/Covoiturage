<?php
  require_once file::build_path(array("model","model.php"));

  class ModelUtilisateur extends model {
    private $IdU;
    private $nom;
    private $prenom;
    private $adresse;
    private $age;
    private $mail;
    private $mdp;
    private $cle;
    private $image;
    protected static $object = 'utilisateur';
    protected static $primary ='IdU';


    //méthode générique pour getter
    public function get($nom_attribut){
      if (property_exists($this, $nom_attribut))
        return $this->$nom_attribut;
      return false;
    }

    //setter
    public function setIdU($IdU){
      $this->IdU = $IdU;
    }
    public function setNom($nom){
      $this->nom = $nom;
    }
    public function setPrenom($prenom){
      $this->prenom = $prenom;
    }
    public function setAdresse($adresse){
      $this->adresse = $adresse;
    }
    public function setAge($age){
      $this->age = $age;
    }
    public function setMail($mail){
      $this->mail = $mail;
    }
    public function setIsAdmin($isAdmin){
      $this->isAdmin = $isAdmin;
    }
    public function setMotDePasse($mdp){
      $this->mdp = $mdp;
    }
    public function setCle($cle){
      $this->cle = $cle;
    }
    public function setImage($image){
      $this->image = $image;
    }

    //un constructeur
    public function __construct($IdU = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $age = NULL, $mail = NULL, $mdp = NULL, $image = NULL){
      if (!is_null($nom) && !is_null($prenom) && !is_null($adresse) && !is_null($age) && !is_null($mail) && !is_null($mdp)){
        $this->IdU = $IdU;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->age = $age;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $clef = ModelUtilisateur::random_cle(5);
        $this->cle = $clef;
        $this->image = $image;
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

    public static function getIdByMail($mail){
      try {
        $sql = "SELECT IdU from utilisateur WHERE mail=:mail_tag";
        $req_prep = model::$pdo->prepare($sql);
        $value = array("mail_tag" => $mail);
        $req_prep->execute($value);
        $res = $req_prep->fetch();
        return $res['IdU'];
      }
      catch (Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

//vérif mail exist
    public static function verif_mail_exist($_mail){
        $sql = "SELECT mail FROM utilisateur WHERE mail =:mail_tag";
        $value = array("mail_tag" => $_mail);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->fetch();
        if($res['mail'] == $_mail) 
          return 1; // mail utilisé
        else 
          return 0; // mail valide
    }

//générer une clé pour activer id de longeur de $long_cle
    public static function random_cle($long_cle){
      $chaine = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
      $string = "";
      for ( $i = 0; $i < $long_cle; $i++){
        $string .= $chaine[rand()%strlen($chaine)];
        //strlen() = longeur de tab parametre
      }
      return $string;
    }

//envoyer une clé à mail de l'utilisateur
   /* public static function envoieCleUser($mail){
      try{
        $sql = "SELECT mail, cle FROM utilisateur WHERE mail=:mail_tag";
        $value = array( "mail_tag" => $mail);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->fetch(); //récuperer la ligne de la BDD
        $cleBDD = $res['cle']; //récupere la cle dans la BDD
        $to = $res['mail'];
        $suject = "Activer votre compte sur Covoiturage";
        $entete = "From: Admin@Covoiturage.com";
        $message = "Bienvenue sur notre site,\r\n
        Veuillez cliquer sur le lien ci-dessous ou \r\n
        copier/coller dans votre navigateur\r\n
        <a href=\"localhost/covoiturage/index.php?action=activer&controller=utilisateur\"> Cliquer ici !</a>\r\n
        Votre code d'activation : ".$cleBDD."\r\n
        -------Merci---------\r\n";
        mail($to, $suject, $message, $entete);
        //c'est un fonction de php (có sẵn)
      }
      catch(Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }
    */

//vérifier si la clé est bonne
    public static function veriUser($mail, $cle){
      try{
        $bool; 
        $sql = "SELECT active, cle FROM utilisateur WHERE mail=:mail_tag";
        $value = array( "mail_tag" => $mail);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->fetch(); //récuperer la ligne de la BDD
        $cleBDD = $res['cle']; //récupere la cle dans la BDD
        $active = $res['active'];

        if($active == '1'){
          $bool = 2;
        }
        else{
          if($cle == $cleBDD){
            $sql = "UPDATE utilisateur SET active = 1 WHERE mail = :mail_tag";
            $value = array( "mail_tag" => $mail);
            $req_prep = model::$pdo->prepare($sql);
            $req_prep->execute($value);
            $bool = 1;
          }
          else{
            $bool = 0;
          }
        }
        return $bool;
      }
      catch(Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    //verifier si mail et mdp (connexion) est bon
    public static function isUser($mail, $mdp){
      try{
        $sql = "SELECT IdU, mail, mdp FROM utilisateur WHERE mail=:mail_tag AND mdp=:mdp_tag";
        $value = array( "mail_tag" => $mail,
                        "mdp_tag" => $mdp);
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute($value);
        $res = $req_prep->rowCount();// $res = 1 => utilisateur exist

        return $res;
        
      }
      catch(Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    //verifier si l'utilisateur est Admin
    public static function isAdmin($mail){
      try{
        $sql = "SELECT isAdmin FROM utilisateur WHERE mail=:mail_tag";
        $value = array("mail_tag" => $mail);
        $req_prep = model::$pdo->prepare($sql);
        $res = $req_prep->execute($value);
        return $res['isAdmin'];
      }
      catch(Exception $e){
        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    }

    

  }
 ?>

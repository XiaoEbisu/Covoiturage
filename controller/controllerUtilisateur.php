<?php
  require_once file::build_path(array("model","ModelUtilisateur.php"));

  class ControllerUtilisateur {

    protected static $object = 'utilisateur';

    public static function readAll(){
      if (isset($_SESSION['mail'])){
        if ($_SESSION['isAdmin'] == 1) {
          $tab_v = ModelUtilisateur::selectAll();
          $view = 'list';
          $controller = 'utilisateur';
          $pagetitle = 'Listes des utilisateurs';
          require file::build_path(array("view", "view.php"));// dan den file view/view.php
        }
      }
      else {
        $view = 'pasAdmin';
        $pagetitle = 'erreur';
        require file::build_path(array("view","view.php"));
      }
    }

    public static function read(){
      if (!isset($_SESSION['mail'])){
        $view= 'pasConnect';
        $controller = 'utilisateur';
        $pagetitle='pas Connect';
        require file::build_path(array("view","view.php"));
        return ;
      }
      $bool = (isset($_GET['mail']) || isset($_GET['IdU']));
      if ($bool) {
        if(isset($_GET['IdU'])){
          $v = ModelUtilisateur::select($_GET['IdU']);
          $voiture = ModelUtilisateur::voiture($_GET['IdU']);
          $trajet = ModelUtilisateur::trajet($_GET['IdU']);
          $totalStar = ModelUtilisateur::totalStar($_GET['IdU']);
          $totalAvis = ModelUtilisateur::totalAvis($_GET['IdU']);
          $total = ModelAvis::totalStar($_SESSION['IdU']);
          $tab_v = ModelAvis::my_review($_SESSION['IdU']);
        }
        else{  
          $v = ModelUtilisateur::select(ModelUtilisateur::getIdByMail($_GET['mail']));
          $voiture = ModelUtilisateur::voiture(ModelUtilisateur::getIdByMail($_GET['mail']));
          $trajet = ModelUtilisateur::trajet(ModelUtilisateur::getIdByMail($_GET['mail']));
          $totalStar = ModelUtilisateur::totalStar(ModelUtilisateur::getIdByMail($_SESSION['mail']));
          $totalAvis = ModelUtilisateur::totalAvis(ModelUtilisateur::getIdByMail($_SESSION['mail']));
          $total = ModelAvis::totalStar(ModelUtilisateur::getIdByMail($_SESSION['mail']));
          $tab_v = ModelAvis::my_review(ModelUtilisateur::getIdByMail($_SESSION['mail']));

        }
      }
      if ($bool && $v && ($_SESSION['isAdmin'] == 0)) {
        $controller = 'utilisateur';
        $view = 'detail';
        $pagetitle = 'Utilisateur';
        require file::build_path(array("view","view.php"));
      }
      else {
        if ($bool && $v && $_SESSION['isAdmin'] == 1) {
          $controller = 'utilisateur';
          $view = 'detailAdmin';
          $pagetitle = 'Utilisateur';
          require file::build_path(array("view","view.php"));
          }
          else{
            $view = 'pasExiste';
            $controller = 'utilisateur';
            $pagetitle = 'erreur';
            require file::build_path(array("view", "view.php"));
          }
      }
    }


//check xem co du dieu kien de dua ra formule
    public static function create(){

      if (isset($_SESSION['mail'])){
        $isAdmin = ModelUtilisateur::isAdmin($_SESSION['mail']);
        if ($isAdmin != 1) {
          $view = 'pasAdmin';
          $controller = 'utilisateur';
          $pagetitle = 'Listes des utilisateurs';
          require file::build_path(array("view", "view.php")); 
        }
      }

      if (!isset($_SESSION['mail'])){
        $user = new ModelUtilisateur("", "", "", "", "", "", "", "");
        $todo = 'Inscription';
        $controller = 'utilisateur';
        $view = 'update';
        $verif = 'true';
        $action = 'created';
        $pagetitle = 'Formulaire de création';
        require file::build_path(array("view", "view.php"));
      }
    }

//check xem formule co du dieu kien khong
    public static function created(){

    /*if (isset($_SESSION['mail'])){
      $isAdmin = ModelUtilisateur::isAdmin($_SESSION['mail']);
      if ($isAdmin != 1) {
        $view = 'pasAdmin';
        $controller = 'utilisateur';
        $pagetitle = 'Listes des utilisateurs';
        require file::build_path(array("view", "view.php")); 
      }
    }*/
    
    //filter_var là 1 hàm kiểm tra 1 chuỗi có phải là 1 dữ liệu hợp lệ hay không (VD: Email hợp lệ, IP hợp lệ, URL hợp lệ...)
      if (!isset($_SESSION['mail']) || $isAdmin == 1){
        if (filter_var($_GET["mail"], FILTER_VALIDATE_EMAIL) && ModelUtilisateur::verif_mail_exist($_GET['mail']) == 0){
            if ($_GET["verif_mdp"] == $_GET["mdp"]){
              try{
                $user = new ModelUtilisateur(NULL,
                                      $_GET["nom"], 
                                      $_GET["prenom"], 
                                      $_GET["adresse"], 
                                      $_GET["age"], 
                                      $_GET["mail"], 
                                      $_GET["mdp"], 
                                      $_GET["image"]);
              }catch(Exception $e){
                echo "erreur de création un objet";
              }
              ModelUtilisateur::save($user);
              //ModelUtilisateur::envoieCleUser($_GET['mail']);
              $view = 'created';
              $controller = 'utilisateur';
              $pagetitle = 'Formulaire de creation';
              require file::build_path(array("view", "view.php"));
            }
            else{
              $user = new ModelUtilisateur("", "", "", "", "", "", "", "");
              $view = 'update';
              $champ = 'required';
              $action = 'created';
              $verif = "mdp";
              $controller = 'utilisateur';
              $pagetitle = 'Formulaire de creation';
              $message = 'Les deux mots de passes ne correspondent pas!';
              require file::build_path(array("view", "view.php"));
            }
        }
        else {
          $user = new ModelUtilisateur("", "", "", "", "", "", "", "");
          $view = 'update';
          $champ = 'required';
          $action = 'created';
          $verif = "mail";
          $controller = 'utilisateur';
          $pagetitle = 'Formulaire de creation';
          $message = 'Mail invalide òu il a été déjà utilisé';
          require file::build_path(array("view", "view.php"));
        }
      }
    }

  public static function connect(){
    if (isset($_SESSION['mail'])){
      $view = 'connected';
      $controller = 'utilisateur';
      $pagetitle = 'deja connecte';
      require file::build_path(array("view", "view.php")); 
    }

    if (!isset($_SESSION['mail'])){
      $controller = 'utilisateur';
      $view = 'connect';
      $action = 'connected';
      $pagetitle = 'Formulaire de connexion';
      require file::build_path(array("view", "view.php"));
    }
  }

  public static function connected(){
    if (isset($_SESSION['mail'])){
      $view = 'dejaConnected';
      $controller = 'utilisateur';
      $pagetitle = 'deja connecte';
      require file::build_path(array("view", "view.php")); 
    }
    else {
      if(!empty($_GET['mail'] && !empty($_GET['mdp']))){
        $isConnect = ModelUtilisateur::isUser($_GET['mail'], $_GET['mdp']);
        if ($isConnect == 1){
          $idUtilisateur = ModelUtilisateur::getIdByMail($_GET['mail']);
          $res = ModelUtilisateur::select($idUtilisateur);
          if ( $res->get('isBan') == 0){
            $_SESSION['mail'] = $_GET['mail'];
            $_SESSION['IdU'] = $idUtilisateur;
            $prenom = $res->get('prenom');
            $_SESSION['prenom'] = $prenom;
            $_SESSION['isAdmin'] = $res->get('isAdmin');
            $view = 'connected';
            $controller = 'utilisateur';
            $pagetitle = 'Bienvenue';
            require file::build_path(array("view", "view.php"));
          }
          else {
            $view = 'ban';
            $controller = 'utilisateur';
            $pagetitle = 'Erreur';
            require file::build_path(array("view", "view.php"));

          }
        }
        else {
          $view = 'erreurConnect';
          $controller = 'utilisateur';
          $pagetitle = 'Erreur de connexion';
          require file::build_path(array("view", "view.php"));
        }
      }
      else{
        $controller = 'utilisateur';
        $view = 'connect';
        $action = 'connected';
        $pagetitle = 'Formulaire de connexion';
        require file::build_path(array("view", "view.php"));
      }
    }
  }

  public static function deconnect(){
    if(isset($_SESSION['mail'])){
      unset($_SESSION['mail']);
      unset($_SESSION['prenom']);
      $view = 'deconnexion';
      $controller = 'utilisateur';
      $pagetitle = 'Au revoir';
      require file::build_path(array("view", "view.php"));
    }
    else{
      $view = 'pasConnect';
      $controller = 'utilisateur';
      $pagetitle = 'Echec de déconnexion';
      require file::build_path(array("view", "view.php"));
    }
  }

  public static function update(){
    if(isset($_SESSION['mail'])){
      $isAdmin = ModelUtilisateur::isAdmin($_SESSION['mail']);   
      $idUtilisateur = ModelUtilisateur::getIdByMail($_SESSION['mail']);
      $user = ModelUtilisateur::select($idUtilisateur);
      $view = 'update';
      $verif = 'empty';
      $todo = 'Modifier';
      $action = 'updated';
      $controller = 'utilisateur';
      $pagetitle = 'Modifier votre profil';
      require file::build_path(array("view","view.php"));
  
    }
    if(!isset($_SESSION['mail'])){
      $view='droitErreur';
      $controller='utilisateur';
      $pagetitle='erreur';
      require file::build_path(array("view","view.php"));
    }
  }

  public static function updated(){
    if(isset($_SESSION['mail'])){
      $isAdmin = ModelUtilisateur::isAdmin($_SESSION['mail']);
      if($isAdmin==1 || $_SESSION['mail'] == $_GET['mail']){
        if($_GET['mdp']==$_GET['verif_mdp']){
          $idUtilisateur= ModelUtilisateur::getIdByMail($_GET['mail']);
          $user = new ModelUtilisateur($idUtilisateur,
                                    $_GET["nom"], 
                                    $_GET["prenom"], 
                                    $_GET["adresse"], 
                                    $_GET["age"], 
                                    $_GET["mail"], 
                                    $_GET["mdp"], 
                                    $_GET["image"]);
          ModelUtilisateur::update($user);
          $view = 'updated';
          $controller = 'utilisateur';
          $pagetitle = 'Mise à jour';
          require file::build_path(array("view","view.php"));
        }
        else{
          $view = 'update';
          $action = 'update';
          $verif = 'mdp';
          $controller = 'utilisateur';
          $pagetitle = 'erreur';
          $message = 'Les mots de passes ne correspondent pas';
          require file::build_path(array("view","view.php"));
        }
      }
    }
    else{
      $view = 'pasConnect';
      $controller = 'utilisateur';
      $pagetitle = 'erreur';
      require file::build_path(array("view","view.php"));
    }
  }

  public static function ban(){
    if (isset($_SESSION['mail']) && isset($_SESSION['isAdmin']) == 1){
      ModelUtilisateur::banUser($_GET['IdU']);
      $view = 'ban';
      $controller = 'utilisateur';
      $pagetitle = 'Black List';
      require file::build_path(array("view","view.php"));
    }
    else {
      $view = 'pasAdmin';
      $controller = 'utilisateur';
      $pagetitle = 'Désolé';
      require file::build_path(array("view", "view.php")); 
    }
  }

  public static function unban(){
   if (isset($_SESSION['mail']) && isset($_SESSION['isAdmin']) == 1){
      ModelUtilisateur::unbanUser($_GET['IdU']);
      $view = 'unban';
      $controller = 'utilisateur';
      $pagetitle = 'White List';
      require file::build_path(array("view","view.php"));
      }
    else {
      $view = 'pasAdmin';
      $controller = 'utilisateur';
      $pagetitle = 'Désolé';
      require file::build_path(array("view", "view.php")); 
    }
  }
}

?>

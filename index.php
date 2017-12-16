<?php
  session_start();
  $ROOT_FOLDER = __DIR__; //pour initialiser le lien de root à dossier actuel
  $DS = DIRECTORY_SEPARATOR; //là cái gạch chéo ở đường link, ở window thì là \ còn linux là /
  require_once "{$ROOT_FOLDER}{$DS}lib{$DS}file.php";
  require_once file::build_path(array("controller","router.php"));
 ?>

<?php
class file {
  public static function build_path($path_array) {
    $DS = DIRECTORY_SEPARATOR;
    $ROOT_FOLDER = __DIR__."/..";
    return $ROOT_FOLDER. $DS . join($DS, $path_array);
  }
  //méthode pour simplifier l'inclusion d'un fichier
}
?>

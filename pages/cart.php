<?php
session_start();
require __DIR__."/../config.php" ;

if(!isset($_SESSION['login'])) {
    header("Location:".$GLOBALS['DOCUMENT_DIR']."index.php");
    exit();
}


require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
use magic\Template ;
use magic\Cart ;
?>

    <!-- Démarre le buffering -->
<?php ob_start() ?>


<?php $content=ob_get_clean() ?>


<?php
?>
    <!-- Utilisation du contenu bufferisé -->
<?php Cart::render(); ?>
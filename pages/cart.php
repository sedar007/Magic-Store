<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: index.php");
}
use magic\Cart;
//require_once __DIR__ . DIRECTORY_SEPARATOR . "init_autoload.php";
require_once "../init_autoload.php";
?>

    <!-- Démarre le buffering -->
<?php ob_start() ?>


<?php $content=ob_get_clean() ?>


<?php
?>
    <!-- Utilisation du contenu bufferisé -->
<?php Cart::render(); ?>
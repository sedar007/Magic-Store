<?php 
session_start() ;
$logged = isset($_SESSION['login']) ;

require_once "config.php" ;
require $GLOBALS['PHP_DIR']."class/Autoloader.php";

Autoloader::register();
use magic\Template ;
?>

<?php ob_start() ?>

<div class="content-index">
    <?php if(isset( $_SESSION['login'])){ ?>
    <div class="Bienvenue-index">Hi <?php echo $_SESSION['login'] ?>,</div>
    <?php };?>
    <div class="title-index">WELCOME TO THE MAGIC STORE</div>
    <img src="<?php echo $GLOBALS['IMG_DIR']?>MagicLogo4.png" alt="logo Magic" class="photo-index">
</div>

<?php $content=ob_get_clean() ?>

<?php
    $title = "Magic Store";
   ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>
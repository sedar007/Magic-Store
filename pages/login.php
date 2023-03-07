<?php
session_start() ;
require __DIR__."/../config.php" ;

require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
use magic\Template ;
use magic\Logger ;
$connection = new Logger() ;

if ( isset($_POST['pseudo']) && isset($_POST['psw']) ){
	$username = htmlspecialchars($_POST["pseudo"]) ;
  $password = htmlspecialchars($_POST["psw"]) ;
  $tab = $connection->log($username,$password );
	
	if($tab['granted']){
		$_SESSION['login'] = ucfirst($_POST['pseudo']) ;
        header("Location:" .$GLOBALS['DOCUMENT_DIR']. "index.php");
        exit();
	}
}

ob_start();?>
<div class="form-container">

<?php 
if(!isset($tab)):
	$connection->generateLoginForm($GLOBALS['DOCUMENT_DIR']."pages/login.php");
elseif(!$tab['granted']):?>
	<div class="errMsg">
                <span> <?php
                    $erreur = $tab['error'];
                    if($erreur != null)
                        echo $tab['error']; ?>

                </span>
        </div>
	<?php $connection->generateLoginForm($GLOBALS['DOCUMENT_DIR']."pages/login.php");

endif;
?>
</div>



<?php $content=ob_get_clean() ?>

<?php
$title = "Login";
?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>
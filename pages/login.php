
<?php
session_start(); // démarrage/récupération de la sesssion
//var_dump($_SESSION['login']);
use magic\Template;
use magic\Logger;
//require_once __DIR__ . DIRECTORY_SEPARATOR . "init_autoload.php";
require_once "../init_autoload.php";


?>

<!-- Démarre le buffering -->
<?php ob_start() ?>


<?php  $connection = new Logger() ?>
<div class="form-container">

<?php if (isset($_POST['pseudo']) && isset($_POST['psw'])): // si le paramètre msg a bien été reçu...
    $username = $_POST["pseudo"];
    $username = htmlspecialchars($username) ;

    $password = $_POST["psw"];
    $password = htmlspecialchars($password) ;

    $tab = $connection->log($username,$password );

    if(!$tab['granted']) : ?>
        <div class="errMsg">
                <span> <?php
                    $erreur = $tab['error'];
                    if($erreur != null)
                        echo $tab['error']; ?>

                </span>
        </div>
        <?php $connection->generateLoginForm("login.php"); ?>

    <?php else :
        $_SESSION['login'] = ucfirst($_POST['pseudo']) ;
    var_dump($_SESSION['login'] );

        header("Location: index.php");
        exit();
     endif ?>

<?php else : ?>
    <?php $connection->generateLoginForm("login.php"); ?>

<?php endif ?>

</div>

<?php $content=ob_get_clean() ?>

<?php
$title = "Login";
?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title,"../"); ?>
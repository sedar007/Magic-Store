<?php
session_start();
require __DIR__."/../config.php" ;
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
use magic\Cart ;

if(!isset($_SESSION['login'])){
    header("Location:".$GLOBALS['DOCUMENT_DIR']."index.php");

}



$nouveau = new Cart();
$nouveau->update($_POST);

header("Location: ".$GLOBALS['DOCUMENT_DIR']."pages/cart.php");
exit() ;
?>
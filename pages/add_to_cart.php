<?php
session_start();


if(!isset($_SESSION['login'])){
    header("Location:" .$GLOBALS['DOCUMENT_DIR']. "index.php");
    exit() ;

}
require __DIR__."/../config.php" ;


require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
use magic\Cart ;

// var_dump($_POST);

$test = new Cart();

$test->add($_POST);
header("Location:".$GLOBALS['DOCUMENT_DIR']."pages/cart.php");
exit() ;
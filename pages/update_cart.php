<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: index.php");

}
use magic\Cart;
//require_once __DIR__ . DIRECTORY_SEPARATOR . "init_autoload.php";
require_once "../init_autoload.php";


$nouveau = new Cart();
$nouveau->update($_POST);

var_dump($_SESSION);
?>
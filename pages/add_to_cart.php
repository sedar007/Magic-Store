<?php
session_start();


if(!isset($_SESSION['login'])){
    header("Location: index.php");

}
require_once "../init_autoload.php";

use magic\Cart;

//var_dump($_POST);

$test = new Cart();

$test->add($_POST);
header("Location: cart.php");


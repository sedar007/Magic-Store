
<?php
session_start();


if(!isset($_SESSION['login'])){
    header("Location: index.php");

}
use magic\Template;
use magic\Shop;

//require_once __DIR__ . DIRECTORY_SEPARATOR . "init_autoload.php";
require_once "../init_autoload.php";
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<?php $shop = new Shop(); ?>
<script src = "../Javascript/shop.js"></script>

<form id="content-shop" action="add_to_cart.php" method="post" autocomplete ="off">
        <div class="header-shop">
            <div id="selection-shop">
                Selection : <span id="val-id-cartCount">none</span>
            </div>

            <button type = "submit" id="addCart" class="btn-style">Add to cart</button>

        </div>
        <div class="container-shop">
            <?php $shop->generateShop();?>

        </div>

</form>
<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>


<?php
$title = "Magic Store";
?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title,"../"); ?>
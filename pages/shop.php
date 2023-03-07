<?php
session_start() ;
require __DIR__."/../config.php" ;

if(!isset($_SESSION['login'])){
    header("Location:". $GLOBALS['DOCUMENT_DIR']. "index.php");

}



require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
use magic\Template ;
use magic\Shop ;
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<?php $shop = new Shop(); ?>
<script src = "<?php echo $GLOBALS['JS_DIR'] ?>shop.js"></script>

<form id="content-shop" action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/add_to_cart.php" method="post" autocomplete ="off">
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
$title = "Shop";
?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>
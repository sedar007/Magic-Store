<?php
session_start() ;

require __DIR__."/../config.php" ;

require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
use magic\Template ;
use magic\Browser ;


?>

<!-- Démarre le buffering -->
<?php ob_start()  ?>
    <?php $browse = new Browser(); ?>
    <div class="browse">
            <div class="title-browse">
                Please <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/login.php">login</a> to shop...
            </div>
        <div class="container-browse">
            <?php $browse->generateCards();?>

        </div>
    </div>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>



<?php $title = "Browser";?>

<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>
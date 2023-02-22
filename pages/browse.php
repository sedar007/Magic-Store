
<?php
use magic\Template;
use magic\Browser;

//require_once __DIR__ . DIRECTORY_SEPARATOR . "init_autoload.php";
require_once "../init_autoload.php";


?>

<!-- Démarre le buffering -->
<?php ob_start()  ?>
    <?php $browse = new Browser(); ?>
    <div class="browse">
            <div class="title-browse">
                Please <a href="login.php">login</a> to shop...
            </div>
        <div class="container-browse">
            <?php $browse->generateCards();?>

        </div>
    </div>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>



<?php $title = "Browser";?>

<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title,"../"); ?>
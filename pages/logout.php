<?php
session_start();
// destruction de la session (et donc du contenu de $_SESSION)
session_destroy();
require __DIR__."/../config.php" ;

header("Location:".$GLOBALS['DOCUMENT_DIR']."index.php");
exit();



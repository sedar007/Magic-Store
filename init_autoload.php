<?php
function autoload($class_name){
    // on remplace les \ du namespace par les / des répertoires
    $class_name = str_replace('\\', '/', $class_name) ;

    // on inclut le fichier correspondant
    require $class_name . '.php' ;
}
spl_autoload_register('autoload') ;

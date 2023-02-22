<?php
session_start() ;

if (isset($_POST['pseudo']) && isset($_POST['psw'])){

    if ($_POST['pseudo'] == 'sedar' && $_POST['psw'] == 'theGoat'){

        // enregistrement dans la sesssion
        $_SESSION['login'] = $_POST['pseudo'] ;

        // tout est ok : redirection vers la home page
        header("Location: index.php");
        exit();

    }else{
        // ce n'est pas bon : retour vers la page de login
        header("Location: login.php");
        exit();
    }

}else{
    // ce n'est pas bon : retour vers la page de login
    header("Location: login.php");
    exit();

}
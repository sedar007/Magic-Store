<?php
namespace magic;
use pages;
class Template{
    public static function render(string $content, string $title, string $direction) : void{?>
        <!doctype html>
        <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="<?php echo $direction."Styles/main.css"?>">

                <script src = "<?php echo $direction."Javascript/main.js"?>"></script>
                <title> <?php echo $title ?> </title>
            </head>
            <body>
                <?php
                    if($direction =="")
                        $direction = "pages/";
                    else
                        $direction= "";
                        ?>
                <?php include $direction."header.php";?>

                <div id="container">
                    <?php echo $content ?> <!-- INJECTION DU CONTENU -->
                </div>

                <?php include  $direction."footer.php";?>

            </body>
        </html>

        <?php
    }

}
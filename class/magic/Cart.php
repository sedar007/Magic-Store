<?php

namespace magic;



class Cart{
    private array $content = array(
        'paul'=>1
);

    public function __construct(){
        if(isset($_SESSION['cart']))
            $this->content = $_SESSION['cart'];
    }

    public function add(array $selection): void{

        foreach ( $selection as $value ){
            if(array_key_exists($value, $this->content))
                $this->content[$value] +=1;
            else
                $this->content[$value] = 1;
        }

        $_SESSION['cart'] = $this->content;

    }

    public function update(array $cart): void{
        foreach ( $cart as $key=> $value ){
            if( $value > 0) {
                $value += 1;
            }
            else
                unset($cart[$key]);
        }


        $_SESSION['cart'] =$cart;

        header("Location:". $GLOBALS['DOCUMENT_DIR']."pages/cart.php");
			exit();

//        $this::render();
}

    public static function render() : void{?>

        <script src = "<?php echo $GLOBALS['JS_DIR']?>update.js"></script>

        <!-- Démarre le buffering -->
        <?php ob_start() ?>

            <?php
        $json = file_get_contents($GLOBALS['PHP_DIR']."data/cards.json") ;
        $data = (array) json_decode($json) ;
        ?>

        <form id="container-update" action="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/update_cart.php" method="post" >

            <div class="entete-cart">
                Cart : <span id="cout-total-cart">
                    0
                </span>
            </div>
            <button type = "submit" id="bouton-update" class="btn-style">UPDATE CART</button>

            <div id="affiche-cart">
                <?php foreach ( $_SESSION['cart'] as $key => $value ){
                if($key == "paul" )
                    continue;

                $cart = $data[$key];
                $name = $cart->name;
                $image = $cart->image_uris->normal;
                $id = $cart->id;


                ?>
                <div class="carte-cart">
                    <img alt = "image carte" src=' <?php echo $image?>'/>
                    <div class="description-carte">

                        <label class="name-cart" for="id-carte-cart"><?php echo $name ?> </label>
                        <input type="number" min="0" class="qte-cart" name="<?php echo $id?>"  id="qte-carte-cart" value="<?php echo $value?>">

<!--                        <div class="name-cart">-->
<!--                            --><?php //echo $name ?>
<!--                        </div>-->
<!--                        <div class="qte-cart">-->
<!--                            --><?php //echo $value ?>
<!--                        </div>-->
                    </div>
                </div>
                <?php } ?>

            </div>
        </form>




<!--            testtsts-->
        <!-- Récupère le contenu du buffer (et le vide) -->
        <?php $content=ob_get_clean() ?>


        <?php
        $title = "Cart";
        ?>
        <!-- Utilisation du contenu bufferisé -->
        <?php Template::render($content, $title); ?>


<?php
    }
}
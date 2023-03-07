<?php
namespace magic;
class Shop{
    private array $data;
    public function __construct(){
        $json = file_get_contents($GLOBALS['PHP_DIR']."data/cards.json") ;
        $this->data = (array) json_decode($json) ;
    }
    public function generateShop(): void{
        foreach ( $this->data as $img ){
            $name = $img->name;
            $image = $img->image_uris->normal;
            $id = $img->id;
//            echo $id."<br> ";
            ?>

              <div class="carte">
                <img alt = "image carte" src=' <?php echo $image?>'/>
                <div class="description-carte">
                    <label class="name-carte" for="id-carte"><?php echo $name ?> </label>
                    <input type="checkbox"  name="<?php echo $id?>" id="id-carte" value="<?php echo $id?>">
                </div>

            </div>

        <?php }

    }



}
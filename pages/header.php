<header class="head">

        <div class="head-left">
            <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>index.php" class="title-head" >Magic Store</a>
                <?php if(isset($_SESSION['login'])): ?>
                    <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/shop.php" type="button" class = "btn-style" id = "btn-shop">Shop</a>

                <?php else : ?>
                    <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/browse.php" type="button" class = "btn-style" id = "btn-browse" >Browse</a>

                <?php endif ?>

        </div>

        <div class="head-right">
            <?php if(isset($_SESSION['login'])): ?>
            <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/cart.php" type="button" class = "btn-style" id = "btn-cart" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                            </svg>
            </a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle btn-style" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['login'] ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li> <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/logout.php" type="button" class = "btn-style drop-btn" id ="btn-logout">logOut</a></li>

                    </ul>
                </div>


            <?php else : ?>
                        <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/login.php" type="button" class = "btn-style" id = "btn-login" >Login</a>

            <?php endif ?>


        </div>
    </div>

</header>


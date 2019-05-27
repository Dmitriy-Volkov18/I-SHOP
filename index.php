<?php
    session_start();
    include("includes/db_connect.php");
    include("includes/product_class.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/index_style.css">
    <link rel="stylesheet" href="media.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8"> 
    <title>Главная страница</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

    <!-- Main container -->
    <div class="main-container">
        <?php include("includes/header.php") ?>

        <!-- Showcase section-->
        <?php
        /*
            if(isset($_SESSION['user_id']))
            {
                echo "<p>You are logged in</p>";
            }
            else
            {
                echo "<p>You are logged out</p>";
            }*/
        ?>

        <div class="showcase_section">
            <?php foreach($showcaseProducts as $showcaseProduct): ?>
                <div class='showcase_header_text'>
                    <h2><a href='product.php?id=<?php echo $showcaseProduct['id'] ?>'><?php echo $showcaseProduct['title'] ?></a></h2>
                </div>

                <div class='showcase_discount_price'>
                    <p><?php echo $showcaseProduct['price'] ?> грн.</p>
                    <p><?php echo $showcaseProduct['old_price'] ?> грн.</p>
                    <div class='line'></div>
                </div>
            <?php endforeach;?>
            <div class="showcase_discount_circle">
                <p>-20%</p>
            </div>
        </div>

        <!-- Offers section -->

        <div class="offers_section">
            <div class="product_block">
                <div class="offer_header">
                    <p>Товар дня</p>
                </div>

                <?php foreach($productsOfDay as $productOfDay): ?>
                    <img src="imgs/<?php echo $productOfDay['image']?>">

                    <div class='offer_text_block'>

                        <a href='product.php?id=<?php echo $productOfDay['id'] ?>'><?php echo $productOfDay['title']?></a>
                        <p><?php echo $productOfDay['price'] ?> грн.</p>
                        <p><?php echo $productOfDay['old_price']?> грн.</p>

                        <div class='offer_line'></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="product_block">
                <div class="offer_header">
                    <p>СПЕЦЦЕНА</p>
                </div>

                <?php foreach($specialPrices as $specialPrice): ?>
                    <img src="imgs/<?php echo $specialPrice['image']?>">

                    <div class='offer_text_block'>

                        <a href='product.php?id=<?php echo $specialPrice['id'] ?>'><?php echo $specialPrice['title']?></a>
                        <p><?php echo $specialPrice['price'] ?> грн.</p>
                        <p><?php echo $specialPrice['old_price']?> грн.</p>

                        <div class='offer_line'></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="product_block">
                <div class="offer_header">
                    <p>БЕСТСЕЛЛЕР</p>
                </div>

                <?php foreach($bestsellersProduct as $bestsellerProduct): ?>
                    <img src="imgs/<?php echo $bestsellerProduct['image']?>">

                    <div class='offer_text_block'>

                        <a href='product.php?id=<?php echo $bestsellerProduct['id'] ?>'><?php echo $bestsellerProduct['title']?></a>
                        <p><?php echo $bestsellerProduct['price'] ?> грн.</p>
                        <p><?php echo $bestsellerProduct['old_price']?> грн.</p>

                        <div class='offer_line'></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Text block -->

        <div class="links_text_block1">
            <ul id="text_items1">
                <li >Новинки</li>
            </ul>
        </div>
        <!-- Product by criteries section -->

        <div class="product_by_criteries_section">
            <?php foreach($newProducts as $newProduct): ?>
                <div class='product_by_criteries'>
                    <div class='img_product'>
                        <a href='product.php?id=<?php echo $newProduct['id'] ?>'><img src="imgs/<?php echo $newProduct["image"]?>"></a>
                    </div>

                    <div class='text_criteries'>
                        <p>Новинка</p>
                    </div>

                    <div class='description'>
                        <p><?php echo $newProduct['mini_description']?></p>
                        <p><?php echo $newProduct['price']?> грн.</p>
                    </div>
                </div>
            <?php endforeach; ?>
            <!--
            <div class="product_by_criteries">
                <div class="img_product">
                    <a href="#"><img src="imgs/iphone.png" alt=""></a>
                </div>

                <div class="text_criteries">
                    <p>Новинка</p>
                </div>

                <div class="description">
                    <p>Оригинальное разблокирована Apple iPhone 6 S 4 г LTE мобильный телефон 2 ГБ Оперативная память 16/64 ГБ Встроенная память 4.7 </p>
                    <p>5000 грн</p>
                </div>
            </div>
        -->
            <!--<p><i class="fas fa-arrow-circle-left"></i></p>
            <p><i class="fas fa-arrow-circle-right"></i></p>-->
        </div>

        <div class="links_text_block2">
            <ul id="text_items2">
                <li >Хиты продаж</li>
            </ul>
        </div>
        <!-- Product by criteries section -->

        <div class="product_by_criteries_bestselllers_section">
            <?php foreach($bestsellerProductsFive as $bestsellerProductFive): ?>
                <div class='product_by_criteries'>
                    <div class='img_product'>
                        <a href='product.php?id=<?php echo $bestsellerProductFive['id'] ?>'><img src="imgs/<?php echo $bestsellerProductFive["image"]?>"></a>
                    </div>

                    <div class='text_criteries1'>
                        <p>Хит</p>
                    </div>

                    <div class='description'>
                        <p><?php echo $bestsellerProductFive['mini_description']?></p>
                        <p><?php echo $bestsellerProductFive['price']?> грн.</p>
                    </div>
                </div>
            <?php endforeach; ?>

            <!--<p><i class="fas fa-arrow-circle-left"></i></p>
            <p><i class="fas fa-arrow-circle-right"></i></p>-->
        </div>

        <div class="links_text_block3">
            <ul id="text_items3">
                <li >Распродажа</li>
            </ul>
        </div>
        <!-- Product by criteries section -->

        <div class="product_by_criteries_sellout_section">
        <?php foreach($selloutProducts as $selloutProduct): ?>
                <div class='product_by_criteries'>
                    <div class='img_product'>
                        <a href='product.php?id=<?php echo $selloutProduct['id'] ?>'><img src="imgs/<?php echo $selloutProduct["image"]?>"></a>
                    </div>

                    <div class='text_criteries2'>
                        <p>Распродажа</p>
                    </div>

                    <div class='description'>
                        <p><?php echo $selloutProduct['mini_description']?></p>
                        <p><?php echo $selloutProduct['price']?> грн.</p>
                    </div>
                </div>
            <?php endforeach; ?>

            <!--<p><i class="fas fa-arrow-circle-left"></i></p>
            <p><i class="fas fa-arrow-circle-right"></i></p>-->
        </div>
        
        <!-- Discount laptop section -->

        <div class="discount_laptop_section">
            <div class="green_block">
                <p>Скидки на ноутбуки Acer</p>
                <h1>-50%</h1>

                <div class="laptop_img_block">
                    <img src="imgs/front_laptop.png" alt="">
                    <img src="imgs/back_laptop.png" alt="">
                </div>
            </div>
            
            <div class="blue_block">
                <p>Скидки на ноутбуки Acer</p>
                <h1>-50%</h1>

                <div class="laptop_img_block">
                    <img src="imgs/front_laptop.png" alt="">
                    <img src="imgs/back_laptop.png" alt="">
                </div>
            </div>
        </div>

        <!-- About section -->

        <div class="about_header_section">
            <p>О магазине</p>
        </div>

        <div class="about_description">
            <p>
                Наш магазин позволяет пользователям онлайн, в своём браузере или через мобильное приложение, сформировать заказ на покупку, выбрать способ оплаты и доставки заказа, оплатить заказ. При этом продажа товаров осуществляется дистанционным способом и она накладывает ограничения на продаваемые товары. Так, в некоторых странах имеется запрет на интернет-торговлю алкоголем, оружием, ювелирными изделиями и другими товарами.
                Предоставленная цифровым пространством возможность любому человеку в любой точке земного шара найти и купить любой товар стирает границы территорий, нивелирует национальную самобытность, размывает все возможные барьеры, так или иначе противопоставляющие одних людей другим, в чем бы это ни выражалось — будь то языковые, религиозные, расовые разграничения, предубеждения или неприязнь между народами
            </p>
        </div>

        <!-- Quality section -->

        <div class="quality_section">
            <div class="quality">
                <p><i class="fas fa-shopping-bag"></i></p>
                <p>Товары по оптовым ценам</p>
            </div>

            <div class="quality">
                <p><i class="fas fa-handshake"></i></p>
                <p>Обмен и возврат в течение 14 дней</p>
            </div>

            <div class="quality">
                <p><i class="fas fa-mobile-alt"></i></p>
                <p>Мобильная версия магазина</p>
            </div>

            <div class="quality">
                <p><i class="fas fa-gem"></i></p>
                <p>Гарантия качества</p>
            </div>

            <div class="quality">
                <p><i class="fas fa-globe-europe"></i></p>
                <p>Доставка в более чем 20 стран</p>
            </div>
        </div>

            <!-- Footer section -->
        <?php include("includes/footer.php") ?> 
    </div>

    <!-- end of main container -->
    

    <script src="js/script.js"></script>
    <script>
        const fa_user_plus = document.querySelector(".fa-user-plus");
        const bg_signup_container = document.querySelector(".bg_signup_container");
        const login_close_btn = document.querySelector(".login_close_btn");
        const signup_close_btn = document.querySelector(".signup_close_btn");   

        window.onclick = function(event) 
        {
            if (event.target == bg_signup_container) 
            {
                bg_signup_container.style.display = "none";
            }
        }

        fa_user_plus.onclick = function()
        {
            bg_signup_container.style.display = "block";
        }

        login_close_btn.onclick = function() 
        {
            bg_signup_container.style.display = "none";
        }

        signup_close_btn.onclick = function() 
        {
            bg_signup_container.style.display = "none";
        }

        const login_link_block = document.querySelector("#login_link_block");
        const signup_link_block = document.querySelector("#signup_link_block");
        const signup_link = document.querySelector(".signup_link");
        const login_link = document.querySelector(".login_link");
        const login_block = document.querySelector(".login_block");
        const signup_block = document.querySelector(".signup_block");
        const signup_container = document.querySelector(".signup_container");

        login_link_block.onclick = function()
        {
            login_block.style.display = "block";
            signup_block.style.display = "none"; 
            signup_container.style.height = 50+"%";
        }

        signup_link_block.onclick = function()
        {
            login_block.style.display = "none";
            signup_block.style.display = "block";
            signup_container.style.height = 60+"%";
        }

        login_link.onclick = function()
        {
            login_block.style.display = "block";
            signup_block.style.display = "none"; 
            signup_container.style.height = 50+"%";
        }

        signup_link.onclick = function()
        {
            login_block.style.display = "none";
            signup_block.style.display = "block";
            signup_container.style.height = 60+"%";
        }
    </script>
</body>
</html>
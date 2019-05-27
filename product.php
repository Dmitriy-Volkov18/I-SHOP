<?php
    session_start();
    include("includes/db_connect.php");
    include("includes/product_class.php");

    $product_by_ids = $product->getById($_GET['id']);

    if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['shop_cart']))
        {
            $item_array_id = array_column($_SESSION['shop_cart'], "item_id");
            if(!in_array($_GET['id'], $item_array_id))
            {
                $count = count($_SESSION['shop_cart']);

                $item_array = array
                (
                    'item_id' => $_GET['id'],
                    'item_title' => $_POST['hidden_title'],
                    'item_image' => $_POST['hidden_image'],
                    'item_price' => $_POST['hidden_price'],
                    'item_quantity' => $_POST['quantity']
                );

                $_SESSION['shop_cart'][$count] = $item_array;
            }
            else
            {
                //echo "<script>alert('item already added')</script>";
            }
        }
        else
        {
            $item_array = array
            (
                'item_id' => $_GET['id'],
                'item_title' => $_POST['hidden_title'],
                'item_image' => $_POST['hidden_image'],
                'item_price' => $_POST['hidden_price'],
                'item_quantity' => $_POST['quantity']
            );

            $_SESSION['shop_cart'][0] = $item_array;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/product_style.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Товар</title>
</head>
<body>
</div>
    <!-- Main container -->
    <div class="main-container">
        <?php include("includes/header.php") ?>

        <!-- Img section -->
        <?php foreach($product_by_ids as $product_by_id): ?>
            <div class="product_img_container">
                <div class="img_block">
                    <img src="imgs/<?php echo $product_by_id['image']?>">
                </div>
                <?php 
                    if($product_by_id['new'] == 1):
                        echo '<div class="product_criterie1">';
                            echo '<p>Новинка</p>';
                        echo '</div>';
                    elseif($product_by_id['bestseller'] == 1):
                        echo '<div class="product_criterie1">';
                            echo '<p>Хит</p>';
                        echo '</div>';
                    else:
                        echo '<div class="product_criterie3">';
                            echo '<p>Распродажа</p>';
                        echo '</div>';
                    endif; 
                ?>
            </div>
        <?php endforeach; ?>

        <!-- Short description about product section -->
        <form action="product.php?action=add&id=<?php echo $_GET['id']?>" method="post">
            <?php foreach($product_by_ids as $product_by_id): ?>
                <div class="short_description_section">
                    <div class="description_container">
                        <p class="title"><?php echo $product_by_id['title']?></p>
                        <p class="little_description"><?php echo $product_by_id['mini_description']?></p>
                        <p class="availability"><i class="fas fa-check-circle"></i>В наличии</p>
                        <p class="price_text">Цена:</p>
                        <p class="price_num"><?php echo $product_by_id['price']?> грн.</p>
                        <?php
                            if($product_by_id['old_price'] != 0):?>
                                <p class="old_price_text">Старая цена:</p>
                                <p class="old_num"><?php echo $product_by_id["old_price"]; ?> грн.</p>
                        <?php endif; ?>
                        
                        <input type="hidden" name="hidden_title" value="<?php echo $product_by_id['title']?>"></p>
                        <input type="hidden" name="hidden_price" value="<?php echo $product_by_id['price']?> грн."></p>
                        <input type="hidden" name="hidden_image" value="<?php echo $product_by_id['image']?>"></p>

                        <input type="text" name="quantity" value="1" id="quantity_input"></p>
                        <input type="submit" name="add_to_cart" value="В корзину" id="submit_input">
                    </div>
                </div>
            <?php endforeach; ?>
        </form>

        <!-- Feature and full description section -->

        <div class="feature_and_full_description_section">
            <ul class="headers_block">
                <li id="click_li_link1" class="active">Доставка</li>
                <li id="click_li_link2">Характеристики</li>
                <li id="click_li_link3">Описание</li>
            </ul>
            <?php foreach($product_by_ids as $product_by_id): ?>
                <div id="delivery_text">
                    <p>Доставка по всей Украине</p>
                </div>

                <div id="feature_text">
                    <ul>
                        <li>Категория:<span><?php echo $product_by_id['category_title']?></span></li>
                        <li>Модель:<span><?php echo $product_by_id['type_product_title']?></span></li>
                        <li>Цвет:<span><?php echo $product_by_id['color']?></span></li>
                    </ul>
                </div>

                <div id="description_text">
                    <p><?php echo $product_by_id['description']?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Payment and guarantee section -->

        <div class="payment_section">
            <div class="payment_and_guarantee_float_block">
                <div class="payment">
                    <p class="payment_title">Оплата</p>
                    <p class="paymant_description">Наличными; <span>безналичная
                    для юр. лиц с НДС</span>;
                    Visa/ Mastercard; Privat24; Liqpay; Portmone
                    терминалы ПриватБанка
                    </p>
                    <p><i class="far fa-credit-card"></i></p>
                </div>
            </div>

            <div class="payment_and_guarantee_float_block">
                <div class="guarantee">
                    <p class="guarantee_title">Гарантия</p>
                    <p class="guarantee_description">Обмен/возврат <span>неактивированного</span> товара надлежащего качества в течение 14 дней.
                    Официальная гарантия производителя: 12 мес.
                    </p>
                    <p><i class="fas fa-thumbs-up"></i></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end of main container -->
    
    <!-- Footer section -->
    <?php //include("includes/footer.php") ?>


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
    <script src="js/description_show_hide.js"></script>
</body>
</html>
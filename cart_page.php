<?php
    session_start();
    include("includes/db_connect.php");
    include("includes/product_class.php");

    if(isset($_GET['action']))
    {
        if($_GET['action'] == "delete")
        {
            foreach($_SESSION['shop_cart'] as $key => $value)
            {
                if($value['item_id'] == $_GET['id'])
                {
                    unset($_SESSION['shop_cart'][$key]);
                    //echo "<script>alert('item removed')</script>";
                }
            }
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
    <link rel="stylesheet" href="css/cart_page_style.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8"> 
    <title>Корзина</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

    <!-- Main container -->
    <div class="main-container">
        <?php include("includes/header.php") ?>

        <!-- Cart section-->
    <div class="cart_section">
        <div class="cart_headings">
            <ul>
                <li>Товары</li>
                <li>Удалить</li>
                <li>Сумма</li>
                <li>Цена</li>
                <li>Кол-во</li>
            </ul>
        </div>

        <?php 
            if(!empty($_SESSION['shop_cart'])){
            
                $total = 0;

                foreach($_SESSION['shop_cart'] as $key => $value){
        ?>
                    <div class="cart_product_container">
                        <div class="cart_product">
                            <a href="product.php?id=<?php echo $value['item_id']?>"><img src="imgs/<?php echo $value['item_image']?>"></a>
                            <p class="cart_product_title"><?php echo $value['item_title']?></p>
                        </div>

                        <div class="cart_right_values">
                            <ul>
                                <li><?php echo $value['item_quantity']?></li>
                                <li><?php echo $value['item_price']?></li>

                                <?php
                                    $total = (int)($value['item_quantity'] * (int)$value['item_price']);
                                ?>
                                <li><?php echo number_format($total, 2); ?> грн.</li>
                                <li><a href="cart_page.php?id=<?php echo $value['item_id']?>&action=delete"> &times;</a></li>
                            </ul>
                        </div>
                    </div>
        <?php 
            }
                }
                else
                {
                    echo '<p class="cart_empty">Ваша корзина пока пуста.</p>';
                }
        ?>

        <?php 
            $count_product = count($_SESSION['shop_cart']);
        ?>

        <div class="general_info">
            <p class="count_product">Количество товаров: <span><?php echo $count_product; ?></span></p>

            <?php
            $sum = 0;
            $sum_all_products = 0;

                foreach($_SESSION['shop_cart'] as $key => $value)
                {
                    $sum = (int)$value['item_price'];
                    $sum_all_products += $sum;
            ?>

            <?php 
                }
            ?>

            <p class="sum_order">Сумма заказа: <span><?php echo number_format($sum_all_products, 2); ?> грн.</span></p>

            <p class="continue_shop"><a href="index.php">Продолжить покупки</a></p>
            <p class="make_order"><a href="#">Оформить заказ</a></p>
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
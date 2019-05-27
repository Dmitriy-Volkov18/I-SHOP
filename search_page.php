<?php 
    session_start();
    include("includes/db_connect.php");
    include("includes/product_class.php");
    include("includes/functions.php");
    include("includes/pagination.php");

    $search_results = "";
    $sortType = "";
    $additionalSql = "";
    $search = "";

    if(isset($_POST['cheaper_price_btn']))
    {
        $sortType = "price ASC";
    }
    elseif(isset($_POST['expensive_price_btn']))
    {
        $sortType = "price DESC";
    }
    elseif(isset($_POST['name_btn']))
    {
        $sortType = "title ASC";
    }
    else
    {
        $sortType = "id ASC";
    }

    if(isset($_POST['Find']))
    {
        /*$priceFrom = (int)$_POST['priceFrom'];
        $priceTo = (int)$_POST['priceTo'];*/

        if(isset($_POST['criteries']))
        {
            if(!empty($_POST['criteries']))
            {
                /*$check_critery = implode(",", $_POST['criteries']);
                if($check_critery[0] == "news_items" && $check_critery[1] = "bestsellers_items" && $check_critery[2] = "sellout_items")
                    $additionalSql .= " AND new = 1 AND bestseller = 1 AND sellout = 1";*/

                if(!empty($_POST['criteries']))
                {
                    foreach($_POST['criteries'] as $critery)
                    {
                        if($critery == "news_items") $additionalSql .= " AND new = 1";
                        if($critery == "bestsellers_items") $additionalSql .= " AND bestseller = 1";
                        if($critery == "sellout_items") $additionalSql .= " AND sellout = 1";
                    }
                }
            }
        }

        /*if(!empty($priceTo))
        {
            $priceRange = " AND price BETWEEN $priceFrom AND $priceTo";
        }*/
    }

    if(!empty($_POST['q']))
    {
        $search = check_input($_POST['q']);
        /*if(empty($search))
        {
            echo "empty";
        }
        else
            echo $search;*/
    
        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
        $items_per_page = 8;
    
        $items_total_count = $product->getCountOfProductBySearch($search);
    
        $paginate = new Paginate($page,  $items_per_page, $items_total_count);
        $offset = $paginate->offset();
    
        $search_results = $product->searchProduct($search, $additionalSql, $sortType, $items_per_page, $offset);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/choose_product_style.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Выбрать товар</title>
</head>
<body>
    <!-- Main container -->
    <div class="main-container">
        <?php include("includes/header.php") ?>

        <!-- Title and sorting section -->

<?php
if(strlen($search) >=3 && strlen($search) <= 25)
{
    ?>

        <div class="sorting">
            <ul>
                <li>Сортировка:</li>
                <form action="" method="post">
                    <li><input type="submit" name="cheaper_price_btn" value="сначало дешевле"></input></li>
                    <li><input type="submit" name="expensive_price_btn" value="сначало дороже"></input></li>
                    <li><input type="submit" name="name_btn" value="по названию"></input></li>
                </form>
                <!--
                <li><a href="choose_product.php?sort=asc">сначало дешевле</a></li>
                <li><a href="choose_product.php?sort=desc">сначало дороже</a></li>
                <li><a href="choose_product.php?sort=name">по названию</a></li>
                -->
            </ul>
        </div>


        <!-- Filter options section -->
        <div class="filter_options_section">
            <form action="" method="post">
                <ul class="criteries">
                    <li><input type="checkbox" name="criteries[]" value="news_items">  Новинки</li>
                    <li><input type="checkbox" name="criteries[]" value="bestsellers_items">  Хиты продаж</li>
                    <li><input type="checkbox" name="criteries[]" value="sellout_items">  Распродажа</li>
                </ul>
<!--
                <p>Бренд</p>

                <ul class="brands">
                    <li><input type="checkbox" name="" id="">  бренд</li>
                    <li><input type="checkbox" name="" id="">  бренд</li>
                    <li><input type="checkbox" name="" id="">  бренд</li>
                </ul>

                <p>Цена, грн</p>

                <ul class="range_price">
                    <li><input type="text" name="priceFrom" value="0"></li>
                    <li>-</li>
                    <li><input type="text" name="priceTo" value="10 000"></li>
                </ul>
-->
                <input type="submit" name="Find" value="Найти">
            </form>
        </div>
    
        <!-- Content -->
        <div class="product_by_criteries_section">
            <?php if(isset($search_results)){ ?>
                <?php foreach($search_results as $search_result): ?>
                    <div class="product_by_criteries">
                        
                        <div class="img_product">
                            <a href="product.php?id=<?php echo $search_result['id'] ?>"><img src="imgs/<?php echo $search_result['image'] ?>"></a>
                        </div>
                        
                        <?php 
                            if($search_result['new'] == 1):
                                echo '<div class="text_criteries1">';
                                    echo '<p>Новинка</p>';
                                echo '</div>';
                            elseif($search_result['bestseller'] == 1):
                                echo '<div class="text_criteries2">';
                                    echo '<p>Хит</p>';
                                echo '</div>';
                            else:
                                echo '<div class="text_criteries3">';
                                    echo '<p>Распродажа</p>';
                                echo '</div>';
                            endif; 
                        ?>
                        <div class="description">
                            <p><?php echo $search_result['mini_description'] ?></p>
                            <p><?php echo $search_result['price'] ?> грн.</p>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php }
            else
            {
                echo "<p>Товаров не найдено</p>";
            }?>
        </div>

        <div class="pagination">
            <ul>
            <?php
                if($paginate->has_previous())
                    echo "<li><a href='search_page.php?page={$paginate->previous()}'>Назад</a></li>";
                
                for($i = 1; $i <= $paginate->page_total(); $i++)
                {
                        if($i == $paginate->current_page)
                        {
                            echo "<li class='active'><a href='search_page.php?page={$i}'>{$i}</a></li>";
                        }
                        else
                        {
                            echo "<li><a href='search_page.php?page={$i}'>{$i}</a></li>";
                        }
                }
                if($paginate->has_next())
                    echo "<li><a href='search_page.php?page={$paginate->next()}'>Вперёд</a></li>";    
            ?>   
            </ul>
        </div>

<?php }
else
{
    echo "<p>Значение должно быть от 3 до 25 символов</p>";
}
    ?>

        <!-- Footer section -->
        <?php include("includes/footer.php") ?> 
    </div>

    <!-- end of main container -->

    <script src="js/script.js"></script>
    <script>
        const cart_container = document.querySelector(".cart-container");
        const bg_cart_section = document.querySelector(".bg_cart_section");
        const close_btn = document.querySelector(".close_btn");

        const fa_user_plus = document.querySelector(".fa-user-plus");
        const bg_signup_container = document.querySelector(".bg_signup_container");
        const login_close_btn = document.querySelector(".login_close_btn");
        const signup_close_btn = document.querySelector(".signup_close_btn");

        cart_container.onclick = function()
        {
            bg_cart_section.style.display = "block";
        }

        window.onclick = function(event) 
        {
            if (event.target == bg_cart_section) 
            {
                bg_cart_section.style.display = "none";
            }

            if (event.target == bg_signup_container) 
            {
                bg_signup_container.style.display = "none";
            }
        }

        close_btn.onclick = function() 
        {
            bg_cart_section.style.display = "none";
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
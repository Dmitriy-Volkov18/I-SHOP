<?php 
    $bestsellersProduct = $product->getBestsellerProduct();
    $productsOfDay = $product->getProductOfDay();
    $specialPrices = $product->getSpecialPrice();
    $showcaseProducts = $product->getShowcaseProduct();
    $newProducts = $product->getNewProduct();
    $bestsellerProductsFive = $product->getBestSellersProductFive();
    $selloutProducts = $product->getSelloutProducts();

    $count_product = 0;

    if(isset($_SESSION['shop_cart']))
        $count_product = count($_SESSION['shop_cart']);
?>

<!-- Top header section -->
<div class="top-header">
    <h2>Feng<span>Chang</span></h2>
    <p id="number_phone"><i class="fas fa-phone"></i>044 232-22-91  <i class="fas fa-phone"></i>067 208-08-38   <i class="fas fa-phone"></i>095 208-08-38</p>

    <form action="search_page.php?page=1" method="post">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Поиск товаров" id="search" name="q">
        <input type="submit" value="Поиск" id="find_product_btn">
    </form>

    <div class="time_working">
        <p>График работы:</p>
        <p><span>Будние:</span> 10:00–19:00</p>
        <p><span>Сб:</span> 12:00–18:00</p>
    </div>  

    <?php
        if(isset($_SESSION['user_id']))
        {
            echo '<form action="logout.php" method="post">
                    <input type="submit" name="logout_btn" id="logout_btn" value="Выйти">
                  </form>';
        }
        else
        {
            echo '<a href="#"><i class="fas fa-user-plus"></i></a>';
        }
    ?>
</div>

<!-- Header section -->
<div class="navbar">
    <div class="catalog">
        <ul class="catalog_hover">
            <li><a href="#">Каталог <i class="fas fa-arrow-alt-circle-down"></i></a></li>
        </ul>
    </div>

    <div class="nav-header">
        <ul>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Оплата и доставка</a></li>
            <li><a href="#">Обмен и возврат</a></li>
            <li><a href="#">Контактная информация</a></li>
            <li><a href="#">Блог</a></li>
        </ul>

        <div class="cart-container">
            <a href="cart_page.php"><i class="fas fa-shopping-cart"></i></a>
            <div class="count-items">
                <p><?php echo $count_product; ?></p>
            </div>
        </div>  
    </div>
</div>

<!-- Choose category section-->

<div class="choose_catalog">
    <ul class="main_drop_menu">
        <li class='menu_list'><a href='choose_product.php?category=Электроника'>Электроника</a>
            <ul class='child_drop_menu'>
                <li class='product'><a href='choose_product.php?category=Электроника&type_product_title=Iphone'>Iphone</a>
                    <ul class='second_child_drop_menu'>
                    <li><a href='choose_product.php?category=Электроника&type_product_title=Iphone&concrete_type_product=Iphone6'>Iphone 6</a></li>
                    <li><a href='choose_product.php?category=Электроника&type_product_title=Iphone&concrete_type_product=Iphone7+'>Iphone +</a></li>
                    <li><a href='choose_product.php?category=Электроника&type_product_title=Iphone&concrete_type_product=Iphone7'>Iphone 7</a></li>
                    </ul>
                </li>
                <li class='product'><a href='choose_product.php?category=Электроника&type_product_title=Ipad'>Ipad</a>
                    <ul class='second_child_drop_menu'>
                        <li><a href='choose_product.php?category=Электроника&type_product_title=Ipad&concrete_type_product=IpadAir'>Ipad Air</a></li>
                        <li><a href='choose_product.php?category=Электроника&type_product_title=Ipad&concrete_type_product=IpadPro'>Ipad Pro</a></li>
                    </ul>
                </li>          
            </ul>
        </li>

        <li class="menu_list"><a href="choose_product.php?category=Бытовая Техника">Бытовая техника</a>
            <ul class="child_drop_menu">
                <li class="product"><a href="choose_product.php?category=Бытовая Техника&type_product_title=Крупная Бытовая Техника">Крупная бытовая техника</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="choose_product.php?category=Бытовая Техника&type_product_title=Крупная Бытовая Техника&concrete_type_product=Холодильник">Холодильники</a></li>
                        <li><a href="choose_product.php?category=Бытовая Техника&type_product_title=Крупная Бытовая Техника&concrete_type_product=Стиральная Машинка">Стиральные машинки</a></li>
                        <li><a href="choose_product.php?category=Бытовая Техника&type_product_title=Крупная Бытовая Техника&concrete_type_product=Посудомойка">Посудомойки</a></li>
                        <li><a href="choose_product.php?category=Бытовая Техника&type_product_title=Крупная Бытовая Техника&concrete_type_product=Микроволновка">Микроволновки</a></li>
                        <li><a href="#">Духовки</a></li>
                        <li><a href="#">Мультиварки</a></li>
                        <li><a href="#">Пылесосы</a></li>
                    </ul>
                </li>
                <li class="product"><a href="#">Мелкая бытовая техника</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="choose_product.php?category=Бытовая Техника&type_product_title=Мелкая Бытовая Техника&concrete_type_product=Кофеварка">Кофеварки</a></li>
                        <li><a href="choose_product.php?category=Бытовая Техника&type_product_title=Мелкая Бытовая Техника&concrete_type_product=Блендер">Блендеры</a></li>
                        <li><a href="choose_product.php?category=Бытовая Техника&type_product_title=Мелкая Бытовая Техника&concrete_type_product=Электрочайник">Электрочайники</a></li>
                        <li><a href="choose_product.php?category=Бытовая Техника&type_product_title=Мелкая Бытовая Техника&concrete_type_product=Утюг">Утюги</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu_list"><a href="choose_product.php?category=Одежда">Одежда</a>
            <ul class="child_drop_menu">
                <li class="product"><a href="choose_product.php?category=Одежда&type_product_title=Одежда Для Мужчин">Одежда для мужчин</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="choose_product.php?category=Одежда&type_product_title=Одежда Для Мужчин&concrete_type_product=Свитер">Свитеры</a></li>
                        <li><a href="choose_product.php?category=Одежда&type_product_title=Одежда Для Мужчин&concrete_type_product=Рубашка">Рубашки</a></li>
                        <li><a href="choose_product.php?category=Одежда&type_product_title=Одежда Для Мужчин&concrete_type_product=Футболка">Футболки</a></li>
                        <li><a href="#">Брюки</a></li>
                        <li><a href="#">Джинсы</a></li>
                        <li><a href="#">Носки</a></li>
                        <li><a href="#">Куртки</a></li>
                        <li><a href="#">Толстовки</a></li>
                        <li><a href="#">Нижнее бельё</a></li>
                    </ul>
                </li>
                <li class="product"><a href="choose_product.php?category=Одежда&type_product_title=Одежда Для Женщин">Одежда для женщин</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="choose_product.php?category=Одежда&type_product_title=Одежда Для Женщин&concrete_type_product=Свитер">Свитеры</a></li>
                        <li><a href="choose_product.php?category=Одежда&type_product_title=Одежда Для Женщин&concrete_type_product=Футболка">Футболки</a></li>
                        <li><a href="#">Джинсы</a></li>
                        <li><a href="#">Куртки</a></li>
                        <li><a href="choose_product.php?category=Одежда&type_product_title=Одежда Для Женщин&concrete_type_product=Платье">Платья</a></li>
                        <li><a href="#">Юбки</a></li>
                        <li><a href="#">Нижнее бельё</a></li>
                    </ul>
                </li>
                <li class="product"><a href="#">Одежда для детей</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="#">Футболки</a></li>
                        <li><a href="#">Брюки и штаны</a></li>
                        <li><a href="#">Аксессуары</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu_list"><a href="choose_product.php?category=Для Детей">Для детей</a>
            <ul class="child_drop_menu">
                <li class="product"><a href="choose_product.php?category=Для Детей&type_product_title=Подгузники">Подгузники</a></li>
                <li class="product"><a href="choose_product.php?category=Для Детей&type_product_title=Кроватки">Кроватки</a> </li>
                <li class="product"><a href="choose_product.php?category=Для Детей&type_product_title=Детские Игрушки">Детские игрушки</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="choose_product.php?category=Для Детей&type_product_title=Детские Игрушки&concrete_type_product=Радиоуправляемые Игрушки">Радиуправляемые игрушки</a></li>
                        <li><a href="#">Мягкие игрушки</a></li>
                        <li><a href="#">Куклы</a></li>
                        <li><a href="#">Машинки</a></li>
                    </ul>
                </li>
                <li class="product"><a href="#">Коляски</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="#">Коляски для двойни</a></li>
                        <li><a href="#">Коляски тройники</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu_list"><a href="choose_product.php?category=Сумки и Обувь">Сумки и обувь</a>
            <ul class="child_drop_menu">
                <li class="product"><a href="choose_product.php?category=Сумки и Обувь&type_product_title=Женские Сумки">Женские сумки</a></li>
                <li class="product"><a href="choose_product.php?category=Сумки и Обувь&type_product_title=Мужские Сумки">Мужские сумки</a></li>
                <li class="product"><a href="#">Женская обувь</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="#">Сапоги и ботинки</a></li>
                        <li><a href="#">Туфли</a></li>
                        <li><a href="#">Тапочки</a></li>
                        <li><a href="#">Аксессуары</a></li>
                    </ul>
                </li>
                <li class="product"><a href="#">Мужская обувь</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="#">Кроссовки</a></li>
                        <li><a href="#">Кеды</a></li>
                        <li><a href="#">Туфли</a></li>
                        <li><a href="#">Ботинки</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu_list"><a href="#">Для дома</a>
            <ul class="child_drop_menu">
                <li class="product"><a href="#">Подушки и т.д.</a>
                    <ul class="second_child_drop_menu">
                        <li><a href="#">Подушки</a></li>
                        <li><a href="#">Полотенце</a></li>
                        <li><a href="#">Шторы</a></li>
                        <li><a href="#">Постельное бельё</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>  
</div>

<!-- Login/SignUp section -->

<div class="bg_signup_container">
    <div class="signup_container">
        <div class="signup_links">
            <ul>
                <li id="login_link_block">Вход</li>
                <li id="signup_link_block">Регистрация</li>
            </ul>
        </div>

        <div class="login_block">
            <p class="login_title">Вход в аккаунт</p>
            <span class="login_close_btn">&times;</span>
            <p class="no_account_title">Нет аккаунта?<span class="signup_link">Зарегистрируйтесь</span></p>

            <form action="login.php" method="post">
                <input type="text" name="log_email_username" id="email_input" placeholder="Введите Email/Имя">
                <input type="password" name="log_password" id="password_input" placeholder="Введите пароль">
                <input type="checkbox" checked="checked" name="remember"> Remember me<br>
                <input type="submit" name="login_btn" value="Войти">
                <a href="#">Забыл пароль?</a>
            </form>
        </div>

        <div class="signup_block">
            <p class="signup_title">Новый пользователь</p>
            <span class="signup_close_btn">&times;</span>
            <p class="have_account_title">Уже есть аккаунт?<span class="login_link">Войдите</span></p>

            <form action="signup.php" method="post">
                <input type="text" name="username" id="name_input" placeholder="Введите Имя">
                <input type="text" name="email" id="email_input" placeholder="Введите email">
                <input type="password" name="password" id="password_input" placeholder="Введите пароль">
                <input type="password" name="reppassword" id="rep_password" placeholder="Повторите пароль">
                <input type="submit" name="sign_in_btn" value="Зарегистрироваться">
            </form>
        </div>

        
    </div>
</div>
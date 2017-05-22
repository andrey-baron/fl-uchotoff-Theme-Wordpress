<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/main.min.css?v=1">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <script src="/wp-content/themes/uchotoffThemes/js/main.js?v=1"></script>
    <meta charset="utf-8" />
    <? wp_head()?>
</head>
<body>
<header class="header">
    <!-- ШАПКА -->
    <div class="content_wrapper">
        <a class='header__logo' href="/"></a>
        <button class="header__button header__button--calculator">
            Калькулятор
        </button>
        <div class="header__contacts">
            <div class="header__contacts__inner header__contacts__inner--address">
                <? echo get_option( 'firm_address' );?>
            </div>
            <div class="header__contacts__inner header__contacts__inner--time">
                <? echo get_option( 'firm_time' );?>
            </div>
        </div>
        <div class="header__callback">
            <p class="header__callback__phone">
                <a href="tel:+<?
                $str=get_option( 'firm_phone' );
                echo preg_replace('/[^0-9]/', '', $str);
                ?>">
                    <? echo $str;?>
                </a>
            </p>
            <button class="header__button header__button--callback" data-remodal-target="modal-callback">
                Обратный звонок
            </button>
        </div>
    </div>
    <!-- ОСНОВНОЕ МЕНЮ -->
    <nav class="header__nav">

            <?php
            // main navigation menu
            $args = array(
                'theme_location'    => 'primary',
                'container'     => 'div',
                'container_id'      => 'top-navigation-primary',
                'conatiner_class'   => 'content_wrapper',
                'menu_class'        => 'content_wrapper menu main-menu menu-depth-0 menu-even',
                'echo'          => true,
                /*'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',*/
                'depth'         => 10,
                'walker'        => new magomra_walker_nav_menu
            );

            wp_nav_menu( $args);
            ?>

    </nav>
</header>
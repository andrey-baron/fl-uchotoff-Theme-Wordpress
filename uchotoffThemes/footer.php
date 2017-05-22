<? wp_footer();?>
<!-- section Связаться с нами BEGIN -->
<section class="section section--gray section_callback">
    <div class="content_wrapper">
        <h2 class="section__title">Связаться с нами</h2>

    <? echo do_shortcode('[contact-form-7 id="46" title="Контактная форма 1"]');?>
    </div>
</section>
<!-- section Связаться с нами END -->
<!-- footer BEGIN -->
<footer class="section footer">
    <div class="content_wrapper">
        <a class='footer__logo' href="#"></a>
        <div class="footer__contacts">
            <div class="footer__contacts__inner footer__contacts__inner--address">
                <? echo get_option( 'firm_address' );?>
            </div>
            <div class="footer__contacts__inner footer__contacts__inner--time">
                <? echo get_option( 'firm_time' );?>
            </div>
        </div>
        <div class="footer__contacts footer__contacts--fix-size">
            <div class="footer__contacts__inner footer__contacts__inner--phone">
                <a href="tel:+<?
                $str=get_option( 'firm_phone' );
                echo preg_replace('/[^0-9]/', '', $str);
                ?>">
                    <? echo $str;?>
                </a>
            </div>
            <a href="" class="footer__contacts__inner footer__contacts__inner--email">
                <? echo get_option( 'firm_email' );?>
            </a>
        </div>
        <button class="footer__button">
            Калькулятор
        </button>
    </div>
</footer>
<!-- footer END -->
<!-- Модальное окно BEGIN -->
<div class="remodal" data-remodal-id="modal-callback" data-remodal-options="hashTracking: false">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="content_wrapper">
    <? echo do_shortcode('[contact-form-7 id="48" title="Модальная форма"]');?>
    </div>
</div>
<!-- Модальное окно END -->

<?if(is_front_page()){?>
    <script src="/wp-content/themes/uchotoffThemes/js/home-page.js"></script>
<?}?>
<?if(is_category()&&!is_category(2)){?>
    <script src="/wp-content/themes/uchotoffThemes/js/services-page.js"></script>
<?}?>
<?if(is_page(4)){?>
    <script src="/wp-content/themes/uchotoffThemes/js/contacts-page.js"></script>

<?}?>

<?if(is_front_page()){?>
    <link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/home-page.min.css?v=1">

<?}?>
<?if(is_single()|| is_page()|| is_404() || is_date()){?>
    <link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/article-content-page.min.css?v=1">

<?}?>
<?if(is_single()){?>
    <link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/article-content-page.min.css?v=1">
    <link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/services-page.min.css?v=1">
<?}?>
<?if(is_category(6)){?>
    <link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/articles-page.min.css?v=1">

<?}?>

<?if(is_category()&&!is_category(6)){?>
    <link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/services-page.min.css?v=1">
    <script src="/wp-content/themes/uchotoffThemes/js/services-page.js"></script>

<?}?>
<?if(is_page(4)){?>
    <link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/contacts-page.min.css?v=1">

<?}?>

<link rel="stylesheet" href="/wp-content/themes/uchotoffThemes/css/wp_styles.css?v=1">
</body>
</html>







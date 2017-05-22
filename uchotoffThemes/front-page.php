<?php get_header();

$partners=8;
$useful_articles_cat=6;
$home_slider_cat=7;
$home_articles_cat=9;
$services_in_home=10;

$how_we_are_workingID=11;

$advantages_of_workingID=12;
?>

<!--Слайдер-->
<ul class="header__slider">
    <?
    $args=array(
        'numberposts' => -1,
        'category'    => $home_slider_cat,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'post',
        'suppress_filters' => true,
    );
    $home_posts=get_posts($args);
    foreach($home_posts as $post){ setup_postdata($post);
        // формат вывода

        $banner=get_field("post-baner-link");
        $short_text=get_field("short_text");

    ?>
    <li
        class="header__slider__item"
        style="background-image:url(<? echo  (!empty($banner))? "$banner":'/wp-content/themes/uchotoffThemes/img/home-page/slider/slider-0.png'?>)"
    >
        <div class="header__slider__item__inner">
            <div class="content_wrapper">
                <h3 class="header__slider__item__inner__title">
                    <? the_title();?>
                </h3>
                <?if(!empty($short_text)){?>
                <p class="header__slider__item__inner__text"><? echo $short_text?></p>
                <? }?>
                <a href="<? the_permalink()?>" class="header__slider__item__inner__button">
                    Ссыль
                </a>
            </div>
        </div>
    </li>

    <?  } wp_reset_postdata(); // сброс?>
</ul>

<main>
    <!-- section Преимущества работы с нами BEGIN -->
    <section class="section section-1">
        <div class="content_wrapper">
            <h2 class="section__title">Преимущества работы с нами</h2>
            <div class="row">
            <?
            $args=array(
                'numberposts' => -1,
                'category'    => $advantages_of_workingID,
                'orderby'     => 'date',
                'order'       => 'asc',
                'post_type'   => 'post',
                'suppress_filters' => true,
            );
            $advantages_of_working_posts=get_posts($args);

            foreach($advantages_of_working_posts as $post){ setup_postdata($post);
                // формат вывода
                ?>
                <div class="col-md-3 col-sm-6 section-1-item">
                    <img alt="картинка" class="section-1-item__img" src="<? echo get_the_post_thumbnail_url($post);?>" />
                    <h3 class="section-1-item__title">
                        <? the_title()?>
                    </h3>
                </div>
                <?
            } wp_reset_postdata(); // сброс?>

            </div>
        </div>
    </section>
    <!-- section Преимущества работы с нами END -->

    <!-- section Что мы делаем BEGIN -->
    <section class="section section--gray section-2">
        <div class="content_wrapper">
            <h2 class="section__title">Что мы делаем</h2>
            <div class="row">
                <?
                $args=array(
                    'numberposts' => 10,
                    'category'    => $services_in_home,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
                    'suppress_filters' => true,
                );
                $home_posts=get_posts($args);
                foreach($home_posts as $post){ setup_postdata($post);
                // формат вывода?>
                <div class="col-md-3 col-sm-6 section-2__item">
                    <a href='<? the_permalink()?>' class="section-2__item__inner">
                        <div
                            class="section-2__item__icon mask-hoer-png-icons"
                            data-icon-url="<?echo  get_the_post_thumbnail_url($post,"full")?>"
                        ></div>
                        <h3 class="section-2__item__title">
                            <? the_title();?>
                        </h3>
                    </a>
                </div>
                <?} wp_reset_postdata(); // сброс?>
            </div>
        </div>
    </section>    <!-- section Что мы делаем END -->

    <!-- section Доля на аутсорсинге BEGIN -->
    <section class="section section-3">
        <div class="content_wrapper">
            <h2 class="section__title">Доля на аутсорсинге</h2>
            <div class="row">
                <div class="col-md-4 section-3__item__wrapper">
                    <div class="section-3__list__item map-hover-point" data-group-id='1'>
                        1 -
                        <span class="section-3__list__item__title ">США</span>
                        <span class="section-3__list__item__value">92%</span>
                    </div>
                    <div class="section-3__list__item map-hover-point" data-group-id='2'>
                        2 -
                        <span class="section-3__list__item__title">Европа</span>
                        <span class="section-3__list__item__value">86%</span>
                    </div>
                    <div class="section-3__list__item map-hover-point" data-group-id='3'>
                        3 -
                        <span class="section-3__list__item__title">Израиль</span>
                        <span class="section-3__list__item__value">96%</span>
                    </div>
                    <div class="section-3__list__item map-hover-point" data-group-id='4'>
                        4 -
                        <span class="section-3__list__item__title">Россия</span>
                        <span class="section-3__list__item__value">10%</span>
                    </div>
                </div>
                <div class="col-md-8 section-3__item">
                    <div class="section-3__map-wrapper">
                        <div
                            class="section-3__map-wrapper__point map-hover-point"
                            data-group-id='1'
                            style="left: 13%;top: 38%;"
                        >1</div>
                        <div
                            class="section-3__map-wrapper__point map-hover-point"
                            data-group-id='2'
                            style="left: 50%;top: 44%;"
                        >2</div>
                        <div
                            class="section-3__map-wrapper__point map-hover-point"
                            data-group-id='3'
                            style="left: 56%;top: 56%;"
                        >3</div>
                        <div
                            class="section-3__map-wrapper__point map-hover-point"
                            data-group-id='4'
                            style="left: 74%;top: 35%;"
                        >4</div>
                        <img alt="картинка" class="section-3__map" src="/wp-content/themes/uchotoffThemes/img/home-page/map.svg" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section Доля на аутсорсинге END -->

    <!-- section Как мы работаем BEGIN -->
    <section class="section section-4">
        <div class="content_wrapper">
            <?

            $cat_how_we_are_working=get_category($how_we_are_workingID);
            ?>
            <h2 class="section__title"><? print_r($cat_how_we_are_working->name)?></h2>
            <div class='how_we_are_working'>
                <div class="row">
                    <div class="col-md-1"></div>
                    <?
                    $args=array(
                        'numberposts' => 5,
                        'category'    => $how_we_are_workingID,
                        'orderby'     => 'date',
                        'order'       => 'asc',
                        'post_type'   => 'post',
                        'suppress_filters' => true,
                    );
                    $how_we_are_working_posts=get_posts($args);
                    $indx=1;
                    foreach($how_we_are_working_posts as $post){ setup_postdata($post);
                        // формат вывода
                    ?>
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <div class="how_we_are_working__number"><?echo $indx;?></div>
                            <div class="how_we_are_working__text">
                                <? the_title();?>
                            </div>
                        </div>
                        <?
                        $indx++;
                    } wp_reset_postdata(); // сброс?>
                </div>
            </div>
        </div>
    </section>
    <!-- section Как мы работаем END -->

    <!-- section Наши партнеры BEGIN -->
    <section class="section section--gray section-partner">
        <h2 class="section__title">Наши партнеры</h2>
        <div class="content_wrapper">
            <ul class="section-partner__slider">
                <?
                $args=array(
                    'numberposts' => -1,
                    'category'    => $partners,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
                    'suppress_filters' => true,
                );
                $home_posts=get_posts($args);
                foreach($home_posts as $post){ setup_postdata($post);
                // формат вывода

                $banner=get_field("img_partner");

                if (!empty($banner)){

                ?>

                <li class="section-partner__slider__item">
                    <img alt="картинка" src="<?echo $banner; ?>" />
                </li>

                <? }
                } wp_reset_postdata(); // сброс?>
            </ul>
        </div>
    </section>
    <!-- section Наши партнеры END -->

    <!-- section Как мы работаем BEGIN -->
    <section class="section section-text">
        <div class="content_wrapper">

            <?the_content();?>
        </div>
    </section>
    <!-- section Как мы работаем END -->

    <!-- section Полезные статьи BEGIN -->
    <section class="section section_useful_articles">
        <h2 class="section__title">Полезные статьи</h2>
        <div class="content_wrapper">
            <ul class="section_useful_articles__slider">
                <?
                $args=array(
                    'numberposts' => -1,
                    'category'    => $useful_articles_cat,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
                    'suppress_filters' => true,
                );
                $home_articles_posts=get_posts($args);
                foreach($home_articles_posts as $post){ setup_postdata($post);
                ?>
                <li>
                    <div class="section_useful_articles__slider__item"><img alt="картинка" class="section_useful_articles__slider__item__img" src="<? echo get_the_post_thumbnail_url($post);?>" />
                    <div class="section_useful_articles__slider__item__date"><?echo get_the_date();?></div>
                    <div class="section_useful_articles__slider__item__title">
                        <a href="<? the_permalink()?>"><? the_title()?></a>
                    </div>
                        <div class="section_useful_articles__slider__item__text">
                        <? echo wp_strip_all_tags(get_the_content());?>
                    </div>
                    </div>
                </li>
                <?  } wp_reset_postdata(); // сброс?>

            </ul>
        </div>
    </section>
    <!-- section Полезные статьи END -->


</main>
<? get_footer();?>
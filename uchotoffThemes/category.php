<?php get_header();

$useful_articles_cat=6;
$view_buh_cat=12;
$view_uri_cat=11;
?>



    <main class="main main_articles-page">
        <div class="content_wrapper">
            <!-- section BreadCrumbs -->
            <section class="section section_breadcrumbs">

                <?php if ( function_exists('yoast_breadcrumb') )
                {yoast_breadcrumb('<div class="breadcrumbs section-content__title--underline">','</div>');} ?>
            </section>
            <!-- section BreadCrumbs END -->

            <!-- section Категории -->
            <section class="section section_service-categories">
                <h2 class="section-content__title section-content__title--underline"><? single_cat_title();?></h2>
                <div class="service-categories section-content__content">
                    <ul class="service-categories__list">
                        <?
                        $args=array(
                            'numberposts' => -1,
                            'category'    => get_query_var( 'cat' ),
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'post_type'   => 'post',
                            'suppress_filters' => true,
                        );
                        $cat_posts=get_posts($args);
                        foreach($cat_posts as $post){ setup_postdata($post);
                           // print_r($post);?>
                        <li class="service-categories__list__item service-categories__list__item--closed"><a href="<? the_permalink()?>"><? the_title()?></a></li>
                            <? } wp_reset_postdata(); // сброс?>
                    </ul>
                </div>
                <section style="clear:both;"></section>

            </section>
            <!-- section Категории END -->

            <!-- section Сервисы -->
            <section class="section section_service wp_styles__fix-width">
                <h2 class="section_service__title section-content__title section-content__title--underline"><?$title_siteservices=get_field("title_siteservices",'category_' . get_query_var( 'cat' )); echo $title_siteservices;?></h2>
                <div class="service section-content__content">
                    <div class="service__map service__map--visible">
                        <ul class="service__map__list">
                            <?
                            $args=array(
                                'numberposts' => -1,
                                'category'    => get_query_var( 'cat' )==3?$view_buh_cat:(get_query_var( 'cat' )==4?$view_buh_cat:""),
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                                'post_type'   => 'post',
                                'suppress_filters' => true,
                            );
                            $cat_posts=get_posts($args);
                            foreach($cat_posts as $post){ setup_postdata($post);?>
                            <li class="service__map__list__item-wrapper">
                                <a href="<? the_permalink()?>">
                                <div class="service__map__list__item">
                                    <div class="service__map__list__item__preview">
                                        <img alt="картика" class="service__map__list__item__preview__image" src="<? echo get_the_post_thumbnail_url($post);?>">
                                    </div>
                                    <div class="service__map__list__item__title"><? the_title()?></div>
                                </div>
                                </a>
                            </li>
                            <?  } wp_reset_postdata(); // сброс?>
                        </ul>
                        <div style="clear:both;">
                            <? $cur_cat= get_category(get_query_var( 'cat' ));
                            echo $cur_cat->description;
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section Сервисы END -->
            <section style="clear:both;"></section>

            <!-- section Статьи-превью BEGIN -->
            <section class="section section_articles">
                <h2 class="section__title">Полезные статьи</h2>
                <div class="articles section_content__content">
                    <ul class="articles__list">
                    <?
                    $args=array(
                        'numberposts' => -1,
                        'category'    => $useful_articles_cat,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'post_type'   => 'post',
                        'suppress_filters' => true,
                    );
                    $useful_articles_posts=get_posts($args);
                    foreach($useful_articles_posts as $post){ setup_postdata($post);
                        ?>
                        <li class="articles__list__item">
                            <div class="articles__list__item__preview">
                                <img alt="картика" class="articles__list__item__preview__image" src="<? echo get_the_post_thumbnail_url($post);?>">
                            </div>
                            <div class="articles__list__item__wrapper">
                                <time class="articles__list__item__date" pubdate="<?echo get_the_date();?>"><?echo get_the_date();?></time>
                                <h3 class="articles__list__item__title"><a class="articles__list__item__title__link" href="<? the_permalink()?>"><? the_title()?></a></h3>
                                <div class="articles__list__item__content-wrapper">
                                    <article class="articles__list__item__content"> <? echo wp_strip_all_tags(get_the_content());?> </article>
                                </div>
                            </div>
                        </li>
                    <?  } wp_reset_postdata(); // сброс?>

                    </ul>
                </div>
            </section>
            <!-- section Статьи-превью END -->
        </div>
    </main>
<? get_footer()?>
<?php get_header();?>

<main class="main main_articles-page">
    <div class="content_wrapper">
        <!-- section BreadCrumbs -->
        <section class="section section_breadcrumbs">
            <?php if ( function_exists('yoast_breadcrumb') )
            {yoast_breadcrumb('<div class="breadcrumbs section-content__title--underline">','</div>');} ?>
        </section>
        <!-- section BreadCrumbs END -->

        <!-- section Статьи -->
        <section class="section section_articles">
            <h2 class="section-content__title section-content__title--underline">Статьи</h2>
            <div class="articles section-content__content">
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
                <div class="articles__item">
                    <div class="articles__item__preview">
                        <img class="articles__item__preview__image" src="<? echo get_the_post_thumbnail_url($post);?>">
                    </div>
                    <div class="articles__item__wrapper">
                            <div class="articles__item__date"><? echo get_the_date()?></div>
                        <h3 class="articles__item__title"><a class="articles__item__title__link" href="<? the_permalink()?>"><? the_title()?></a></h3>
                        <a href="<? the_permalink()?>"><article class="articles__item__content"><? the_excerpt()?></article></a>
                    </div>
                </div>
                <? } wp_reset_postdata(); // сброс?>

            </div>
        </section>
        <!-- section Статьи END -->

        <!-- section Архив -->
        <section class="section section_articles-archive">
            <h2 class="section-content__title section-content__title--underline">Архив&nbsp;новостей</h2>
            <div class="articles-archive section-content__content">
                <div class="articles-archive__select">
                    <?custom_archive();?>
                </div>
        </section>
        <!-- section Архив END -->

        <section style="clear:both;"></section>
    </div>
</main>

<? get_footer()?>
<?php


get_header(); ?>


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
                <div class="articles section-content__content">


                <?php

                //print_r($wp_query);
                if ( have_posts() ) :

                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        /*    $arrCat=wp_get_post_categories($post->ID);


                        print_r($arrCat);
                        if (($arrCat.in_array(6,$arrCat)))
                        {*/


                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
?>
                        <div class="articles__item">
                            <div class="articles__item__preview">
                                <img alt="картика" class="articles__item__preview__image" src="<? echo get_the_post_thumbnail_url($post);?>">
                            </div>
                            <div class="articles__item__wrapper">
                                    <h3 class="articles__item__title"><a class="articles__item__title__link" href="<? the_permalink()?>"><? the_title()?></a></h3>
                                <a href="<? the_permalink()?>"><article class="articles__item__content"><? the_excerpt()?></article></a>
                            </div>
                        </div>
<?/*}*/
                    endwhile;

                    wp_reset_postdata();endif;?>

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

<?php get_footer();

<?php get_header();?>

    <main class="main main_articles-page">
        <div class="content_wrapper">
            <!-- section BreadCrumbs -->
            <section class="section section_breadcrumbs">
                <?php if ( function_exists('yoast_breadcrumb') )
                {yoast_breadcrumb('<div class="breadcrumbs section-content__title--underline">','</div>');} ?>
            </section>
            <!-- section BreadCrumbs END -->

            <section class="section section_article-content">
                <h2 class="section-content__title section-content__title--underline"><? the_title()?></h2>
                <div class="article-content__wrapper">
                    <?$banner=get_field("single_big_img");
                    if(!empty($banner)){?>
                        <div class="article-content__preview">
                            <img class="article-content__preview__image" src="<? echo $banner?>">
                        </div>
                    <? }?>
                    <article class="article-content__content section-content__content">
                        <? the_content()?>

                    </article>
                </div>
            </section>


            <section style="clear:both;"></section>

        </div>
    </main>
<? get_footer()?>
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
            <h2 class="section-content__title section-content__title--underline">Страница не найдена</h2>
        </section>
        <section style="clear:both;"></section>
    </div>
</main>
<? get_footer()?>

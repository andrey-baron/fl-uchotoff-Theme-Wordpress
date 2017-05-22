<?php get_header();?>

<?


$buhCat=3;
$urCat=4;

$postId=get_the_ID();
$categories_post= wp_get_post_categories($postId);
$category=null;
if (in_array($buhCat,$categories_post)|| in_array($urCat,$categories_post)){
    $category=get_category($categories_post[0]);
}
//print_r($category);

?>
<main class="main main_articles-page">
    <div class="content_wrapper">
        <!-- section BreadCrumbs -->
        <section class="section section_breadcrumbs">
            <?php if ( function_exists('yoast_breadcrumb') )
            {yoast_breadcrumb('<div class="breadcrumbs section-content__title--underline">','</div>');} ?>
        </section>
        <!-- section BreadCrumbs END -->
<?if($category!=null){?>
        <!-- section Категории -->
        <section class="section section_service-categories">
            <h2 class="section-content__title section-content__title--underline"><? echo $category->name?></h2>
            <div class="service-categories section-content__content">
                <ul class="service-categories__list">
                    <?
                    $args=array(
                        'numberposts' => -1,
                        'category'    => $category->term_id,
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
<?}?>

        <!-- section Статьи -->
        <section class="section section_article-content wp_styles__fix-width">
            <h2 class="section-content__title section-content__title--underline"><? the_title()?></h2>

            <div class="article-content__wrapper">
                <?$banner=get_field("single_big_img");
                if(!empty($banner)){?>
                <div class="article-content__preview">
                    <img alt="картинка" class="article-content__preview__image" src="<? echo $banner?>">
                </div>
                <? }?>
                <article class="article-content__content section-content__content">
                    <? the_content()?>

                </article>
            </div>
        </section>
        <!-- section Статьи END -->
            <section style="clear:both;"></section>

    </div>
</main>

<? get_footer()?>

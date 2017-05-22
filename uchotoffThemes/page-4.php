<?php get_header();?>
<main class="main">
    <div class="content_wrapper">
        <!-- section BreadCrumbs -->
        <section class="section section_breadcrumbs">
            <?php if ( function_exists('yoast_breadcrumb') )
            {yoast_breadcrumb('<div class="breadcrumbs section-content__title--underline">','</div>');} ?>
        </section>
        <!-- section BreadCrumbs END -->

        <!-- section Контакты -->
        <section class="section section_contacts">
            <div class="contacts-wrapper">
                <ul class="contacts__list">
                    <li class="contacts__list__item">
                        <h2 class="contacts__list__item__title"><? echo get_option( 'krasnodar_firm_city' )?></h2>
                        <div class="contacts__list__item__wrapper">
                            <div class="contacts__list__item__map" data-map data-map-address="<? echo get_option( 'krasnodar_firm_address' )?>" id="ymaps__krasnodar"></div>
                            <div class="contacts__list__item__content">
                                <div class="contacts__list__item__content__info-wrapper">
                                    <span class="contacts__list__item__content__info contacts__list__item__content__address"><? echo get_option( 'krasnodar_firm_address' )?></span>
                                    <span class="contacts__list__item__content__info contacts__list__item__content__working-time"><? echo get_option( 'krasnodar_firm_time' )?></span>
                                </div>
                                <div class="contacts__list__item__content__info-wrapper">
                                    <span class="contacts__list__item__content__info contacts__list__item__content__phone"><? echo get_option( 'krasnodar_firm_phone' )?></span>
                                    <span class="contacts__list__item__content__info contacts__list__item__content__email"><? echo get_option( 'krasnodar_firm_email' )?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="contacts__list__item">
                        <h2 class="contacts__list__item__title"><? echo get_option( 'saratov_firm_city' )?></h2>
                        <div class="contacts__list__item__wrapper">
                            <div class="contacts__list__item__map" data-map data-map-address="<? echo get_option( 'saratov_firm_address' )?>" id="ymaps__saratov"></div>
                            <div class="contacts__list__item__content">
                                <div class="contacts__list__item__content__info-wrapper">
                                    <span class="contacts__list__item__content__info contacts__list__item__content__address"><? echo get_option( 'saratov_firm_address' )?></span>
                                    <span class="contacts__list__item__content__info contacts__list__item__content__working-time"><? echo get_option( 'saratov_firm_time' )?></span>
                                </div>
                                <div class="contacts__list__item__content__info-wrapper">
                                    <span class="contacts__list__item__content__info contacts__list__item__content__phone"><? echo get_option( 'saratov_firm_phone' )?></span>
                                    <span class="contacts__list__item__content__info contacts__list__item__content__email"><? echo get_option( 'saratov_firm_email' )?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>        <!-- section Контакты END -->

    </div>
</main>
<? get_footer()?>

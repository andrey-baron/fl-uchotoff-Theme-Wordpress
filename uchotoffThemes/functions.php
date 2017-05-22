<?php

if ( ! function_exists( 'uchotoff_setup' ) ) :

    function uchotoff_setup() {

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );


        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 400, 300 );


        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'twentysixteen' ),
            'social'  => __( 'Social Links Menu', 'twentysixteen' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );




    }
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'uchotoff_setup' );



class magomra_walker_nav_menu extends Walker_Nav_Menu {

// add classes to ul sub-menus
    function start_lvl( &$output, $depth,$args = Array() ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'header__nav__item__subnav',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

// add main/sub classes to li's and links
    function start_el( &$output, $item, $depth, $args ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'header__nav__item' : 'header__nav__item__subnav__item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'header__nav__item__subnav__item__link' : 'header__nav__link' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}


// свой класс построения меню:
// И там, где нужно выводим меню так:
function magomra_nav_menu( $menu_id ) {
    // main navigation menu
    $args = array(
        'theme_location'    => 'navigation_menu_primary',
        'container'     => 'div',
        'container_id'      => 'top-navigation-primary',
        'conatiner_class'   => 'top-navigation',
        'menu_class'        => 'menu main-menu menu-depth-0 menu-even',
        'echo'          => true,
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'         => 1,
        'walker'        => new magomra_walker_nav_menu
    );

    // print menu
    wp_nav_menu( $args );
}






function custom_archive(){

global $wpdb;
$limit = 0;
$year_prev = null;
$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,  YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
    ?>
    <ul class="articles-archive__select__list">
    <?
foreach($months as $month) :
    $year_current = $month->year;
    if ($year_current != $year_prev){
        if ($year_prev != null){?>

        <?php } ?>

        <li class="articles-archive__select__item articles-archive__select__button"><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/"><?php echo $month->year; ?></a></li>

    <?php } ?>
    <li class="articles-archive__select__list__item"><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>"><span class="archive-month"><?php echo date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year)) ?></span></a></li>
    <?php $year_prev = $year_current;

if(++$limit >= 18) { break; }

endforeach;
    ?>
        </ul>
<?
}







// ------------------------------------------------------------------
// Вешаем все блоки, поля и опции на хук admin_init
// ------------------------------------------------------------------
//
add_action( 'admin_init', 'eg_settings_api_init' );
function eg_settings_api_init() {
    // Добавляем блок опций на базовую страницу "Чтение"
    add_settings_section(
        'eg_setting_section', // секция
        'Настройка полей сайта',
        'eg_setting_section_callback_function',
        'general' // страница
    );
    add_settings_section(
        'contacts_setting_section', // секция
        'Настройка полей страницы контактов',
        'eg_setting_section_callback_function',
        'general' // страница
    );

    // Добавляем поля опций. Указываем название, описание,

    add_settings_field(
        'firm_address',
        'Адрес фирмы (отображается в шапке сайта)',
        'firm_address_callback_function',
        'general', // страница
        'eg_setting_section' // секция
    );
    add_settings_field(
        'firm_time',
        'Режим работы фирмы (отображается в шапке сайта)',
        'firm_time_callback_function',
        'general', // страница
        'eg_setting_section' // секция
    );
    add_settings_field(
        'firm_phone',
        'Телефон фирмы (отображается в шапке сайта)',
        'firm_phone_callback_function',
        'general', // страница
        'eg_setting_section' // секция
    );
    add_settings_field(
        'firm_email',
        'Email фирмы (отображается в подвале сайта)',
        'firm_email_callback_function',
        'general', // страница
        'eg_setting_section' // секция
    );

    //поля опций для города Краснодар
    add_settings_field(
        'krasnodar_firm_city',
        'Название города',
        'krasnodar_firm_city_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    add_settings_field(
        'krasnodar_firm_address',
        'Адрес фирмы в городе Краснодар',
        'krasnodar_firm_address_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    add_settings_field(
        'krasnodar_firm_time',
        'Режим работы фирмы в городе Краснодар',
        'krasnodar_firm_time_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    add_settings_field(
        'krasnodar_firm_phone',
        'Телефон фирмы в городе Краснодар',
        'krasnodar_firm_phone_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    add_settings_field(
        'krasnodar_firm_email',
        'Email фирмы в городе Краснодар',
        'krasnodar_firm_email_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    //поля опций для города Саратов
    add_settings_field(
        'saratov_firm_city',
        'Название другого города',
        'saratov_firm_city_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    add_settings_field(
        'saratov_firm_address',
        'Адрес фирмы в другом городе',
        'saratov_firm_address_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    add_settings_field(
        'saratov_firm_time',
        'Режим работы фирмы в другом городе',
        'saratov_firm_time_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    add_settings_field(
        'saratov_firm_phone',
        'Телефон фирмы в другом городе',
        'saratov_firm_phone_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    add_settings_field(
        'saratov_firm_email',
        'Email фирмы в другом городе',
        'saratov_firm_email_callback_function',
        'general', // страница
        'contacts_setting_section' // секция
    );
    // Регистрируем опции, чтобы они сохранялись при отправке
    // $_POST параметров и чтобы callback функции опций выводили их значение.
    register_setting( 'general', 'firm_address' );
    register_setting( 'general', 'firm_time' );
    register_setting( 'general', 'firm_phone' );
    register_setting( 'general', 'firm_email' );

    register_setting( 'general', 'krasnodar_firm_city' );
    register_setting( 'general', 'krasnodar_firm_address' );
    register_setting( 'general', 'krasnodar_firm_time' );
    register_setting( 'general', 'krasnodar_firm_phone' );
    register_setting( 'general', 'krasnodar_firm_email' );

    register_setting( 'general', 'saratov_firm_city' );
    register_setting( 'general', 'saratov_firm_address' );
    register_setting( 'general', 'saratov_firm_time' );
    register_setting( 'general', 'saratov_firm_phone' );
    register_setting( 'general', 'saratov_firm_email' );
}

// ------------------------------------------------------------------
// Сallback функция для секции
// ------------------------------------------------------------------
//
// Функция срабатывает в начале секции, если не нужно выводить
// никакой текст или делать что-то еще до того как выводить опции,
// то функцию можно не использовать для этого укажите '' в третьем
// параметре add_settings_section
//
function eg_setting_section_callback_function() {
    echo '<p>Настройка информации</p>';
}

// ------------------------------------------------------------------
// Callback функции выводящие HTML код опций
// ------------------------------------------------------------------
//
// Создаем checkbox и text input теги
//

function firm_address_callback_function() {
    echo '<input 
		name="firm_address"  
		type="text" 
		value="' . get_option( 'firm_address' ) . '" 
		class="regular-text"
	 />';
}
function firm_time_callback_function() {
    echo '<input 
		name="firm_time"  
		type="text" 
		value="' . get_option( 'firm_time' ) . '" 
		class="regular-text"
	 />';
}
function firm_phone_callback_function() {
    echo '<input 
		name="firm_phone"  
		type="text" 
		value="' . get_option( 'firm_phone' ) . '" 
		class="regular-text"
	 />';
}
function firm_email_callback_function() {
    echo '<input 
		name="firm_email"  
		type="text" 
		value="' . get_option( 'firm_email' ) . '" 
		class="regular-text"
	 />';
}

//для краснодара
function krasnodar_firm_city_callback_function() {
    echo '<input 
		name="krasnodar_firm_city"  
		type="text" 
		value="' . get_option( 'krasnodar_firm_city' ) . '" 
		class="regular-text"
	 />';
}
function krasnodar_firm_address_callback_function() {
    echo '<input 
		name="krasnodar_firm_address"  
		type="text" 
		value="' . get_option( 'krasnodar_firm_address' ) . '" 
		class="regular-text"
	 />';
}
function krasnodar_firm_time_callback_function() {
    echo '<input 
		name="krasnodar_firm_time"  
		type="text" 
		value="' . get_option( 'krasnodar_firm_time' ) . '" 
		class="regular-text"
	 />';
}
function krasnodar_firm_phone_callback_function() {
    echo '<input 
		name="krasnodar_firm_phone"  
		type="text" 
		value="' . get_option( 'krasnodar_firm_phone' ) . '" 
		class="regular-text"
	 />';
}
function krasnodar_firm_email_callback_function() {
    echo '<input 
		name="krasnodar_firm_email"  
		type="text" 
		value="' . get_option( 'krasnodar_firm_email' ) . '" 
		class="regular-text"
	 />';
}

//для саратова
function saratov_firm_city_callback_function() {
    echo '<input 
		name="saratov_firm_city"  
		type="text" 
		value="' . get_option( 'saratov_firm_city' ) . '" 
		class="regular-text"
	 />';
}
function saratov_firm_address_callback_function() {
    echo '<input 
		name="saratov_firm_address"  
		type="text" 
		value="' . get_option( 'saratov_firm_address' ) . '" 
		class="regular-text"
	 />';
}
function saratov_firm_time_callback_function() {
    echo '<input 
		name="saratov_firm_time"  
		type="text" 
		value="' . get_option( 'saratov_firm_time' ) . '" 
		class="regular-text"
	 />';
}
function saratov_firm_phone_callback_function() {
    echo '<input 
		name="saratov_firm_phone"  
		type="text" 
		value="' . get_option( 'saratov_firm_phone' ) . '" 
		class="regular-text"
	 />';
}
function saratov_firm_email_callback_function() {
    echo '<input 
		name="saratov_firm_email"  
		type="text" 
		value="' . get_option( 'saratov_firm_email' ) . '" 
		class="regular-text"
	 />';
}

function hidecategory() {
    global $wp_query;
    if ( is_date() ) {
        $wp_query->set('cat','6');
    }
    //return $query;
}
add_filter('pre_get_posts', 'hidecategory');
?>
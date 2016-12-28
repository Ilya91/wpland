<?php
function add_theme_scripts() {
	$options = get_option('sample_theme_options');
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/libs/bootstrap/bootstrap-grid.min.css' );

	wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . '/libs/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'styles', get_template_directory_uri() . '/libs/linea/styles.css' );

	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css');

	wp_enqueue_style( 'animate.min', get_template_directory_uri() . '/libs/animate/animate.min.css');

	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css');

	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');


	wp_enqueue_style( 'purple', get_template_directory_uri() . '/css/skins/' . $options['selectinput'] . '.css');

	wp_enqueue_style( 'media', get_template_directory_uri() . '/css/media.css');

	wp_enqueue_script( 'jquery-2.1.3.min', get_template_directory_uri() . '/libs/jquery/jquery-2.1.3.min.js', array('jquery') );

	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/libs/parallax/parallax.min.js', array(), null, true );

	wp_enqueue_script( 'jquery.magnific-popup', get_template_directory_uri() . '/libs/magnific-popup/jquery.magnific-popup.min.js', array(), null, true );

	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/libs/mixitup/mixitup.min.js', array(), null, true );

	wp_enqueue_script( 'PageScroll2id', get_template_directory_uri() . '/libs/scroll2id/PageScroll2id.min.js', array(), null, true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/libs/waypoints/waypoints.min.js', array(), null, true );

	wp_enqueue_script( 'animate-css', get_template_directory_uri() . '/libs/animate/animate-css.js', array(), null, true );

	wp_enqueue_script( 'jqBootstrapValidation', get_template_directory_uri() . '/libs/jqBootstrapValidation/jqBootstrapValidation.js', array(), null, true );

	wp_enqueue_script( 'common', get_template_directory_uri() . '/js/common.js', array(), null, true );

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

remove_action('wp_head', 'rsd_link');

remove_action('wp_head', 'wlwmanifest_link');

remove_action('wp_head', 'wp_generator');

show_admin_bar(false);

function logo_widget_init(){
	register_sidebar( array(
		'name' => 'Logo SVG',
		'id' => 'logo',
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => "",
		'before_title'  => '<span class="hidden">',
		'after_title'   => "</span>",
	));
}
add_action('widgets_init', 'logo_widget_init');


function social_widget_init(){
	register_sidebar( array(
		'name' => 'Social icons',
		'id' => 'social',
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => "",
		'before_title'  => '',
		'after_title'   => "",
	));
}
add_action('widgets_init', 'social_widget_init');

require_once ( get_stylesheet_directory() . '/theme-options.php' );

function setup_options(){
    add_theme_support('post-thumbnails');

    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat',
    ) );
}
add_action( 'after_setup_theme', 'setup_options' );
add_filter( 'pre_option_link_manager_enabled', '__return_true' );


add_action( 'init', 'true_register_post_type_init' ); // Использовать функцию только внутри хука init

function true_register_post_type_init() {
    $labels = array(
        'name' => 'Портфолио',
        'singular_name' => 'Изображение', // админ панель Добавить->Функцию
        'add_new' => 'Добавить изображение',
        'add_new_item' => 'Добавить новую изображение', // заголовок тега <title>
        'edit_item' => 'Редактировать изображение',
        'new_item' => 'Новая изображение',
        'all_items' => 'Все изображения',
        'view_item' => 'Просмотр изображения на сайте',
        'search_items' => 'Искать изображение',
        'not_found' =>  'Изображений не найдено.',
        'not_found_in_trash' => 'В корзине нет изображений.',
        'menu_name' => 'Портфолио' // ссылка в меню в админке
    );
    $args = array(
        'description' => 'МОИ ПОСЛЕДНИЕ РАБОТЫ',
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-gallery', // иконка в меню
        'menu_position' => 5, // порядок в меню
        'supports' => array( 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','tag')
    );
    register_post_type('portfolio', $args);
}

add_action( 'init', 'create_book_taxonomies', 0 );

// функция, создающая таксономию "Разделы" для постов типа "Товары"

function create_book_taxonomies(){

    // определяем заголовки для 'Разделы'
    $labels = array(
        'name' => _x( 'Разделы', 'taxonomy general name' ),
        'singular_name' => _x( 'Разделы', 'taxonomy singular name' ),
        'search_items' =>  __( 'Искать Разделы' ),
        'popular_items' => __( 'Популярные Разделы' ),
        'all_items' => __( 'Все Разделы' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Править Раздел' ),
        'update_item' => __( 'Обновить Раздел' ),
        'add_new_item' => __( 'Добавить новый Раздел' ),
        'new_item_name' => __( 'Имя нового Раздела' ),
        'separate_items_with_commas' => __( 'Separate writers with commas' ),
        'add_or_remove_items' => __( 'Добавить или удалить Раздел' ),
        'choose_from_most_used' => __( 'Choose from the most used writers' ),
        'menu_name' => __( 'Разделы' ),
    );
// Добавляем древовидную таксономию 'Разделы' (как рубрики), чтобы сделать НЕ девовидную (как метки) значение для 'hierarchical' => false,

    register_taxonomy('portfolio', 'portfolio',array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite' => array( 'slug' => 'portfolio' ),
    ));



    function true_apply_tags_for_pages(){
        add_meta_box( 'tagsdiv-post_tag1', 'Теги', 'post_tags_meta_box', 'page', 'side', 'normal' ); // сначала добавляем метабокс меток
        register_taxonomy_for_object_type('post_tag', 'portfolio'); // затем включаем их поддержку страницами wp
    }

    add_action('admin_init','true_apply_tags_for_pages');
}

function custom_get_categories(){
    $args = array(
        'taxonomy'     => 'portfolio',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'style'        => '',
        'show_count'   => 0,
        'hide_empty'   => 0,
        'title_li'     => '',
        'depth'        => 1,
    );
    $res = get_categories($args);
    return $res;
}

function custom_wp_query($params){
    $args = array(
        "post_type" => 'portfolio',
        'order' => 'DESC',
        'orderby' => 'term_id',
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio',
                'field' => 'slug',
                'terms' => $params
            )
        )
    );
    $portfolio = new WP_Query($args);
    return $portfolio;
}

function get_params_for_wp_query(){
    $res = custom_get_categories();
    $params = [];

    foreach ($res as $key => $item){
        $params[] = $item->slug;
    }

    return $params;
}

function get_categories_for_data_filter(){
    $res = custom_get_categories();
    $categories = [];
    foreach ($res as $key => $item){
        $params[] = $item->slug;
        foreach ($item as $k => $value) {
            $categories[$item->slug] = $item->name;
        }
    }

    return $categories;
}
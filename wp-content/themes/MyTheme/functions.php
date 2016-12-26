<?php
function add_theme_scripts() {
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/libs/bootstrap/bootstrap-grid.min.css' );

	wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . 'libs/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'styles', get_template_directory_uri() . '/libs/linea/styles.css' );

	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css');

	wp_enqueue_style( 'animate.min', get_template_directory_uri() . '/libs/animate/animate.min.css');

	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css');

	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');

	wp_enqueue_style( 'purple', get_template_directory_uri() . '/css/skins/purple.css');

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
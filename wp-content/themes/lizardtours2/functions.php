<?php
/**
 * lizardtours2 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lizardtours2
 */

if ( ! function_exists( 'lizardtours2_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lizardtours2_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lizardtours2, use a find and replace
	 * to change 'lizardtours2' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lizardtours2', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'lizardtours2' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lizardtours2_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'lizardtours2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lizardtours2_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lizardtours2_content_width', 640 );
}
add_action( 'after_setup_theme', 'lizardtours2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lizardtours2_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lizardtours2' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lizardtours2' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Right Page', 'lizardtours2' ),
		'id'            => 'sidebar-right-page',
		'description'   => esc_html__( 'Add widgets here.', 'lizardtours2' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Twitter box', 'lizardtours2' ),
		'id'            => 'sidebar-social',
		'description'   => esc_html__( 'Add widgets here.', 'lizardtours2' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lizardtours2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lizardtours2_scripts() {
	wp_enqueue_style( 'lizardtours2-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lizardtours2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lizardtours2-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'lizardtours2-bundle', get_template_directory_uri() . '/js/bundle.js', array(), '20161217', true );
}
add_action( 'wp_enqueue_scripts', 'lizardtours2_scripts' );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] ); 	
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}
// Agregar product description debajo de summary
function woocommerce_template_product_description() {
	wc_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

//quitar el titulo de product description
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
	return '';
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
 
function woo_custom_cart_button_text() {
 
        return __( 'Book Now', 'woocommerce' );
 
}
function limit_words($string, $word_limit) {

	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character

	$words = explode(' ', $string);

	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character

	return implode(' ', array_slice($words, 0, $word_limit)) .'...';

}

function add_taxonomy_controller($controllers) {
  $controllers[] = 'Taxonomy';
  return $controllers;
}
add_filter('json_api_controllers', 'add_taxonomy_controller');

function set_taxonomy_controller_path() {
  return get_stylesheet_directory() . '/json-api-taxonomy-index.php';
}
add_filter('json_api_taxonomy_controller_path', 'set_taxonomy_controller_path');



// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_address_1']);
     unset($fields['billing']['billing_address_2']);
     unset($fields['billing']['billing_country']);
     unset($fields['billing']['billing_city']);
	 unset($fields['billing']['billing_postcode']);
	 unset($fields['billing']['billing_state']);

	 $fields['order']['order_comments']['placeholder'] = 'e.g. child seats';
	  $fields['order']['order_comments']['label'] = 'Important Notes';
     

     return $fields;
}


/**
 * Add the field to the checkout
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {

    echo '<div id="tour_pickup_hotel">';

    woocommerce_form_field( 'tour_pickup_hotel', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Pick up hotel'),
        'placeholder'   => __('Hotel'),
        'required'  => true,
        ), $checkout->get_value( 'tour_pickup_hotel' ));

    /*woocommerce_form_field( 'tour_date', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Tour date'),
        'placeholder'   => __('dd/mm/yyyy'),
        'required'  => true,
        'input_class' => array('datepicker')
        ), $checkout->get_value( 'tour_date' ));*/

    echo '</div>';

}
/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['tour_pickup_hotel'] )
        wc_add_notice( __( '<strong>Pick up hotel</strong> is a required field.' ), 'error' );

     /*if ( ! $_POST['tour_date'] )
        wc_add_notice( __( '<strong>Tour date</strong> is a required field.' ), 'error' );*/
}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['tour_pickup_hotel'] ) ) {
        update_post_meta( $order_id, 'Pick up hotel', sanitize_text_field( $_POST['tour_pickup_hotel'] ) );
    }
    /* if ( ! empty( $_POST['tour_date'] ) ) {
        update_post_meta( $order_id, 'Tour date', sanitize_text_field( $_POST['tour_date'] ) );
    }*/
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Pick up hotel').':</strong> ' . get_post_meta( $order->id, 'Pick up hotel', true ) . '</p>';
    //*echo '<p><strong>'.__('Tour date').':</strong> ' . get_post_meta( $order->id, 'Tour date', true ) . '</p>';**/
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/*function manage_available_gateways( $gateways ) {
		unset($gateways['wc-booking-gateway']);
		return $gateways;
	}

add_filter( 'woocommerce_available_payment_gateways', 'manage_available_gateways' );*/
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

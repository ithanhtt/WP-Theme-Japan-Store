<?php
/**
 * Japan Anti Virus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Japan_Anti_Virus
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'japan_anti_virus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function japan_anti_virus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Japan Anti Virus, use a find and replace
		 * to change 'japan-anti-virus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'japan-anti-virus', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'japan-anti-virus' ),
				'header-menu' => esc_html__( 'Header Menu', 'japan-anti-virus' ),
				'menu-category' => esc_html__( 'Navbar Category', 'japan-anti-virus' ),
				'menu-footer' => esc_html__( 'Menu Footer', 'japan-anti-virus' ),
				'menu-footer-information' => esc_html__( 'Menu Footer Infomation', 'japan-anti-virus' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'japan_anti_virus_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'japan_anti_virus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function japan_anti_virus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'japan_anti_virus_content_width', 640 );
}
add_action( 'after_setup_theme', 'japan_anti_virus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function japan_anti_virus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'japan-anti-virus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'japan-anti-virus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'japan_anti_virus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function japan_anti_virus_scripts() {
	wp_enqueue_style( 'japan-anti-virus-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'japan-anti-virus-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font', get_template_directory_uri() . '/fonts/fontawesome.min.css', array(), '1.1', 'all');
	wp_enqueue_style( 'scss', get_template_directory_uri() . '/scss/style.css', array(), '1.1', 'all');

	wp_enqueue_script( 'japan-anti-virus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'japan_anti_virus_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Search
// advanced search functionality
function advanced_search_query($query) {


    if($query->is_search()) {
        if (isset($_GET['s_cat']) && $_GET['s_cat'] != 0) {

            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['s_cat']) )
            ));
        }

        return $query;
    }
	// $defaults['selected'] = ( is_category() ) ? get_query_var( 'cat' ) : 15;
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

/**
 * Customizer Header Time and Call */
function customizer_social( $wp_customize ) {
	// Tạo section
    $wp_customize->add_section (
        'section_info',
        array(
            'title' => 'Info Header',
            'description' => 'Call and time header',
            'priority' => 25
        )
    );
	// Tạo setting call icon
    $wp_customize->add_setting (
	    'call',
	    array(
	        'default' => ''
	    )
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'control_call',
			array(
				'label'      => __( 'Upload call icon', 'theme_name' ),
				'section'    => 'section_info',
				'settings'   => 'call',
				// 'context'    => 'your_setting_context'
			)
		)
	);
    // Tạo setting phone
    $wp_customize->add_setting (
	    'phone',
	    array(
	        'default' => '0270-61-9899'
	    )
	);

	// Tạo coltrol phone
	$wp_customize->add_control (
	    'control_phone',
	    array(
	        'label' => 'Phone Number',
	        'section' => 'section_info',
	        'type' => 'text',
	        'settings' => 'phone'
	    )
	);	
	// Tạo setting time icon
    $wp_customize->add_setting (
	    'time',
	    array(
	        'default' => ''
	    )
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'control_time',
			array(
				'label'      => __( 'Upload time icon', 'theme_name' ),
				'section'    => 'section_info',
				'settings'   => 'time',
				// 'context'    => 'your_setting_context'
			)
		)
	);
	// Tạo setting rtime
    $wp_customize->add_setting (
	    'rtime',
	    array(
	        'default' => '9:00-17:00'
	    )
	);

	// Tạo coltrol rtime
	$wp_customize->add_control (
	    'control_rtime',
	    array(
	        'label' => 'Time',
	        'section' => 'section_info',
	        'type' => 'text',
	        'settings' => 'rtime'
	    )
	);	


}
add_action( 'customize_register', 'customizer_social' );

//Copy right
function customizer_copyright( $wp_customize ) {
	// Tạo section
    $wp_customize->add_section (
        'section_copyright',
        array(
            'title' => 'Copyright',
            'description' => 'Text Copyright Footer',
            'priority' => 25
        )
    );

    // Tạo setting
    $wp_customize->add_setting (
	    'copyright-1',
	    array(
	        'default' => 'Gunma Prefecture Public Safety Commission antique dealer permit No. 421090324400'
	    )
	);

	// Tạo coltrol
	$wp_customize->add_control (
	    'control_copyright-1',
	    array(
	        'label' => 'Copyright Text 1',
	        'section' => 'section_copyright',
	        'type' => 'textarea',
	        'settings' => 'copyright-1'
	    )
	);

    // Tạo setting
    $wp_customize->add_setting (
	    'copyright-2',
	    array(
	        'default' => 'Copyright © STARSHOP Isesaki Main Store All Rights Reserved.'
	    )
	);

	// Tạo coltrol
	$wp_customize->add_control (
	    'control_copyright-2',
	    array(
	        'label' => 'Copyright Text 2',
	        'section' => 'section_copyright',
	        'type' => 'textarea',
	        'settings' => 'copyright-2'
	    )
	);

}
add_action( 'customize_register', 'customizer_copyright' );

// require get_template_directory() . '/inc/theme-option.php';

// ACF

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Option',
		'menu_title'	=> 'Theme Option',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Slider Header',
		'menu_title'	=> 'Slider Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Slider Footer',
		'menu_title'	=> 'Slider Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/**
 * 
 * Woocommerce
 * 
 */

add_action( 'after_setup_theme', 'enable_woocommerce_support' );

function enable_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

function jav_remove_hook() {
	// remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_output_content_wrapper_end ', 10 );
}
add_action('init', 'jav_remove_hook', 20);

function jav_remove_sale() {
	return;
}
add_action('woocommerce_sale_flash', 'jav_remove_sale');


// function yourtheme_setup() {
//     add_theme_support( 'wc-product-gallery-zoom' );
//     add_theme_support( 'wc-product-gallery-lightbox' );
//     add_theme_support( 'wc-product-gallery-slider' );
// }
// add_action( 'after_setup_theme', 'yourtheme_setup' );


// Add to cart ajax
// function ql_woocommerce_ajax_add_to_cart_js() {
//     if (function_exists('is_product') && is_product()) {  
//        wp_enqueue_script('custom_script', get_bloginfo('stylesheet_directory') . '/js/main.js', array('jquery'),'1.0' );
//     }
// }
// add_action('wp_enqueue_scripts', 'ql_woocommerce_ajax_add_to_cart_js');


// add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
// add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
// function woocommerce_ajax_add_to_cart() {

// 	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
// 	$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
// 	$variation_id = absint($_POST['variation_id']);
// 	$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
// 	$product_status = get_post_status($product_id);

// 	if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

// 		do_action('woocommerce_ajax_added_to_cart', $product_id);

// 		if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
// 			wc_add_to_cart_message(array($product_id => $quantity), true);
// 		}

// 		WC_AJAX :: get_refreshed_fragments();
// 	} else {

// 		$data = array(
// 			'error' => true,
// 			'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

// 		echo wp_send_json($data);
// 	}

// 	wp_die();
// }

// Count total product to cart
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
	ob_start();
	$items_count = WC()->cart->get_cart_contents_count();
	?>
	<div id="mini-cart-count"><?php echo $items_count ?></div>
	<?php
		$fragments['#mini-cart-count'] = ob_get_clean();
	return $fragments;
}

// 
// 
// 

function woocommerce_ajax_add_to_cart_js() {
    if (function_exists('is_product') && is_product()) {
		wp_enqueue_script('custom_script', get_bloginfo('stylesheet_directory') . '/js/ajax-add-to-cart.js', array('jquery'),'1.0' );
    }
}
add_action('wp_enqueue_scripts', 'woocommerce_ajax_add_to_cart_js', 99);

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
function woocommerce_ajax_add_to_cart() {

	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
	$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
	$variation_id = absint($_POST['variation_id']);
	$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
	$product_status = get_post_status($product_id);

	if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

		do_action('woocommerce_ajax_added_to_cart', $product_id);

		if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
			wc_add_to_cart_message(array($product_id => $quantity), true);
		}

		WC_AJAX :: get_refreshed_fragments();
	} else {

		$data = array(
			'error' => true,
			'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

		echo wp_send_json($data);
	}

	wp_die();
}

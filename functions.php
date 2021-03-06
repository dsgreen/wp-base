<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Add wide image support.
		 */
		add_theme_support( 'align-wide' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

    /*
     * Register custom image sizes.
     */
		add_image_size( 'extra_large', 1400, 1400 );

		/*
		 * Add sizes for use in attachment display settings menu.
		 */
		add_filter( 'image_size_names_choose', 'custom_image_sizes' );
		function custom_image_sizes( $sizes ) {
			return array_merge( $sizes, array(
				'extra_large' => __( 'Extra Large', '_s' )
			) );
		}

		/*
		 * Register main navigation menu.
		 */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', '_s' ),
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

		// post formats here as needed
		// ...

		/*
		 * Set up the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/*
		 * Add theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/*
		 * Change the excerpt 'more' link.
		 */
	   function new_excerpt_more() {
		   global $post;
		   return '&hellip; <div class="more-wrap"><a href="'. get_permalink($post->ID) . '" title="Continue to ' . get_the_title() . '" class="more-link">' . get_the_title() . '</a></div>';
	   }
	   add_filter('excerpt_more', 'new_excerpt_more');

		/*
		 * Remove the WordPress version number from the HTML source.
		 */
	  add_filter( 'the_generator', '__return_null' );
	}
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * Set this to a larger size. Image responsiveness handled via CSS in this theme.
 *
 * https://codex.wordpress.org/Content_Width
 * https://wycks.wordpress.com/2013/02/14/why-the-content_width-wordpress-global-kinda-sucks/#comments
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 2500 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', '_s' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', '_s' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', '_s' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Text', '_s' ),
		'id'            => 'footer-text',
		'description'   => esc_html__( 'Set footer text here.', '_s' ),
		'before_widget' => '',
		'after_widget'  => '',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
  /*
   * Header scripts
   * Bootstrap, plugins, other
   */
	// OPTIONAL: wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.3' );
	wp_enqueue_style( 'bootstrap-grid', get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css', array(), '4.1.3' );
  // ALTERNATE: wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
  wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.1.1/css/all.css', array(), '5.1.1' );

	// custom plugin styles: could opt to put in header-{custom}.php files for select pages
  // EXAMPLE: wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/your-custom.css', array(), '1.0.0' );

  // _s/main site styles (follows Bootstrap & plugins in case any overrides in main site styles)
  wp_enqueue_style( 'main', get_stylesheet_uri() );

  // Modernizr (SVG, media query, add CSS classes, Modernizr.testStyles() build)
  wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.custom.07230.js', array(), '2.8.3' );

  /*
   * Footer scripts
   * Note: 'jquery' dependency removed from Bootstrap and others to load custom jQuery in footer (not the bundled WP version in header).
   * Some plugins will require jQuery and the bundled WP version will get loaded in the header. If that's the case, remove the jQuery line below to avoid loading it twice.
   */
	wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.3.1', TRUE );
	// OPTIONAL: wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/js/popper.min.js', array(), '1.14.3', TRUE );
	// OPTIONAL: wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.1.0', TRUE );

	// plugin scripts, followed by main site script
	wp_enqueue_script( 'jquery_scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array(), '2.1.2', TRUE );
	wp_enqueue_script( 'jquery_localScroll', get_template_directory_uri() . '/js/jquery.localScroll.min.js', array(), '2.0.0', TRUE );
  wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array(), '1.0', TRUE );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/*
 * Remove WordPress emoji script from head.
 */
/*
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
*/
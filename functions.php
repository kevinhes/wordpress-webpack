<?php
/**
 * design_hu_webpack functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package design_hu_webpack
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function design_hu_webpack_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on design_hu_webpack, use a find and replace
		* to change 'design_hu_webpack' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'design_hu_webpack', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'design_hu_webpack' ),
			'menu-2' => esc_html__( 'home', 'design_hu_webpack' ),
			'menu-3' => esc_html__( 'product', 'design_hu_webpack' ),
			'menu-4' => esc_html__( 'color', 'design_hu_webpack' ),
			'menu-5' => esc_html__( 'case', 'design_hu_webpack' ),
			'menu-6' => esc_html__( 'knowledge', 'design_hu_webpack' ),
			'menu-7' => esc_html__( 'video', 'design_hu_webpack' ),
			'menu-8' => esc_html__( 'about', 'design_hu_webpack' ),
			'menu-9' => esc_html__( 'shopping', 'design_hu_webpack' ),
			'menu-10' => esc_html__( 'contact', 'design_hu_webpack' ),
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
			'design_hu_webpack_custom_background_args',
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
add_action( 'after_setup_theme', 'design_hu_webpack_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function design_hu_webpack_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'design_hu_webpack_content_width', 640 );
}
add_action( 'after_setup_theme', 'design_hu_webpack_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function design_hu_webpack_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'design_hu_webpack' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'design_hu_webpack' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'design_hu_webpack_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/script.php';

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
 * Acf setting.
 */
require get_template_directory() . '/inc/acf-option.php';

/**
 * Page redirect.
 */
require get_template_directory() . '/inc/page-redirect.php';

/**
 * Ajax.
 */
require get_template_directory() . '/inc/ajax.php';

/**
 * breadcrumb.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * post num.
 */
require get_template_directory() . '/inc/postnum.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// make menu arry
function build_menu_array($menu_items, $parent = 0) {
  $branch = [];

  foreach ($menu_items as $item) {
    if ($item->menu_item_parent == $parent) {
      $children = build_menu_array($menu_items, $item->ID);
      if ($children) {
          $item->children = $children;
      }
      $branch[$item->ID] = $item;
    }
  }

  return $branch;
}

add_filter('wpcf7_autop_or_not', '__return_false');
<?php 
function design_hu_webpack_scripts() {
	wp_enqueue_style( 'design_hu_webpack-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'design_hu_webpack-style', 'rtl', 'replace' );
  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/dist/main.css', array(), _S_VERSION );
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/dist/main.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'design_hu_webpack-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_archive() ) {
    $page_info = get_queried_object();
    $page_taxonomy = $page_info -> taxonomy;
    switch ( $page_taxonomy ) {
      case 'tax_case':
        wp_enqueue_script( 'case-script', get_template_directory_uri() . '/dist/case.js', array(), _S_VERSION, true );
        break;
      case 'tax_mineral_color':
        wp_enqueue_script( 'color-script', get_template_directory_uri() . '/dist/color.js', array(), _S_VERSION, true );
        break;
      case 'tax_certification':
      case 'tax_news':
        wp_enqueue_script( 'dropdownbanner-script', get_template_directory_uri() . '/dist/dropdownbanner.js', array(), _S_VERSION, true );
        break;
    }
  } elseif ( is_single() ) {
    $post_type = get_post_type();
    switch ( $post_type ) {
      case 'type_products':
        wp_enqueue_script( 'product-script', get_template_directory_uri() . '/dist/product.js', array(), _S_VERSION, true );
        break;
      case 'type_case':
        wp_enqueue_script( 'single-case-script', get_template_directory_uri() . '/dist/singlecase.js', array(), _S_VERSION, true );
        break;
      case 'type_coating_knowled':
      case 'type_video':
      case 'type_news':
        wp_enqueue_script( 'coating-knowled-script', get_template_directory_uri() . '/dist/electronicCatalog.js', array(), _S_VERSION, true );
        break;
    }
  } elseif ( is_page() ) {
    $page = get_queried_object();
    $page_slug = $page -> post_name;
    switch($page_slug) {
      case 'about':
      case 'keim-stories':
      case 'env-protect':
      case 'site-map':
        wp_enqueue_script( 'about-script', get_template_directory_uri() . '/dist/about.js', array(), _S_VERSION, true );
        break;
      case 'question-box':
        wp_enqueue_script( 'qa-script', get_template_directory_uri() . '/dist/qabox.js', array(), _S_VERSION, true );
        break;
      case 'contact':
        wp_enqueue_script( 'contact-script', get_template_directory_uri() . '/dist/contact.js', array(), _S_VERSION, true );
        break;
    }
  }
  
  if ( is_front_page() ) {
    wp_enqueue_script( 'home-script', get_template_directory_uri() . '/dist/home.js', array(), _S_VERSION, true );
  }
}
add_action( 'wp_enqueue_scripts', 'design_hu_webpack_scripts' );
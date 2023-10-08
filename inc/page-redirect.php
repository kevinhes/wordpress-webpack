<?php 
  function redirect_empty_page() {

    if (is_page('product-introduction')) {
      $page_link = get_permalink( 68 );
      if ( $page_link ) {
        wp_redirect( $page_link );
      }
      exit;
    }

  }
  add_action('template_redirect', 'redirect_empty_page');
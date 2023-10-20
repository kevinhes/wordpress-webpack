<?php 
  function redirect_empty_page() {

    if (is_page('about')) {
      $page_link = get_permalink( get_page_by_path( 'about/keim-stories' ) );
      if ( $page_link ) {
        wp_redirect( $page_link );
      }
      exit;
    }

  }
  add_action('template_redirect', 'redirect_empty_page');
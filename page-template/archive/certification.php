<?php 
  get_template_part('components/component-dropdown-banner');
?>

<div class="container">
  <?php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs layout-bottom-s layout-sm-bottom-s">','</div>' );
    }
  ?>
  <div class="row inner-top-s inner-sm-top-s inner-bottom-s inner-sm-bottom-s row-gap-x5">
    <?php if(have_posts()) {
      while(have_posts()) {
        the_post();
        get_template_part('template-parts/content-certification');
      }
      the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => '<svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.72 20.7199C16.5793 20.5793 16.5002 20.3887 16.5 20.1899V19.8099C16.5023 19.6114 16.5811 19.4216 16.72 19.2799L21.86 14.1499C21.9539 14.0552 22.0817 14.002 22.215 14.002C22.3483 14.002 22.4761 14.0552 22.57 14.1499L23.28 14.8599C23.3741 14.952 23.4271 15.0782 23.4271 15.2099C23.4271 15.3415 23.3741 15.4677 23.28 15.5599L18.83 19.9999L23.28 24.4399C23.3747 24.5337 23.4279 24.6615 23.4279 24.7949C23.4279 24.9282 23.3747 25.056 23.28 25.1499L22.57 25.8499C22.4761 25.9445 22.3483 25.9978 22.215 25.9978C22.0817 25.9978 21.9539 25.9445 21.86 25.8499L16.72 20.7199Z" fill="#8A8A8A"/>
        <rect x="1" y="0.5" width="39" height="39" rx="19.5" stroke="#8A8A8A"/>
        </svg>
        ',
        'next_text' => '<svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M24.28 20.7199C24.4207 20.5793 24.4998 20.3887 24.5 20.1899V19.8099C24.4977 19.6114 24.4189 19.4216 24.28 19.2799L19.14 14.1499C19.0461 14.0552 18.9183 14.002 18.785 14.002C18.6517 14.002 18.5239 14.0552 18.43 14.1499L17.72 14.8599C17.6259 14.952 17.5729 15.0782 17.5729 15.2099C17.5729 15.3415 17.6259 15.4677 17.72 15.5599L22.17 19.9999L17.72 24.4399C17.6253 24.5337 17.5721 24.6615 17.5721 24.7949C17.5721 24.9282 17.6253 25.056 17.72 25.1499L18.43 25.8499C18.5239 25.9445 18.6517 25.9978 18.785 25.9978C18.9183 25.9978 19.0461 25.9445 19.14 25.8499L24.28 20.7199Z" fill="#8A8A8A"/>
        <rect x="1" y="0.5" width="39" height="39" rx="19.5" stroke="#8A8A8A"/>
        </svg>
        ',
      ) );
    } ?>
  </div>
</div>
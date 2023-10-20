<?php
  get_template_part('components/component-dropdown-banner');
?>

<section class="bg-gray2 inner-bottom-l inner-sm-bottom-l">
  <div class="container">
    <?php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs layout-bottom-l layout-sm-bottom-l">','</div>' );
    }
    ?>
    <div class="row row-gap-x5">
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-2',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-3',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-4',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-5',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-6',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-7',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-8',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-9',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-site-map p-5 bg-light">
          <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-10',
              'container'      => 'nav',
              'container_id'   => 'site-navigation',
              'menu_class'     => 'site-map-nav list-unstyled',
          ));

          ?>
        </div>
      </div>
    </div>
  </div>
</section>
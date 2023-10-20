<?php
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
?>

<div class="site-branding">
  <?php if( is_home() || is_front_page() ) : ?>
    <div class="d-flex align-items-center">
      <a
        href="<?php echo esc_url( home_url( '/' ) ); ?>"
        rel="home"
        class="logo logo-header me-3"
        style="background-image: url(<?php echo $logo[0] ?>)"
      >
      </a>
      <h1 class="h4 text-light">
        <?php bloginfo( 'name' ); ?>
      </h1>
    </div>
  <?php else : ?>
    <p>
      <a
        href="<?php echo esc_url( home_url( '/' ) ); ?>"
        rel="home"
        class="logo logo-header"
        style="background-image: url(<?php echo $logo[0] ?>)"
      >
        <?php bloginfo( 'name' ); ?>
      </a>
    </p>
  <?php endif ?>
</div>
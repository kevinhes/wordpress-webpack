<?php
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
?>

<div class="site-branding">
  <?php if( is_home() || is_front_page() ) : ?>
    <h1>
      <a
        href="<?php echo esc_url( home_url( '/' ) ); ?>"
        rel="home"
        class="logo logo-header"
        style="background-image: url(<?php echo $logo[0] ?>)"
      >
        <?php bloginfo( 'name' ); ?>
      </a>
    </h1>
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
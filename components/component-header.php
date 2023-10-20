<header id="masthead" class="site-header">
  <div class="container d-flex justify-content-between align-items-center pt-2">

    <!-- logo -->
    <?php get_template_part( 'components/component', 'logo' ); ?>
    <!-- logo -->
  
    <!-- nav -->
    <?php 
      if ( is_front_page() ) {
        get_template_part( 'components/component', 'navbarlight' );
      } else {
        get_template_part( 'components/component', 'navbar' );
      }
    ?>
    <!-- nav -->
  </div>

	</header><!-- #masthead -->
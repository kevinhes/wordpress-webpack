<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package design_hu_webpack
 */

get_header();
$page_info = get_queried_object();
$page_taxonomy = $page_info -> taxonomy;
?>

	<main id="primary" class="site-main">
    <?php 
      switch ($page_taxonomy) {
        case 'tax_case':
          get_template_part( 'page-template/archive/case');
          break;
        case 'tax_mineral_color':
          get_template_part( 'page-template/archive/color');
          break;
        case 'tax_products':
          get_template_part( 'page-template/archive/products');
          break;
        case 'tax_coating_knowled':
        case 'tax_video':
          get_template_part( 'page-template/archive/archive-template');
          break;
        case 'tax_certification':
          get_template_part( 'page-template/archive/certification');
          break;
        case 'tax_news':
          get_template_part( 'page-template/archive/news');
          break;
        default:
          if ( have_posts() ) :
            while ( have_posts() ) :
              the_post();
              get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
            the_posts_navigation();
          else :
            get_template_part( 'template-parts/content', 'none' );
          endif;
          break;
      }
    ?>

	</main><!-- #main -->

<?php
get_footer();
?>
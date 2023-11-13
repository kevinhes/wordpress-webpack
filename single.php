<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package design_hu_webpack
 */

get_header();
$post_type = get_post_type();
?>

	<main id="primary" class="site-main">
    <?php 
      switch ($post_type) {
        case 'type_products':
          get_template_part( 'page-template/single/product' );
          break;
        case 'type_case':
          get_template_part( 'page-template/single/case' );
          break;
        case 'type_coating_knowled':
          $taxonomies = get_object_taxonomies($post_type);
          $terms = get_the_terms($post->ID, $taxonomies[0]);
          foreach( $terms as $term ) {
            if ( $term -> slug === 'electronic-catalog' ) {
              get_template_part( 'page-template/single/electronic-catalog' );
            } else  {
              get_template_part( 'page-template/single/diy-area' );
            }
          }
          break;
        case 'type_video':
          get_template_part( 'page-template/single/video' );
          break;
        case 'type_news':
          get_template_part( 'page-template/single/singlenews' );
          break;
        default:
          while ( have_posts() ) :
            the_post();
      
            get_template_part( 'template-parts/content', get_post_type() );
      
            the_post_navigation(
              array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'design_hu_webpack' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'design_hu_webpack' ) . '</span> <span class="nav-title">%title</span>',
              )
            );
      
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
      
          endwhile; // End of the loop.
          break;
      }
    ?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();

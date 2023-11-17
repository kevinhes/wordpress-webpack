<?php
function my_custom_posts_per_page( $query ) {
  if ( $query->is_main_query() ) {
    if ( is_archive() ) {
      if( $query->is_tax( 'tax_coating_knowled' ) ) {
        $query->set( 'posts_per_page', 6 );
      } elseif ( $query->is_tax( 'tax_video') ) {
        $query->set( 'posts_per_page', 4 );
      } elseif ( $query->is_tax( 'tax_certification') ) {
        $query->set( 'posts_per_page', 8 );
      } elseif ( $query->is_tax( 'tax_news') ) {
        $query->set( 'posts_per_page', 9 );
      }
    } elseif ( is_search() ) {
      $query->set( 'posts_per_page', -1 );
    }
  }
}
add_action( 'pre_get_posts', 'my_custom_posts_per_page' );



// function custom_search_filter($query) {
//   $page_info = get_queried_object();
//   if ( $page_info ) {
//     if ( $page_info -> name === 'type_bible_query' ) {
//       if ( !is_admin()  && $query->is_main_query() ) {
//           if ( isset($_GET['custom_cat']) ) {
//               $custom_cat = sanitize_text_field($_GET['custom_cat']);
//               $tax_query = array(
//                   array(
//                       'taxonomy' => 'tax_bible_query', // 替換為您的自訂分類名稱
//                       'field'    => 'slug',
//                       'terms'    => $custom_cat,
//                   ),
//               );
//               $query->set('tax_query', $tax_query);
//           }
//       }
//     }
//   }
//   return $query;
// }
// add_action('pre_get_posts', 'custom_search_filter');

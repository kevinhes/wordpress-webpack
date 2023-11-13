<?php
$banner_bg_img = get_field('banner_bg_img');
$post_type = get_post_type();
$main_content = get_field('main_content');
$taxonomies = get_object_taxonomies($post_type);
$cat_terms = get_terms(
  array(
    'taxonomy' => $taxonomies[0],
    'hide_empty' => false,
  )
);
$terms = get_the_terms($post->ID, $taxonomies[0]);
function cleanParent($data) {
  foreach( $data as $key => $term ) {
    if ($term -> parent === 0) {
      unset($data[$key]);
    }
  }
  return $data;
}
$terms = cleanParent($terms);
$cat_terms = cleanParent($cat_terms);
$currentURL = home_url( add_query_arg( null, null ) );
?>
<div class="banner-s">
  <img src="<?php echo $banner_bg_img['url'] ?>" alt="" class="w-100 h-100 object-cover">
</div>

<div class="position-relative">
  <div class="container inner-bottom-l inner-sm-bottom-l position-relative z-index-1">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs layout-bottom-s layout-sm-bottom-s">','</div>' );
      }
    ?>
    <div class="row">
      <div class="col-lg-7">
        <div class="d-flex column-gap-5 align-items-center mb-5">
          <?php foreach($terms as $term) : ?>
            <h4 class="btn btn-outline-secondary">
              <?php echo $term -> name ?>
            </h4>
          <?php endforeach ?>
          <h4 class="text-gray5"><?php echo get_the_Date() ?></h4>
        </div>
        <h1 class="layout-bottom-s layout-sm-bottom-s"><?php echo get_the_title() ?></h1>
        <div class="row">
          <div class="layout-bottom-s layout-sm-bottom-s p-3 border col-7">
            <h3 class="mb-5">
              本文重點
            </h3>
            <ol class="post-list ps-6">
      
            </ol>
          </div>
        </div>
        <!-- main content -->
        <div class="editor-content editor-content-same-space">
          <?php the_content() ?>
        </div>
      </div>
      <div class="col-lg-1">
        <div class="d-flex">
          <div class="w-50"></div>
          <div class="w-50">
            <div class="d-flex justify-content-end">
              <?php //echo do_shortcode('[Sassy_Social_Share]') ?>
              <ul class="list-unstyled sns-share-list">
                <li class="list-item">
                  <button type="button" class="item-link">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.8435 7.26316C21.2969 7.26316 22.4751 6.08496 22.4751 4.63158C22.4751 3.1782 21.2969 2 19.8435 2C18.3901 2 17.2119 3.1782 17.2119 4.63158C17.2119 6.08496 18.3901 7.26316 19.8435 7.26316Z" stroke="#8A8A8A" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M5.10716 15.6845C6.56055 15.6845 7.73874 14.5063 7.73874 13.053C7.73874 11.5996 6.56055 10.4214 5.10716 10.4214C3.65378 10.4214 2.47559 11.5996 2.47559 13.053C2.47559 14.5063 3.65378 15.6845 5.10716 15.6845Z" stroke="#8A8A8A" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M19.8435 22.0002C21.2969 22.0002 22.4751 20.822 22.4751 19.3686C22.4751 17.9153 21.2969 16.7371 19.8435 16.7371C18.3901 16.7371 17.2119 17.9153 17.2119 19.3686C17.2119 20.822 18.3901 22.0002 19.8435 22.0002Z" stroke="#8A8A8A" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M7.73828 14.1049L17.212 18.3155M17.212 6.21021L7.73828 11.4734" stroke="#8A8A8A" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </button>
                </li>
                <li class="list-item">
                  <a href="https://www.facebook.com/sharer.php?u=<?php echo $currentURL ?>" class="item-link" target="_blank">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.7329 13.0684H13.2329V13.5684V21.5H10.0223V13.5684V13.0684H9.52235H7.55246L7.86981 9.87895H9.52235H10.0223V9.37895V7.26316C10.0223 5.99989 10.5242 4.78836 11.4174 3.8951C12.3107 3.00183 13.5222 2.5 14.7855 2.5H17.4434V5.71053H14.7855C14.3737 5.71053 13.9788 5.87411 13.6876 6.16528C13.3965 6.45646 13.2329 6.85137 13.2329 7.26316V9.37895V9.87895H13.7329H17.3912L17.0738 13.0684H13.7329Z" stroke="#8A8A8A"/>
                    </svg>
                  </a>
                </li>
                <li class="list-item">
                  <a href="https://social-plugins.line.me/lineit/share?url=<?php echo urlencode($currentURL); ?>" class="item-link" target="_blank">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12.001 3.0718H12.1559C17.4191 3.13937 21.5 6.62236 21.5 10.6898C21.5 12.3294 20.8772 13.8267 19.5086 15.3268L19.5085 15.3267L19.5007 15.3356C18.4924 16.4947 16.8368 17.8071 15.2758 18.8967C13.7086 19.9905 12.3056 20.8123 11.8214 21.0144L11.8204 21.0148C11.7421 21.0477 11.6767 21.0709 11.623 21.087C11.624 21.0807 11.6249 21.0744 11.6259 21.0679C11.6266 21.0639 11.6272 21.0596 11.628 21.055C11.6299 21.0424 11.6322 21.0281 11.6341 21.0154L11.7706 20.1684L11.7718 20.1608L11.7728 20.1531C11.7908 20.0143 11.8109 19.8275 11.8112 19.6351C11.8115 19.4516 11.7946 19.2165 11.7092 19.0031L11.7085 19.0014C11.5812 18.6865 11.3004 18.5102 11.1013 18.4143C10.885 18.3102 10.6495 18.2463 10.4678 18.2077L10.4489 18.2037L10.4298 18.2011C5.79041 17.5851 2.50098 14.3736 2.50098 10.6908C2.50098 6.58326 6.66173 3.0718 12.001 3.0718Z" stroke="#8A8A8A"/>
                      <path d="M18.663 10.8399C18.663 10.9791 18.6078 11.1126 18.5096 11.2111C18.4114 11.3097 18.2781 11.3654 18.139 11.3659H16.676V12.3029H18.139C18.2782 12.3029 18.4117 12.3582 18.5102 12.4567C18.6087 12.5551 18.664 12.6887 18.664 12.8279C18.664 12.9671 18.6087 13.1007 18.5102 13.1991C18.4117 13.2976 18.2782 13.3529 18.139 13.3529H16.15C16.0113 13.3519 15.8787 13.2961 15.781 13.1978C15.6832 13.0995 15.6282 12.9665 15.628 12.8279V8.8519C15.628 8.5649 15.863 8.3269 16.153 8.3269H18.141C18.2746 8.33541 18.4 8.39455 18.4915 8.49227C18.583 8.59 18.6338 8.71895 18.6336 8.85285C18.6333 8.98674 18.582 9.1155 18.4901 9.21287C18.3982 9.31025 18.2726 9.36891 18.139 9.3769H16.676V10.3149H18.139C18.429 10.3149 18.663 10.5509 18.663 10.8399ZM14.566 13.3249C14.5123 13.3422 14.4563 13.351 14.4 13.3509C14.3176 13.3526 14.236 13.3345 14.162 13.2982C14.0881 13.2618 14.0239 13.2082 13.975 13.1419L11.939 10.3779V12.8279C11.929 12.9599 11.8695 13.0832 11.7724 13.1732C11.6753 13.2632 11.5478 13.3132 11.4155 13.3132C11.2831 13.3132 11.1556 13.2632 11.0585 13.1732C10.9615 13.0832 10.902 12.9599 10.892 12.8279V8.8519C10.8917 8.71363 10.9463 8.58091 11.0438 8.48285C11.1413 8.3848 11.2737 8.32943 11.412 8.32891C11.4921 8.33145 11.5706 8.3518 11.6419 8.38847C11.7131 8.42514 11.7753 8.47721 11.824 8.5409L13.876 11.3159V8.8519C13.876 8.5649 14.111 8.3269 14.401 8.3269C14.688 8.3269 14.926 8.5649 14.926 8.8519V12.8279C14.9257 12.938 14.8908 13.0453 14.8262 13.1345C14.7615 13.2237 14.6705 13.2903 14.566 13.3249ZM9.61597 13.3519C9.47734 13.3511 9.34462 13.2956 9.24668 13.1975C9.14874 13.0994 9.0935 12.9665 9.09298 12.8279V8.8519C9.09298 8.5649 9.32797 8.3269 9.61797 8.3269C9.90697 8.3269 10.142 8.5649 10.142 8.8519V12.8279C10.1412 12.967 10.0854 13.1001 9.98692 13.1983C9.88839 13.2964 9.75505 13.3516 9.61597 13.3519ZM8.08598 13.3519H6.09897C5.96015 13.3511 5.82722 13.2957 5.72896 13.1976C5.63071 13.0996 5.57502 12.9667 5.57397 12.8279V8.8519C5.57397 8.5649 5.81197 8.3269 6.09897 8.3269C6.38897 8.3269 6.62397 8.5649 6.62397 8.8519V12.3029H8.08798C8.22721 12.3029 8.36075 12.3582 8.45921 12.4567C8.55766 12.5551 8.61297 12.6887 8.61297 12.8279C8.61297 12.9671 8.55766 13.1007 8.45921 13.1991C8.36075 13.2976 8.22721 13.3529 8.08798 13.3529L8.08598 13.3519Z" fill="#8A8A8A"/>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="offset-lg-1 col-lg-3">
        <h3 class="mb-6">其他分類</h3>
        <ul class="list-unstyled pb-x1 mb-5 border-bottom border-gray3">
          <?php foreach( $cat_terms as $term ) : ?>
            <li class="mb-x1">
              <a href="<?php echo get_term_link($term) ?>" class="tab-link tab-link-single">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none" >
                  <path d="M11.383 16.5871L14.9924 12.9777C15.1216 12.8487 15.2241 12.6956 15.2941 12.527C15.364 12.3584 15.4 12.1777 15.4 11.9952C15.4 11.8127 15.364 11.6319 15.2941 11.4634C15.2241 11.2948 15.1216 11.1416 14.9924 11.0127L11.383 7.4033C10.5051 6.53927 9 7.15245 9 8.39275V15.5976C9 16.8518 10.5051 17.465 11.383 16.5871Z" fill="#8A8A8A"/>
                </svg>
                <span class="h4">
                  <?php echo $term -> name ?>
                </span>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
        <h3 class="mb-6">文章推薦</h3>
        <?php
          $args = array(
            'post_type' => get_post_type(),
            'posts_per_page' => 3,
            'post_status' => 'publish',
          );
          $query = new WP_Query($args);
          if ( $query -> have_posts() ) {
            while ( $query -> have_posts() ) {
              $query -> the_post();
              get_template_part( 'template-parts/content', 'cardsingle' );
            }
          } else {
            get_template_part( 'template-parts/content', 'none' );
          }
        ?>
      </div>
    </div>
  </div>
  <div class="position-absolute h-100 w-32 end-0 top-0 bg-gray2"></div>
</div>

<?php get_footer(); ?>
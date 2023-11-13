<?php
  $page_info = get_queried_object();
  $terms = get_terms(
    array(
      'taxonomy' => $page_info -> taxonomy,
      'hide_empty' => false,
    )
  );
  foreach( $terms as $key => $term ) {
    if ($term -> parent === 0) {
      unset($terms[$key]);
    }
  }
  $post_type = get_post_type();
?>
<!-- banner -->
<?php get_template_part('components/component-banner') ?>
<!-- banner -->

<section class="position-relative ">
  <div class="container position-relative z-index-1">
    <div class="row">
      <div class="col-lg-2 inner-y-l inner-sm-y-l pe-0">
        <div class="pe-5">
          <div class="position-relative mb-5">
            <form role="search" method="get" class="post-search-form" data-searchway="keyword" id="searchform" action="<?php echo home_url( '/' ); ?>">
              <input type="hidden" name="post_type" value="<?php echo $post_type ?>">
              <input type="text" value="" name="s" id="s" placeholder="搜尋..." class="form-control">
              <!-- <input type="submit" id="searchsubmit" value="" class="arch-search-submit position-absolute end-0 top-50 translate-middle d-flex align-items-center"> -->
              <button
                type="submit"
                class="position-absolute end-0 top-50 translate-middle d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <path d="M7.20004 0.600098C8.42871 0.600021 9.63301 0.942918 10.6774 1.59019C11.7217 2.23746 12.5647 3.1634 13.1113 4.26377C13.6579 5.36415 13.8865 6.59526 13.7714 7.81853C13.6563 9.04179 13.202 10.2086 12.4596 11.1877L17.436 16.1641C17.5956 16.3249 17.6886 16.5399 17.6966 16.7663C17.7046 16.9927 17.6269 17.2138 17.4791 17.3854C17.3312 17.557 17.1241 17.6666 16.899 17.6922C16.674 17.7179 16.4475 17.6577 16.2648 17.5237L16.164 17.4361L11.1876 12.4597C10.3531 13.0923 9.38006 13.5173 8.34884 13.6994C7.31761 13.8816 6.25784 13.8158 5.25708 13.5075C4.25632 13.1991 3.3433 12.657 2.59346 11.926C1.84362 11.195 1.27848 10.2961 0.944742 9.30353C0.611001 8.31094 0.518238 7.25319 0.674116 6.21766C0.829995 5.18214 1.23004 4.19857 1.8412 3.34822C2.45236 2.49787 3.25709 1.80515 4.1889 1.3273C5.12071 0.84945 6.15285 0.600184 7.20004 0.600098ZM7.20004 2.4001C5.927 2.4001 4.7061 2.90581 3.80593 3.80598C2.90575 4.70616 2.40004 5.92706 2.40004 7.2001C2.40004 8.47314 2.90575 9.69404 3.80593 10.5942C4.7061 11.4944 5.927 12.0001 7.20004 12.0001C8.47308 12.0001 9.69398 11.4944 10.5942 10.5942C11.4943 9.69404 12 8.47314 12 7.2001C12 5.92706 11.4943 4.70616 10.5942 3.80598C9.69398 2.90581 8.47308 2.4001 7.20004 2.4001Z" fill="#CACACA"/>
                </svg>
              </button>
            </form>
          </div>
        </div>
        <ul class="list-unstyled">
          <?php foreach( $terms as $key => $term ) : ?>
            <?php $active_class = $term -> term_id === $page_info  -> term_id ? 'active' : ''; ?>
            <li>
              <a href="<?php echo get_term_link($term) ?>" class="tab-link tab-link-archive <?php echo $active_class ?>">
                <?php echo $term -> name ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
      <div class="col-lg-1 bg-gray3"></div>
      <div class="col-lg-9 bg-gray3 inner-y-l inner-sm-y-l">
        <div class="row row-gap-x5">
          <?php
            if ( have_posts() ) {
              while( have_posts() ) {
                the_post();
                if ( is_tax('tax_coating_knowled') ) {
                  get_template_part( 'template-parts/content-card' );
                } elseif ( is_tax('tax_video') ) {
                  get_template_part( 'template-parts/content-videocard' );
                }
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
            } else {
              get_template_part( 'template-parts/content-none' );
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="position-absolute w-50 h-100 top-0 end-0 bg-gray3"></div>
</section>
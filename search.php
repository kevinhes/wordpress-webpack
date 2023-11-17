<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package design_hu_webpack
 */

get_header();
$post_arr = array();
$count = 0;
if ( have_posts() ) {
  while( have_posts() ) {
    the_post();
    $count ++;
  }
}
?>

	<main id="primary" class="site-main">
    <section class="container inner-top-l inner-bottom-l inner-sm-top-l inner-sm-bottom-l mt-15">
      <?php if ( have_posts() ) : ?>

        <header class="page-header layout-bottom-s layout-sm-bottom-s">
          <h4>
            <span>搜尋</span>
            <span class="text-primary">
              “<?php echo get_search_query()?>”
            </span>
            <span>
            ，共
            </span>
            <span class="text-primary">
              <?php echo $count ?>
            </span>
            <span>
              筆結果。
            </span>
          </h4>
        </header><!-- .page-header -->

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
          the_post();
          $post_type = get_post_type();
          $title = get_the_title();
          $thumbnail_url = get_the_post_thumbnail_url();
          $link = get_permalink();
          $excerpt = get_the_excerpt();
          $fields = get_fields();
          $date = get_the_Date();

          // Create a new array to store the post data
          $current_post = array(
            'id' => get_the_ID(),
            'post_type' => $post_type,
            'date' => get_the_date(),
            'content' => get_the_content(),
            'title' => $title,
            'thumbnail_url' => $thumbnail_url,
            'link' => $link,
            'excerpt' => $excerpt,
            'date' => $date,
          );

          // If there are ACF fields, add them to the current post array
          if ($fields) {
              foreach ($fields as $field_name => $value) {
                  $current_post[$field_name] = $value;
              }
          }

          // Add the current post array to the main post array
          $post_arr[] = $current_post;
          // get_template_part( 'template-parts/content', 'search' );
        endwhile;
        $post_products = array();
          $post_case = array();
          $post_knowledge = array();
          $post_video = array();
          $post_news = array();
          foreach( $post_arr as $post  ) {
            if ( $post['post_type'] === 'type_products' ) {
              $post_products[] = $post;
            } elseif ( $post['post_type'] === 'type_case' ) {
              $post_case[] = $post;
            } elseif ( $post['post_type'] === 'type_coating_knowled' ) {
              $post_knowledge[] = $post;
            } elseif ( $post['post_type'] === 'type_video' ) {
              $post_video[] = $post;
            } elseif ( $post['post_type'] === 'type_news' ) {
              $post_news[] = $post;
            }
          }
          if ( $post_products) : ?>
            <h3 class="pb-x1 border-bottom border-gray4 mb-5">產品介紹</h3>
            <ul class="list-unstyled row row-gap-5 search-result layout-bottom-s layout-sm-bottom-s">
              <?php foreach( $post_products as $product_post ) : ?>
                <li class="col-lg-3 search-item search-item-product position-relaitve">
                  <div class="w-100 mb-x1 search-item-product-img overflow-hidden rounded-5px">
                    <img src="<?php echo $product_post['thumbnail_url'] ?>" alt="" class="w-100 h-100 object-cover">
                  </div>
                  <h4>
                    <?php echo $product_post['title'] ?>
                  </h4>
                  <a href="<?php echo $product_post['link'] ?>" class="stretched-link"></a>
                </li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <?php if($post_case) : ?>
            <h3 class="pb-x1 border-bottom border-gray4 mb-5">實績案例</h3>
            <ul class="list-unstyled row row-gap-5 search-result layout-bottom-s layout-sm-bottom-s">
              <?php foreach( $post_case as $case_post ) : ?>
                <li class="search-item search-item-case position-relative">
                <div class="card-with-overlay">
                  <img src="<?php echo $case_post['thumbnail_url'] ?>" alt="" class="w-100 h-100 object-cover">
                  <div class="card-overlay py-2 px-3 position-absolute w-100 h-100 top-0 start-0 d-flex align-items-end justify-content-between">
                    <div class="w-77">
                      <p class="text-samll text-secondary">
                        室內案例
                      </p>
                      <p class="text-light">
                        <?php echo $case_post['title'] ?>
                      </p>
                    </div>
                    <div class="w-21 bg-dark rounded-5px opacity-50 p-1 position-relative z-index-5">
                      <a href="#" class="addQaBtn text-light" data-postid="<?php echo $case_post['id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                          <g clip-path="url(#clip0_741_3794)">
                            <path d="M6.52574 4.125C5.50956 4.125 4.6875 4.94706 4.6875 5.96324C4.6875 6.03636 4.71655 6.1065 4.76826 6.15821C4.81997 6.20992 4.89011 6.23897 4.96324 6.23897C5.03636 6.23897 5.1065 6.20992 5.15821 6.15821C5.20992 6.1065 5.23897 6.03636 5.23897 5.96324C5.23897 5.25147 5.81397 4.67647 6.52574 4.67647C7.2375 4.67647 7.8125 5.25147 7.8125 5.96324C7.8125 6.27647 7.73088 6.48529 7.61802 6.64706C7.4989 6.81728 7.33603 6.94963 7.13934 7.1L7.0886 7.1386C6.71728 7.42096 6.25 7.7761 6.25 8.53676V8.62868C6.25 8.70181 6.27905 8.77194 6.33076 8.82365C6.38247 8.87536 6.45261 8.90441 6.52574 8.90441C6.59887 8.90441 6.669 8.87536 6.72071 8.82365C6.77242 8.77194 6.80147 8.70181 6.80147 8.62868V8.53676C6.80147 8.05257 7.06397 7.85184 7.45772 7.55073L7.47463 7.53787C7.66838 7.38971 7.89632 7.21176 8.07022 6.96287C8.25037 6.70515 8.36397 6.38566 8.36397 5.96324C8.36397 4.94706 7.54191 4.125 6.52574 4.125ZM6.52574 10.375C6.62324 10.375 6.71675 10.3363 6.7857 10.2673C6.85465 10.1984 6.89338 10.1049 6.89338 10.0074C6.89338 9.90985 6.85465 9.81633 6.7857 9.74739C6.71675 9.67844 6.62324 9.63971 6.52574 9.63971C6.42823 9.63971 6.33472 9.67844 6.26577 9.74739C6.19682 9.81633 6.15809 9.90985 6.15809 10.0074C6.15809 10.1049 6.19682 10.1984 6.26577 10.2673C6.33472 10.3363 6.42823 10.375 6.52574 10.375Z" fill="#CACACA"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.520833 7.25C0.520833 10.4141 3.08587 12.9792 6.25 12.9792C9.41413 12.9792 11.9792 10.4141 11.9792 7.25C11.9792 4.08587 9.41413 1.52083 6.25 1.52083C3.08587 1.52083 0.520833 4.08587 0.520833 7.25ZM6.25 1C2.79822 1 0 3.79822 0 7.25C0 10.7018 2.79822 13.5 6.25 13.5C9.70178 13.5 12.5 10.7018 12.5 7.25C12.5 3.79822 9.70178 1 6.25 1Z" fill="#CACACA"/>
                          </g>
                          <defs>
                            <clipPath id="clip0_741_3794">
                              <rect y="0.5" width="13" height="13" rx="6.5" fill="white"/>
                            </clipPath>
                          </defs>
                        </svg>
                        <span class="text-small">
                          加入提問箱
                        </span>
                      </a>
                    </div>
                    <a href="<?php echo $case_post['link'] ?>" class="stretched-link"></a>
                  </div>
                </div>
                </li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <?php if($post_knowledge) : ?>
            <h3 class="pb-x1 border-bottom border-gray4 mb-5">塗料知識+</h3>
            <ul class="list-unstyled row-gap-5 search-result
            row layout-bottom-s layout-sm-bottom-s">
              <?php foreach($post_knowledge as $knowledge) : ?>
                <?php
                  $terms = get_the_terms($knowledge['id'], 'tax_coating_knowled');
                  foreach ( $terms as $key => $term ) {
                    if ($term -> parent === 0) {
                      unset($terms[$key]);
                    }
                  }
                ?>
                <li class="col-3">
                  <div class="card card-info bg-light">
                    <div class="card-img-top">
                      <img src="<?php echo $knowledge['thumbnail_url'] ?>" alt="" class="w-100 h-100 object-cover">
                    </div>
                    <div class="card-content p-x1">
                      <div class="d-flex align-items-center mb-x1">
                        <ul class="list-unstyled d-flex">
                          <?php foreach( $terms as $term ) : ?>
                            <li class="me-2">
                              <p class="btn btn-secondary20 text-small">
                                <?php echo $term ->name ?>
                              </p>
                            </li>
                          <?php endforeach ?>
                        </ul>
                        <p class="text-small text-end">
                          <?php echo $knowledge['date'] ?>
                        </p>
                      </div>
                      <h4><?php echo $knowledge['title'] ?></h4>
                      <p class="mul-ellipsis text-small">
                        <?php 
                          echo $knowledge['excerpt'];
                        ?>
                      </p>
                    </div>
                    <a href="<?php echo $knowledge['link']; ?>" class="stretched-link"></a>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <?php if($post_video) : ?>
            <h3 class="pb-x1 border-bottom border-gray4 mb-5">影音專區</h3>
            <ul class="list-unstyled row-gap-5 search-result
            row layout-bottom-s layout-sm-bottom-s">
              <?php foreach($post_video as $video) : ?>
                <?php
                  $terms = get_the_terms($video['id'], 'tax_video');
                  foreach ( $terms as $key => $term ) {
                    if ($term -> parent === 0) {
                      unset($terms[$key]);
                    }
                  }
                ?>
                <li class="col-4">
                  <div class="card card-info card-info-video bg-light">
                    <div class="card-img-top position-relative">
                      <img src="<?php echo $video['thumbnail_url'] ?>" alt="" class="w-100 h-100 object-cover">
                      <div class="card-img-overlay">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                          <g clip-path="url(#clip0_741_4589)">
                            <g filter="url(#filter0_d_741_4589)">
                              <path d="M56.25 30C56.2515 30.6366 56.0883 31.2628 55.7762 31.8176C55.4641 32.3725 55.0136 32.8371 54.4688 33.1664L20.7 53.8242C20.1307 54.1728 19.4786 54.3631 18.8111 54.3755C18.1436 54.3878 17.485 54.2218 16.9031 53.8945C16.3268 53.5723 15.8467 53.1023 15.5123 52.5331C15.1778 51.9638 15.001 51.3157 15 50.6554V9.34448C15.001 8.68421 15.1778 8.03611 15.5123 7.46683C15.8467 6.89756 16.3268 6.42764 16.9031 6.10542C17.485 5.77811 18.1436 5.61206 18.8111 5.62442C19.4786 5.63678 20.1307 5.8271 20.7 6.17573L54.4688 26.8335C55.0136 27.1628 55.4641 27.6274 55.7762 28.1823C56.0883 28.7371 56.2515 29.3633 56.25 30Z" fill="white" fill-opacity="0.8" shape-rendering="crispEdges"/>
                            </g>
                          </g>
                          <defs>
                            <filter id="filter0_d_741_4589" x="-5" y="-14.3762" width="81.25" height="88.7524" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                              <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                              <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                              <feOffset/>
                              <feGaussianBlur stdDeviation="10"/>
                              <feComposite in2="hardAlpha" operator="out"/>
                              <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0"/>
                              <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_741_4589"/>
                              <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_741_4589" result="shape"/>
                            </filter>
                            <clipPath id="clip0_741_4589">
                              <rect width="60" height="60" fill="white"/>
                            </clipPath>
                          </defs>
                        </svg>
                      </div>
                    </div>
                    <div class="card-content p-x1">
                      <div class="d-flex align-items-center mb-x1">
                        <ul class="list-unstyled d-flex">
                          <?php foreach( $terms as $term ) : ?>
                            <li class="me-2">
                              <p class="btn btn-secondary20 text-small">
                                <?php echo $term ->name ?>
                              </p>
                            </li>
                          <?php endforeach ?>
                        </ul>
                        <p class="text-small text-end">
                          <?php echo $video['date'] ?>
                        </p>
                      </div>
                      <h4><?php echo $video['title'] ?></h4>
                      <p class="mul-ellipsis text-small">
                        <?php echo $video['excerpt'] ?>
                      </p>
                    </div>
                    <a href="<?php echo $video['link'] ?>" class="stretched-link"></a>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <?php if($post_news) : ?>
            <h3 class="pb-x1 border-bottom border-gray4 mb-5">影音專區</h3>
            <ul class="list-unstyled row-gap-5 search-result
            row layout-bottom-s layout-sm-bottom-s">
              <?php foreach($post_news as $news) : ?>
                <?php
                  $terms = get_the_terms($news['id'], 'tax_news');
                  foreach ( $terms as $key => $term ) {
                    if ($term -> parent === 0) {
                      unset($terms[$key]);
                    }
                  }
                ?>
                <li class="col-3">
                  <div class="card card-info bg-light">
                    <div class="card-img-top">
                      <img src="<?php echo $news['thumbnail_url'] ?>" alt="" class="w-100 h-100 object-cover">
                    </div>
                    <div class="card-content p-x1">
                      <div class="d-flex align-items-center mb-x1">
                        <ul class="list-unstyled d-flex">
                          <?php foreach( $terms as $term ) : ?>
                            <li class="me-2">
                              <p class="btn btn-secondary20 text-small">
                                <?php echo $term ->name ?>
                              </p>
                            </li>
                          <?php endforeach ?>
                        </ul>
                        <p class="text-small text-end">
                          <?php echo $news['date'] ?>
                        </p>
                      </div>
                      <h4><?php echo $news['title'] ?></h4>
                      <p class="mul-ellipsis text-small">
                        <?php 
                          echo $news['excerpt'];
                        ?>
                      </p>
                    </div>
                    <a href="<?php echo $news['link']; ?>" class="stretched-link"></a>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>

      <?php
          // the_posts_navigation();
      else :

        get_template_part( 'template-parts/content', 'none' );

      endif;
      ?>
    </section>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();

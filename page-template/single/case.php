<?php
  require get_template_directory() . '/inc/post-arr.php';
  $banner_bg_img = get_field('banner_bg_img');
  $case_gallery = get_field('case_gallery');
  $terms = get_the_terms(get_the_ID(), 'tax_case');
  $catTitle = '';
  foreach( $terms as $key => $term ) {
    if ( $term -> parent === 0 ) {
      unset($terms[$key]);
    } else {
      $catTitle = $term -> name;
    }
  }
  $color_list = get_field('color_list');
  $search_icon = wp_get_attachment_url(83, 'full');
  $color_arr = [];
  foreach( $color_list as $color ) {
    $hex = get_field('hex', $color['color'] -> ID);
    $color_arr[] = $hex;
  }
  $products_arr = output_post('type_products', -1);
  wp_localize_script( 'single-case-script', 'search_icon', $search_icon );
  wp_localize_script( 'single-case-script', 'color_arr', $color_arr );
?>

<div class="banner-s position-relative">
  <img src="<?php echo $banner_bg_img['url'] ?>" alt="banner image" class="position-absolute w-100 h-100 top-0 start-0 object-cover">
</div>
<div class="container">
  <?php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs layout-bottom-s layout-sm-bottom-s">','</div>' );
    }
  ?>
  <!-- upper content -->
  <div class="row case-content">
    <div class="col-lg-5">
      <!-- main content -->
      <h4 class="text-secondary mb-5">
        <?php echo $catTitle ?>
      </h4>
      <h2 class="layout-bottom-s layout-sm-bottom-s"><?php echo get_the_title() ?></h2>
      <div class="editor-content text-gray6 layout-bottom-s layout-sm-bottom-s">
        <?php the_content() ?>
      </div>
      <!-- color list -->
      <ul class="cirlce-list list-unstyled d-flex flex-wrap">
        <?php foreach($color_list as $color) : ?>
          <?php
            $hex = get_field('hex', $color['color'] -> ID);
            $rgb = get_field('rgb', $color['color'] -> ID);
            $cmyk = get_field('cmyk', $color['color'] -> ID);
            $title = $color['color'] -> post_title;
          ?>
          <li class="me-5 mb-5">
            <button
              type="button"
              data-bs-toggle="popover"
              class="circle-block <?php echo $hex === 'ffffff' ? 'border' : '' ?>"
              style="background-color: #<?php echo $hex ?>"
              data-bs-placement="bottom"
              data-title="<?php echo $title ?>"
              data-rgb="<?php echo $rgb ?>"
              data-cymk="<?php echo $cmyk ?>"
              data-hex="<?php echo $hex ?>">
            </button>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
    <!-- question box -->
    <div class="col-lg-1">
      <div class="d-flex justify-content-end">
        <button type="button">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
            <rect x="1" y="1" width="38" height="38" rx="19" stroke="#CFAE8E" stroke-width="2"/>
            <path d="M19.8824 10C16.6306 10 14 12.6306 14 15.8824C14 16.1164 14.093 16.3408 14.2584 16.5063C14.4239 16.6717 14.6483 16.7647 14.8824 16.7647C15.1164 16.7647 15.3408 16.6717 15.5063 16.5063C15.6717 16.3408 15.7647 16.1164 15.7647 15.8824C15.7647 13.6047 17.6047 11.7647 19.8824 11.7647C22.16 11.7647 24 13.6047 24 15.8824C24 16.8847 23.7388 17.5529 23.3776 18.0706C22.9965 18.6153 22.4753 19.0388 21.8459 19.52L21.6835 19.6435C20.4953 20.5471 19 21.6835 19 24.1176V24.4118C19 24.6458 19.093 24.8702 19.2584 25.0357C19.4239 25.2012 19.6483 25.2941 19.8824 25.2941C20.1164 25.2941 20.3408 25.2012 20.5063 25.0357C20.6717 24.8702 20.7647 24.6458 20.7647 24.4118V24.1176C20.7647 22.5682 21.6047 21.9259 22.8647 20.9624L22.9188 20.9212C23.5388 20.4471 24.2682 19.8776 24.8247 19.0812C25.4012 18.2565 25.7647 17.2341 25.7647 15.8824C25.7647 12.6306 23.1341 10 19.8824 10ZM19.8824 30C20.1944 30 20.4936 29.8761 20.7142 29.6554C20.9349 29.4348 21.0588 29.1355 21.0588 28.8235C21.0588 28.5115 20.9349 28.2123 20.7142 27.9916C20.4936 27.771 20.1944 27.6471 19.8824 27.6471C19.5703 27.6471 19.2711 27.771 19.0505 27.9916C18.8298 28.2123 18.7059 28.5115 18.7059 28.8235C18.7059 29.1355 18.8298 29.4348 19.0505 29.6554C19.2711 29.8761 19.5703 30 19.8824 30Z" fill="#CFAE8E"/>
          </svg>
        </button>
      </div>
    </div>
    <!-- picture swiper -->
    <div class="col-lg-6">
      <div class="swiper productMainSwiper mb-x1">
        <div class="swiper-wrapper">
          <?php foreach( $case_gallery as $key => $image ) : ?>
          <div class="swiper-slide">
            <img src="<?php echo $image['url'] ?>" alt="swiper image <?php echo $key + 1 ?>" class="w-100">
          </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="swiper productThumbSwiper mb-x1" thumbsSlider="">
        <div class="swiper-wrapper">
          <?php foreach( $case_gallery as $key => $image ) : ?>
          <div class="swiper-slide">
            <img src="<?php echo $image['url'] ?>" alt="swiper image <?php echo $key + 1 ?>" class="w-100">
          </div>
          <?php endforeach ?>
        </div>
        <div class="swiper-button-next">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.78 12.7199C15.9207 12.5793 15.9998 12.3887 16 12.1899V11.8099C15.9977 11.6114 15.9189 11.4216 15.78 11.2799L10.64 6.14985C10.5461 6.0552 10.4183 6.00195 10.285 6.00195C10.1517 6.00195 10.0239 6.0552 9.93 6.14985L9.22 6.85985C9.12594 6.95202 9.07293 7.07816 9.07293 7.20985C9.07293 7.34154 9.12594 7.46769 9.22 7.55985L13.67 11.9999L9.22 16.4399C9.12534 16.5337 9.0721 16.6615 9.0721 16.7949C9.0721 16.9282 9.12534 17.056 9.22 17.1499L9.93 17.8499C10.0239 17.9445 10.1517 17.9978 10.285 17.9978C10.4183 17.9978 10.5461 17.9445 10.64 17.8499L15.78 12.7199Z" fill="white"/>
          </svg>
        </div>
        <div class="swiper-button-prev">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.22 12.7199C8.07931 12.5793 8.00018 12.3887 8 12.1899V11.8099C8.0023 11.6114 8.08112 11.4216 8.22 11.2799L13.36 6.14985C13.4539 6.0552 13.5817 6.00195 13.715 6.00195C13.8483 6.00195 13.9761 6.0552 14.07 6.14985L14.78 6.85985C14.8741 6.95202 14.9271 7.07816 14.9271 7.20985C14.9271 7.34154 14.8741 7.46769 14.78 7.55985L10.33 11.9999L14.78 16.4399C14.8747 16.5337 14.9279 16.6615 14.9279 16.7949C14.9279 16.9282 14.8747 17.056 14.78 17.1499L14.07 17.8499C13.9761 17.9445 13.8483 17.9978 13.715 17.9978C13.5817 17.9978 13.4539 17.9445 13.36 17.8499L8.22 12.7199Z" fill="white"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
  <!-- product list -->
  <div class="row layout-bottom-l layout-sm-bottom-l">
    <?php foreach( $products_arr as $product ) : ?>
      <div class="col-lg-3">
        <div class="square-card w-100 p-8 position-relative">
          <div class="position-relative z-index-2">
            <h5 class="text-center h2 mb-x1">
              <?php echo $product['title'] ?>
            </h5>
            <p class="text-medium text-center">
              <?php echo $product['excerpt'] ?>
            </p>
          </div>
          <div class="position-absolute w-100 h-100 top-0 start-0">
            <img src="<?php echo $product['square_img']['url'] ?>" alt="" class="w-100 h-100 object-cover">
          </div>
          <div class="link z-index-2">
            <a href="<?php echo $product['link'] ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                <rect x="40.5" width="40" height="40" rx="20" transform="rotate(90 40.5 0)" fill="#CFAE8E"/>
                <path d="M21.9313 28.3945C21.8909 28.3541 21.8588 28.3062 21.837 28.2534C21.8151 28.2006 21.8038 28.1441 21.8038 28.0869C21.8038 28.0298 21.8151 27.9732 21.837 27.9204C21.8588 27.8676 21.8909 27.8197 21.9313 27.7793L29.0149 20.6957H10.9348C10.8195 20.6957 10.7089 20.6499 10.6273 20.5684C10.5458 20.4869 10.5 20.3763 10.5 20.261C10.5 20.1457 10.5458 20.0351 10.6273 19.9535C10.7089 19.872 10.8195 19.8262 10.9348 19.8262H29.0149L21.9313 12.7426C21.8909 12.7022 21.8589 12.6543 21.837 12.6015C21.8152 12.5487 21.8039 12.4921 21.8039 12.435C21.8039 12.3779 21.8152 12.3213 21.837 12.2685C21.8589 12.2158 21.8909 12.1678 21.9313 12.1274C21.9717 12.087 22.0197 12.055 22.0725 12.0331C22.1252 12.0113 22.1818 12 22.2389 12C22.2961 12 22.3526 12.0113 22.4054 12.0331C22.4582 12.055 22.5061 12.087 22.5465 12.1274L30.3725 19.9534C30.4129 19.9937 30.445 20.0417 30.4669 20.0945C30.4887 20.1473 30.5 20.2038 30.5 20.261C30.5 20.3181 30.4887 20.3747 30.4669 20.4275C30.445 20.4802 30.4129 20.5282 30.3725 20.5686L22.5465 28.3945C22.5062 28.4349 22.4582 28.467 22.4054 28.4889C22.3526 28.5108 22.2961 28.522 22.2389 28.522C22.1818 28.522 22.1252 28.5108 22.0724 28.4889C22.0197 28.467 21.9717 28.4349 21.9313 28.3945Z" fill="white"/>
              </svg>
            </a>
          </div>
          <div class="position-absolute w-100 h-100 top-0 start-0 overlay"></div>
          <div class="position-absolute w-100 h-100 top-0 start-0 bg-overlay z-index-1"></div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>
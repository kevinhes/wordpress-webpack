<?php
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
  <div class="row">
    <div class="col-lg-5">
      <h4 class="text-secondary mb-5">
        <?php echo $catTitle ?>
      </h4>
      <h2 class="layout-bottom-s layout-sm-bottom-s"><?php echo get_the_title() ?></h2>
      <div class="editor-content text-gray6 layout-bottom-s layout-sm-bottom-s">
        <?php the_content() ?>
      </div>
      <ul class="cirlce-list list-unstyled d-flex flex-wrap">
        <?php foreach($color_list as $color) : ?>
          <?php
            $hex = get_field('hex', $color['color'] -> ID);
            $rgb = get_field('rgb', $color['color'] -> ID);
            $cmyk = get_field('cmyk', $color['color'] -> ID);
            $title = $color['color'] -> post_title;
          ?>
          <li class="me-5">
            <button
              type="button"
              data-bs-toggle="popover"
              class="circle-block"
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
    <div class="col-lg-1"></div>
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
      </div>
    </div>
  </div>
</div>
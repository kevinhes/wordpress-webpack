<?php 
  $banner_img = '';
  $page_info = '';
  $title = '';
  $content = '';
  if ( is_archive() ) {
    $page_info = get_queried_object();
    $acf_slug_name = $page_info -> taxonomy . '_' . $page_info -> term_id;
    $banner_img = get_field('banner_bg_img', $acf_slug_name);
    $title = $page_info -> name;
    $content = $page_info -> description;
  } elseif ( is_page() ) {
    $banner_img = get_field('banner_bg_img');
    $title = get_the_title();
    $content = get_the_content();
  }
?>

<div class="banner position-relative d-flex align-items-center bg-gray3">
  <!-- content -->
  <div class="container position-relative z-index-2">
    <div class="row">
      <div class="offset-lg-1 col-lg-6">
        <div class="p-10 bg-light box-shadow-lg">
          <h1 class="mb-10"><?php echo $title ?></h1>
          <h4 class="text-gray5 mb-0"><?php echo $content ?></h4>
        </div>
      </div>
    </div>
  </div>
  <!-- content -->

  <!-- bg -->
  <div class="position-absolute w-64 h-100 end-0 top-0 z-index-1">
    <img src="<?php echo $banner_img['url'] ?>" alt="" class="full-img-setting">
  </div>
  <!-- bg -->

  <!-- deco -->
  <div class="pt-15 position-absolute start-0 end-0 h-100 top-0">
    <div class="bg-banner h-100">
      <div class="container h-100">
        <div class="row bg-gray3 h-100"></div>
      </div>
    </div>
  </div>
  <!-- deco -->
</div>
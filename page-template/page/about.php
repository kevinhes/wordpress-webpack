<!-- banner -->
<?php
  get_template_part('components/component-dropdown-banner');
  $main_img_block = get_field('main_img_block');
  $sub_img_block = get_field('sub_img_block');
  $mid_banner = get_field('mid_banner');
  $history_sec = get_field('history_sec');
  $product_time_line = get_field('product_time_line');
?>
<!-- banner -->

<div class="container position-relative">
  <?php
  if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs layout-bottom-l layout-sm-bottom-l">','</div>' );
  }
  ?>
  <div class="main-img-block position-relative layout-bottom-s layout-sm-bottom-s">
    <div class="row position-relative z-index-1">
      <div class="col-lg-4">
      <img src="<?php echo $main_img_block['sub_img']['url'] ?>" class="w-100">
      </div>
      <div class="col-lg-6">
      <img src="<?php echo $main_img_block['main_img']['url'] ?>" class="w-100">
      </div>
    </div>
    <div class="row position-absolute start-0 end-0 absolute-block z-index-2">
      <div class="offset-lg-2 col-lg-4">
        <div class="py-5 px-10 bg-light rounded-5px box-shadow">
          <h2 class="mb-5"><?php echo $main_img_block['title'] ?></h2>
          <p class="text-medium"><?php echo $main_img_block['content'] ?></p>
        </div>
      </div>
    </div>
    <div class="row position-absolute start-0 end-0 absolute-block h-100">
      <div class="offset-lg-8 col-lg-3">
        <div class="w-100 bg-secondary h-55 opacity-20"></div>
      </div>
    </div>
  </div>

  <div class="sub-img-block position-relative layout-bottom-l layout-sm-bottom-l">
    <div class="position-relative row z-index-3">
      <div class="offset-lg-5 col-lg-4 mb-5">
        <div class="py-5 px-10 bg-light box-shadow rounded-5px">
          <h2 class="mb-5">
            <?php echo $sub_img_block['title'] ?>
          </h2>
          <p class="text-medim">
            <?php echo $sub_img_block['content'] ?>
          </p>
        </div>
      </div>
      <div class="offset-lg-6 col-lg-2">
        <img src="<?php echo $sub_img_block['gallery'][0]['url'] ?>" class="w-100">
      </div>
      <div class="col-lg-2">
        <img src="<?php echo $sub_img_block['gallery'][1]['url'] ?>" class="w-100">
      </div>
      <div class="col-lg-2">
        <img src="<?php echo $sub_img_block['gallery'][2]['url'] ?>" class="w-100">
      </div>
    </div>
    <div class="row position-absolute z-index-1 top-0 start-0 end-0">
      <div class="col-lg-7">
        <img src="<?php echo $sub_img_block['main_img']['url'] ?>" class="w-100">
      </div>
    </div>
    <!-- <div class="row position-absolute z-index-2 top-0 start-0 end-0 h-100">
      <div class="offset-lg-4 col-lg-3 inner-top-l inner-sm-top-l">
        <div class="bg-secondary opacity-20 h-100"></div>
      </div>
    </div> -->
  </div>
</div>

<!-- mid banner -->
<div class="banner-s d-flex align-items-center position-relative">
  <div class="container position-relative z-index-1">
    <div class="row">
      <div class="col-lg-5 text-light">
        <h2 class="mb-5"><?php echo $mid_banner['title'] ?></h2>
        <p class="mb-0">
        <?php echo $mid_banner['content'] ?>
        </p>
      </div>
    </div>
  </div>
  <div class="position-absolute w-100 h-100 top-0 start-0">
    <img src="<?php echo $mid_banner['bg_img']['url'] ?>" alt="" class="w-100 h-100 object-cover">
  </div>
</div>
<!-- mid banner -->

<!-- history section -->
<section class="inner-y-l inner-sm-y-l text-light position-relative">
  <div class="container position-relative z-index-1">
    <div class="row align-items-center layout-bottom-l layout-sm-bottom-l">
      <div class="col-lg-4">
        <img src="<?php echo $history_sec['aside_img']['url'] ?>"  alt="aside image" class="w-100">
      </div>
      <div class="offset-lg-1 col-lg-7">
        <h2 class="mb-5"><?php echo $history_sec['title'] ?></h2>
        <p class="mb-0"><?php echo $history_sec['content'] ?></p>
      </div>
    </div>
    <?php $history_sec_len = count($history_sec) - 1 ?>
    <?php foreach( $history_sec['content_list'] as $key => $content ) : ?>
      <?php $final_class = $key === $history_sec_len ? '' : 'layout-bottom-l layout-sm-bottom-l' ?>
      <div class="row <?php echo $final_class ?>">
        <div class="col-lg-7">
          <h2 class="mb-5">
            <?php echo $content['title'] ?>
          </h2>
          <p class="mb-0">
            <?php echo $content['content'] ?>
          </p>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <div class="position-absolute w-100 h-100 top-0 start-0">
    <img src="<?php echo $history_sec['bg_img']['url'] ?>" alt="background image" class="w-100 h-100 object-cover">
  </div>
</section>

<!-- time line -->
<?php if ( is_page('keim-stories') ) : ?>
<section class="pt-20 inner-bottom-l inner-sm-bottom-l">
  <div class="container">
    <div class="row">
      <?php foreach( $product_time_line as $time ) : ?>
        <div class="col-lg-4">
          <div class="d-flex flex-column h-100">
            <div class="row position-relative top-5">
              <div class="offset-3 col-6">
                <img src="<?php echo $time['image']['url'] ?>" alt="time image" class="w-100">
              </div>
            </div>
            <div class="box-shadow pt-10 px-5 pb-5 flex-grow-1">
              <h2 class="text-secondary mb-0 text-center">
                <?php echo $time['time'] ?>
              </h2>
              <h2 class="mb-x1 text-center">
              <?php echo $time['title'] ?>
              </h2>
              <h4 class="text-center mb-x1">
                <?php echo $time['subtitle'] ?>
              </h4>
              <p class="text-gray5 mb-0">
                <?php echo $time['content'] ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>
<?php endif ?>
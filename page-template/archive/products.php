<?php
require get_template_directory() . '/inc/post-arr.php';
$products_arr = output_post('type_products', -1);
$logo_bg = wp_get_attachment_url( 106 ,'full');
?>

<!-- banner -->
<?php get_template_part('components/component-banner') ?>
<!-- banner -->

<section class="bg-gray2 inner-y-l inner-sm-y-l position-relative">
  <div class="position-relative z-index-2">
    <div class="container position-relative z-index-3">
      <?php foreach( $products_arr as $key => $product ) : ?>
      <div class="row">
        <div class="offset-lg-1 col-lg-9 bg-light py-5">
          <div class="position-relative pe-x1 w-100 d-flex justify-content-end">
            <!-- card content -->
            <div class="card-content rounded-5px position-absolute top-50 translate-middle-y bg-gray2 p-10 start-0">
              <div class="d-flex">
                <div class="pe-5">
                  <h2 class="mb-5"><?php echo $product['title'] ?></h2>
                  <h4 class="text-gray4"><?php echo $product['excerpt'] ?></h4>
                </div>
                <a class="card-link d-flex align-items-center" href="<?php echo $product['link'] ?>">
                  <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="40" y="0.5" width="40" height="40" rx="20" transform="rotate(90 40 0.5)" fill="#CFAE8E"/>
                    <path d="M21.4313 28.8945C21.3909 28.8541 21.3588 28.8062 21.337 28.7534C21.3151 28.7006 21.3038 28.6441 21.3038 28.5869C21.3038 28.5298 21.3151 28.4732 21.337 28.4204C21.3588 28.3676 21.3909 28.3197 21.4313 28.2793L28.5149 21.1957H10.4348C10.3195 21.1957 10.2089 21.1499 10.1273 21.0684C10.0458 20.9869 10 20.8763 10 20.761C10 20.6457 10.0458 20.5351 10.1273 20.4535C10.2089 20.372 10.3195 20.3262 10.4348 20.3262H28.5149L21.4313 13.2426C21.3909 13.2022 21.3589 13.1543 21.337 13.1015C21.3152 13.0487 21.3039 12.9921 21.3039 12.935C21.3039 12.8779 21.3152 12.8213 21.337 12.7685C21.3589 12.7158 21.3909 12.6678 21.4313 12.6274C21.4717 12.587 21.5197 12.555 21.5725 12.5331C21.6252 12.5113 21.6818 12.5 21.7389 12.5C21.7961 12.5 21.8526 12.5113 21.9054 12.5331C21.9582 12.555 22.0061 12.587 22.0465 12.6274L29.8725 20.4534C29.9129 20.4937 29.945 20.5417 29.9669 20.5945C29.9887 20.6473 30 20.7038 30 20.761C30 20.8181 29.9887 20.8747 29.9669 20.9275C29.945 20.9802 29.9129 21.0282 29.8725 21.0686L22.0465 28.8945C22.0062 28.9349 21.9582 28.967 21.9054 28.9889C21.8526 29.0108 21.7961 29.022 21.7389 29.022C21.6818 29.022 21.6252 29.0108 21.5724 28.9889C21.5197 28.967 21.4717 28.9349 21.4313 28.8945Z" fill="white"/>
                  </svg>
                </a>
              </div>
            </div>
            <!-- img -->
            <img src="<?php echo $product['archive_cover']['url'] ?>" alt="" class="card-img"> 
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <div class="bg-light position-absolute w-50 h-100 top-0 start-0"></div>
  </div>
  <div class="position-absolute bg-gray6 w-43 h-100 end-0 top-0"></div>
  <div class="position-absolute bg-gray6 w-100 h-50 end-0 bottom-0"></div>
  <div class="position-absolute bg-light w-100 h-25 end-0 bottom-100px opacity-10"></div>
  <div class="position-absolute end-0 top-100px">
    <img src="<?php echo $logo_bg ?>" alt="" class="bg-logo">
  </div>
</section>
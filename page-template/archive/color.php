<?php
$search_icon = wp_get_attachment_url(83, 'full');
wp_localize_script( 'color-script', 'search_icon', $search_icon );
require get_template_directory() . '/inc/post-arr.php';
?>

<!-- banner -->
<?php get_template_part('components/component-banner') ?>
<!-- banner -->

<!-- main content -->
<div class="container border-bottom border-gray4 inner-y-l inner-sm-y-l">
  <!-- search form -->
  <form action="" class="row mb-6">
    <div class="col-lg-3">
      <div class="position-relative">
        <input type="text" class="form-control" placeholder="搜尋色號...">
        <button
          type="button"
          class="position-absolute end-0 top-50 translate-middle d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
            <path d="M7.20004 0.600098C8.42871 0.600021 9.63301 0.942918 10.6774 1.59019C11.7217 2.23746 12.5647 3.1634 13.1113 4.26377C13.6579 5.36415 13.8865 6.59526 13.7714 7.81853C13.6563 9.04179 13.202 10.2086 12.4596 11.1877L17.436 16.1641C17.5956 16.3249 17.6886 16.5399 17.6966 16.7663C17.7046 16.9927 17.6269 17.2138 17.4791 17.3854C17.3312 17.557 17.1241 17.6666 16.899 17.6922C16.674 17.7179 16.4475 17.6577 16.2648 17.5237L16.164 17.4361L11.1876 12.4597C10.3531 13.0923 9.38006 13.5173 8.34884 13.6994C7.31761 13.8816 6.25784 13.8158 5.25708 13.5075C4.25632 13.1991 3.3433 12.657 2.59346 11.926C1.84362 11.195 1.27848 10.2961 0.944742 9.30353C0.611001 8.31094 0.518238 7.25319 0.674116 6.21766C0.829995 5.18214 1.23004 4.19857 1.8412 3.34822C2.45236 2.49787 3.25709 1.80515 4.1889 1.3273C5.12071 0.84945 6.15285 0.600184 7.20004 0.600098ZM7.20004 2.4001C5.927 2.4001 4.7061 2.90581 3.80593 3.80598C2.90575 4.70616 2.40004 5.92706 2.40004 7.2001C2.40004 8.47314 2.90575 9.69404 3.80593 10.5942C4.7061 11.4944 5.927 12.0001 7.20004 12.0001C8.47308 12.0001 9.69398 11.4944 10.5942 10.5942C11.4943 9.69404 12 8.47314 12 7.2001C12 5.92706 11.4943 4.70616 10.5942 3.80598C9.69398 2.90581 8.47308 2.4001 7.20004 2.4001Z" fill="#CACACA"/>
          </svg>
        </button>
      </div>
    </div>
    <div class="col-lg-2">
      <button type="button" class="d-block bg-gray3 py-3x3 px-8 white-space-none">重置</button>
    </div>
  </form>
  <!-- search form -->

  <!-- tab -->
  <?php get_template_part('components/component-tab-color-cat') ?>
  <!-- tab -->

  <!-- color list -->
  <ul class="tile-list list-unstyled d-flex flex-wrap">
    <!-- 由 js 渲染 -->
  </ul>
  <!-- color list -->
</div>

<div class="container inner-y-l inner-sm-y-l">
  <div class="row">
    <?php $products_arr = output_post('type_products', -1); ?>
      <?php foreach($products_arr as $product) : ?>
        <div class="col-lg-6 mb-10">
          <a class="position-relative rounded-5px overflow-hidden" href="<?php echo $product['link'] ?>">
            <div class="position-absolute w-100 h-100 top-0 start-0">
              <img src="<?php echo $product['sm_banner_img']['url'] ?>" alt="" class="w-100 h-100 object-cover">
            </div>
            <div class="blur position-relative z-index-1 p-8 d-flex justify-content-between align-items-center">
              <h2 class="text-dark"><?php echo $product['title'] ?></h2>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                  <rect x="40.5" width="40" height="40" rx="20" transform="rotate(90 40.5 0)" fill="#CFAE8E"/>
                  <path d="M21.9313 28.3945C21.8909 28.3541 21.8588 28.3062 21.837 28.2534C21.8151 28.2006 21.8038 28.1441 21.8038 28.0869C21.8038 28.0298 21.8151 27.9732 21.837 27.9204C21.8588 27.8676 21.8909 27.8197 21.9313 27.7793L29.0149 20.6957H10.9348C10.8195 20.6957 10.7089 20.6499 10.6273 20.5684C10.5458 20.4869 10.5 20.3763 10.5 20.261C10.5 20.1457 10.5458 20.0351 10.6273 19.9535C10.7089 19.872 10.8195 19.8262 10.9348 19.8262H29.0149L21.9313 12.7426C21.8909 12.7022 21.8589 12.6543 21.837 12.6015C21.8152 12.5487 21.8039 12.4921 21.8039 12.435C21.8039 12.3779 21.8152 12.3213 21.837 12.2685C21.8589 12.2158 21.8909 12.1678 21.9313 12.1274C21.9717 12.087 22.0197 12.055 22.0725 12.0331C22.1252 12.0113 22.1818 12 22.2389 12C22.2961 12 22.3526 12.0113 22.4054 12.0331C22.4582 12.055 22.5061 12.087 22.5465 12.1274L30.3725 19.9534C30.4129 19.9937 30.445 20.0417 30.4669 20.0945C30.4887 20.1473 30.5 20.2038 30.5 20.261C30.5 20.3181 30.4887 20.3747 30.4669 20.4275C30.445 20.4802 30.4129 20.5282 30.3725 20.5686L22.5465 28.3945C22.5062 28.4349 22.4582 28.467 22.4054 28.4889C22.3526 28.5108 22.2961 28.522 22.2389 28.522C22.1818 28.522 22.1252 28.5108 22.0724 28.4889C22.0197 28.467 21.9717 28.4349 21.9313 28.3945Z" fill="white"/>
                </svg>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
  </div>
</div>

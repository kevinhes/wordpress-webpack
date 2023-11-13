<?php
$product_gallery = get_field('product_gallery');
$product_main_content = get_field('product_main_content');
$feature_des = get_field('feature_des');
$title = get_the_title();
$product_feature_list = get_field('product_feature_list');
$table = get_field('table');
?>
<!-- banner -->
<?php get_template_part('components/component-dropdown-banner') ?>
<!-- banner -->
<!-- main content -->
<div class="container">
  <?php
  if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs layout-bottom-s layout-sm-bottom-s">','</div>' );
  }
  ?>
  <div class="row layout-bottom-l layout-sm-bottom-l">
    <div class="col-lg-5">
      <div class="swiper productMainSwiper mb-x1">
        <div class="swiper-wrapper">
          <?php foreach( $product_gallery as $key => $image ) : ?>
          <div class="swiper-slide">
            <img src="<?php echo $image['url'] ?>" alt="swiper image <?php echo $key + 1 ?>" class="w-100">
          </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="swiper productThumbSwiper mb-x1" thumbsSlider="">
        <div class="swiper-wrapper">
          <?php foreach( $product_gallery as $key => $image ) : ?>
          <div class="swiper-slide rounded-5px over-hidden">
            <img src="<?php echo $image['url'] ?>" alt="swiper image <?php echo $key + 1 ?>" class="w-100">
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="offset-lg-1 col-lg-6">
      <div class="text-small text-secondary d-flex align-items-center mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none" class="me-1">
          <path d="M3.75 10.4375V21.5C3.75 21.6989 3.82902 21.8897 3.96967 22.0303C4.11032 22.171 4.30109 22.25 4.5 22.25H9V15.875C9 15.5766 9.11853 15.2905 9.3295 15.0795C9.54048 14.8685 9.82663 14.75 10.125 14.75H13.875C14.1734 14.75 14.4595 14.8685 14.6705 15.0795C14.8815 15.2905 15 15.5766 15 15.875V22.25H19.5C19.6989 22.25 19.8897 22.171 20.0303 22.0303C20.171 21.8897 20.25 21.6989 20.25 21.5V10.4375" stroke="#CFAE8E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M22.5 12.4999L12.5105 2.93741C12.2761 2.68991 11.7281 2.6871 11.4895 2.93741L1.5 12.4999M18.75 8.89054V3.49991H16.5V6.73429" stroke="#CFAE8E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="h4 mb-0 fw-5">
          <?php echo $product_main_content['series_name'] ?>
        </span>
      </div>
      <h2 class="h1 pb-5 mb-5 border-bottom border-gray3"><?php echo $title ?></h2>
      <div class="editor-content mb-5 fw-5">
        <?php the_content() ?>
      </div>
      <?php if( $product_main_content['green_house_mark_list'] ) : ?>
      <ul class="d-flex list-unstyled pb-2 mb-5">
        <?php foreach( $product_main_content['green_house_mark_list'] as $mark ) : ?>
          <li>
            <img src="<?php echo $mark['mark']['url'] ?>" alt="" class="square-100px d-block">
          </li>
        <?php endforeach ?>
      </ul>
      <?php endif ?>
      <p class="mb-5 py-3 px-3 bg-gray2 rounded-5px text-center text-primary">
        #<?php echo $post -> post_title ?>開放線上購買囉！<a class="d-inline text-decoration-underline" href="<?php echo $product_main_content['shopping_site']['url'] ?>"><?php echo $product_main_content['shopping_site']['title'] ?></a>
      </p>
      <div class="row">
        <div class="col">
          <a class="btn btn-lg btn-secondary d-flex align-items-center justify-content-center" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none" class="me-2">
              <path d="M12.5294 6C10.5784 6 9 7.57835 9 9.52941C9 9.66982 9.05578 9.80448 9.15506 9.90376C9.25435 10.003 9.389 10.0588 9.52941 10.0588C9.66982 10.0588 9.80448 10.003 9.90376 9.90376C10.003 9.80448 10.0588 9.66982 10.0588 9.52941C10.0588 8.16282 11.1628 7.05882 12.5294 7.05882C13.896 7.05882 15 8.16282 15 9.52941C15 10.1308 14.8433 10.5318 14.6266 10.8424C14.3979 11.1692 14.0852 11.4233 13.7075 11.712L13.6101 11.7861C12.8972 12.3282 12 13.0101 12 14.4706V14.6471C12 14.7875 12.0558 14.9221 12.1551 15.0214C12.2543 15.1207 12.389 15.1765 12.5294 15.1765C12.6698 15.1765 12.8045 15.1207 12.9038 15.0214C13.003 14.9221 13.0588 14.7875 13.0588 14.6471V14.4706C13.0588 13.5409 13.5628 13.1555 14.3188 12.5774L14.3513 12.5527C14.7233 12.2682 15.1609 11.9266 15.4948 11.4487C15.8407 10.9539 16.0588 10.3405 16.0588 9.52941C16.0588 7.57835 14.4805 6 12.5294 6ZM12.5294 18C12.7166 18 12.8962 17.9256 13.0285 17.7933C13.1609 17.6609 13.2353 17.4813 13.2353 17.2941C13.2353 17.1069 13.1609 16.9274 13.0285 16.795C12.8962 16.6626 12.7166 16.5882 12.5294 16.5882C12.3422 16.5882 12.1627 16.6626 12.0303 16.795C11.8979 16.9274 11.8235 17.1069 11.8235 17.2941C11.8235 17.4813 11.8979 17.6609 12.0303 17.7933C12.1627 17.9256 12.3422 18 12.5294 18Z" fill="white"/>
              <rect x="1" y="0.5" width="23" height="23" rx="11.5" stroke="white"/>
            </svg>
            <span>
              加入提問箱
            </span>
          </a>
        </div>
        <div class="col">
          <a class="btn btn-lg btn-secondary d-flex align-items-center justify-content-center" href="<?php echo $product_main_content['color_link']['title'] ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="me-2">
              <path d="M19.6457 15.8179C19.6284 15.7968 19.6066 15.7797 19.5819 15.768C19.5571 15.7562 19.5301 15.7502 19.5027 15.7502C19.4754 15.7502 19.4484 15.7562 19.4236 15.768C19.3989 15.7797 19.3771 15.7968 19.3598 15.8179C18.8676 16.3992 17.2504 18 17.2504 19.4582C17.2504 20.7239 18.2582 21.75 19.5004 21.75C20.7426 21.75 21.7504 20.7187 21.7504 19.4582C21.7504 18 20.1426 16.3992 19.6457 15.8179ZM18.141 13.4953L7.29462 2.73559C7.13784 2.57827 6.95156 2.45344 6.74644 2.36827C6.54132 2.2831 6.32141 2.23926 6.09931 2.23926C5.87721 2.23926 5.65729 2.2831 5.45218 2.36827C5.24706 2.45344 5.06077 2.57827 4.90399 2.73559L4.66259 2.97699C4.50527 3.13377 4.38044 3.32006 4.29527 3.52518C4.2101 3.73029 4.16626 3.95021 4.16626 4.17231C4.16626 4.39441 4.2101 4.61432 4.29527 4.81944C4.38044 5.02456 4.50527 5.21085 4.66259 5.36762L7.14181 7.84684L9.81368 5.17496L2.64087 12.3375C2.51706 12.4606 2.41906 12.6072 2.35262 12.7687C2.28618 12.9302 2.25263 13.1033 2.25394 13.2779C2.25525 13.4525 2.29139 13.6251 2.36025 13.7856C2.4291 13.9461 2.52929 14.0912 2.65493 14.2125L8.80493 20.1187C9.05051 20.3538 9.37761 20.4847 9.71759 20.4838C10.0576 20.4829 10.384 20.3504 10.6284 20.114C12.4002 18.3984 16.1737 14.7468 16.5674 14.3531C16.8393 14.0812 17.4206 14.0203 17.9127 14.0203H17.9268C17.9877 14.0203 18.0472 14.0022 18.0977 13.9683C18.1482 13.9344 18.1875 13.8862 18.2105 13.8298C18.2335 13.7735 18.2392 13.7115 18.2268 13.652C18.2144 13.5924 18.1846 13.5378 18.141 13.4953Z" stroke="white" stroke-miterlimit="10"/>
            </svg>
            <span>
              顏色查詢系統
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <h3 class="pb-3 border-bottom border-gray6 text-center layout-bottom-s">特性說明</h3>
  <div class="layout-bottom-s layout-sm-bottom-s">
    <?php foreach( $feature_des['feature_list'] as $list ) : ?>
    <p><?php echo $list['title'] ?></p>
    <ul class="mb-6">
      <?php foreach( $list['detail'] as $feature ) : ?>
        <li class="fs-7">
          <span class="fs-6">
            <?php echo $feature['feature'] ?>
          </span>
        </li>
      <?php endforeach ?>
    </ul>
    <?php endforeach ?>
    <p class="text-primary">
      <?php echo $feature_des['caption'] ?>
    </p>
  </div>
  <div class="row layout-bottom-l">
    <?php foreach($product_feature_list as $item) : ?>
      <div class="col-lg-2">
        <div class="rounded-5px bg-secondary p-3 d-flex flex-column justify-content-center align-items-center bg-opacity-20">
          <div class="mb-5">
            <?php echo $item['icon'] ?>
          </div>
          <h4 class="mb-0"><?php echo $item['title'] ?></h4>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  
  <!-- 優勢表格 -->
  <h3 class="pb-3 border-bottom border-gray6 text-center layout-bottom-s">優勢比較</h3>
  <div class="inner-bottom-l inner-sm-bottom-l border-bottom border-gray4 layout-bottom-l layout-sm-bottom-l">
    <?php foreach($table as $key => $table_item) : ?>
      <div class="row mb-1x5">
        <div class="offset-lg-2 col-lg-2 h-inherit">
          <?php
            echo $key !==0 ? '<div class="rounded-5px bg-gray2 p-3 h-100">' : '';
            echo $table_item['thead'];
            echo $key !==0 ? '</div>' : '';
          ?>
        </div>
        <div class="col-lg-3 h-inherit">
          <div class="bg-primary bg-opacity-10 rounded-5px py-3 text-center px-3 h-100">
            <?php echo $key === 0 ? '<h4 class="mb-0">' : '' ?>
            <?php echo $table_item['keim'] ?>
            <?php echo $key === 0 ? '</h4>' : '' ?>
          </div>
        </div>
        <div class="col-lg-3 h-inherit">
          <div class="bg-gray6 bg-opacity-10 rounded-5px text-center py-3 px-3 h-100">
            <?php echo $key === 0 ? '<h4 class="mb-0">' : '' ?>
            <?php echo $table_item['normal'] ?>
            <?php echo $key === 0 ? '</h4>' : '' ?>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>

  <!-- 相關產品 -->
  <div class="row layout-bottom-s layout-bottom-s">
    <?php $products_arr = output_post('type_products', -1); ?>
    <?php foreach($products_arr as $product) : ?>
      <div class="col-lg-6 mb-10">
        <a class="position-relative rounded-5px overflow-hidden" href="<?php echo $product['id'] ===  $post -> ID ? get_term_link('mineral-color', 'tax_mineral_color') : $product['link'] ?>">
          <div class="position-absolute w-100 h-100 top-0 start-0">
            <img src="<?php echo $product['sm_banner_img']['url'] ?>" alt="" class="w-100 h-100 object-cover">
          </div>
          <div class="blur position-relative z-index-1 p-8 d-flex justify-content-between align-items-center">
            <?php if ( $product['id'] === $post -> ID ) : ?>
              <h2 class="text-dark">礦物色彩</h2>
            <?php else : ?>
              <h2 class="text-dark"><?php echo $product['title'] ?></h2>
            <?php endif ?>
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
<?php
  $thank_page = get_page_by_path('thank');
  $thank_page_link = get_permalink($thank_page);
  $address_list = get_field('address_list', 'option');
  wp_localize_script( 'qa-script', 'thank_link', $thank_page_link );
?>
<!-- banner -->
<?php get_template_part('components/component-banner') ?>
<!-- banner -->
<section class="inner-top-l inner-bottom-l inner-sm-top-l inner-sm-bottom-l bg-gray2">
  <div class="container">
    <div class="layout-bottom-s layout-sm-bottom-s">
      <div class="row mb-5">
        <div class="col-lg-2">
          <h4 class="bg-gray3 py-x1 rounded-5px text-center">
            圖片
          </h4>
        </div>
        <div class="col-lg-4">
          <h4 class="bg-gray3 py-x1 rounded-5px text-center">
            品名
          </h4>
        </div>
        <div class="col-lg-4">
          <h4 class="bg-gray3 py-x1 rounded-5px text-center">
            內容
          </h4>
        </div>
        <div class="col-lg-2">
          <h4 class="bg-gray3 py-x1 rounded-5px text-center">
            移除
          </h4>
        </div>
      </div>
      <ul class="qa-list list-unstyled">
        <!-- 由 js 渲染 -->
      </ul>
    </div>
    <p class="text-center bg-gray3 py-x1 mb-5">
      提問人資訊
    </p>
    <?php echo do_shortcode('[contact-form-7 id="feafe42" title="Question form"]') ?>
  </div>
</section>
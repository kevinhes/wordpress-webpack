<?php 
  $thank_page = get_page_by_path('thank');
  $thank_page_link = get_permalink($thank_page);
  wp_localize_script( 'contact-script', 'thank_link', $thank_page_link );
?>

<?php
$address_list = get_field('address_list', 'option');
?>
<!-- banner -->
<?php get_template_part('components/component-banner') ?>
<!-- banner -->
<section class="inner-top-l inner-bottom-l inner-sm-top-l inner-sm-bottom-l bg-gray2">
  <div class="container">
    <div class="bg-light p-3 layout-bottom-s">
      <?php foreach($address_list as $address) : ?>
        <p class="text-medium">
        【<span class="me-2"><?php echo $address['subtitle'] ?></span><span><?php echo $address['title'] ?></span>】
        <span><?php echo $address['tel'] ?></span><span class="mx-1">/</span><span><?php echo $address['address'] ?></span>
        </p>
      <?php endforeach ?>
    </div>
    <?php echo do_shortcode('[contact-form-7 id="8d98ca8" title="Contact form"]') ?>
    <!-- <form action="">
      <div class="row layout-bottom-s layout-sm-bottom-s">
        <div class="col-lg-4">
          <div class="contact-form-group">
            <label for="customerName" class="form-label mb-x1">姓名<span class="text-primary ms-1">*</span></label>
            <div class="position-relative">
              <input type="text" id="customerName" class="form-control" placeholder="預設狀態">
              <div class="position-absolute top-50 translate-middle-y end-5 d-flex">
                <div class="form-check me-5">
                  <input class="form-check-input" type="radio" name="customerGender" id="customerMale" checked>
                  <label class="form-check-label" for="customerMale">
                    先生
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="customerGender" id="customerFemale">
                  <label class="form-check-label" for="customerFemale">
                    小姐
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <label for="customerCompany" class="form-label mb-x1">公司名稱</label>
          <input type="text" id="customerCompany" class="form-control" placeholder="預設狀態">
        </div>
        <div class="col-lg-4">
          <label for="customerEmail" class="form-label mb-x1">電子郵件</label>
          <input type="mail" id="customerEmail" class="form-control" placeholder="預設狀態">
        </div>
      </div>
      <div class="row layout-bottom-s layout-sm-bottom-s">
        <div class="col-lg-4">
          <div class="contact-form-group">
            <label for="customerTel" class="form-label mb-x1">聯絡電話<span class="text-primary ms-1">*</span></label>
            <input type="text" id="customerTel" class="form-control" placeholder="預設狀態">
          </div>
        </div>
        <div class="col-lg-4">
          <label for="customerRegion" class="form-label mb-x1">地區<span class="text-primary ms-1">*</span></label>
          <input type="text" id="customerRegion" class="form-control" placeholder="預設狀態">
        </div>
        <div class="col-lg-4">
          <div class="contact-form-group">
            <label for="customerNeed" class="form-label mb-x1">產品需求<span class="text-primary ms-1">*</span></label>
            <select name="customerNeedSelect" id="customerNeed" class="form-select">
              <option selected>--請選擇--</option>
              <option value="test">test</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row layout-bottom-s layout-sm-bottom-s">
        <div class="col-lg-4">
          <div class="contact-form-group">
            <p class="form-label mb-x1">身份<span class="text-primary ms-1">*</span></p>
            <div class="d-flex flex-wrap column-gap-10 row-gap-x1">
              <div>
                <input type="radio" name="identity" id="owner" class="me-2">
                <label for="owner">屋主</label>
              </div>
              <div>
                <input type="radio" name="identity" id="architect" class="me-2">
                <label for="architect">建築師</label>
              </div>
              <div>
                <input type="radio" name="identity" id="designer" class="me-2">
                <label for="designer">設計師</label>
              </div>
              <div>
                <input type="radio" name="identity" id="builders" class="me-2">
                <label for="builders">建商</label>
              </div>
              <div>
                <input type="radio" name="identity" id="contractor" class="me-2">
                <label for="contractor">營造</label>
              </div>
              <div>
                <input type="radio" name="identity" id="contractorCompany" class="me-2">
                <label for="contractorCompany">施工廠商</label>
              </div>
              <div class="w-40">
                <input type="radio" name="identity" id="other" class="me-2">
                <label for="other">其他</label>
                <input type="text" name="otherText" id="otherText" class="other-form-control w-50">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <label for="customerRegion" class="form-label mb-x1">訊息內容<span class="text-primary ms-1">*</span></label>
          <textarea type="text" id="customerRegion" class="form-control form-control-area" placeholder="預設狀態"></textarea>
        </div>
      </div>
      <div class="row offset-lg-5 col-lg-2">
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-secondary btn-lg">送出</button>
        </div>
      </div>
    </form> -->
  </div>
</section>
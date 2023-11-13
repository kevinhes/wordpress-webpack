<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package design_hu_webpack
 */
$address_list = get_field('address_list', 'option');
$sns_list = get_field('sns_list', 'option');
$logo_footer = wp_get_attachment_url(409);
?>

	<footer id="colophon" class="site-footer">
		<ul class="address-list list-unstyled d-flex">
      <?php foreach( $address_list as $item ) : ?>
      <li class="list-item flex-grow-1 d-flex flex-column align-items-center justify-content-end">
        <img src="<?php echo $item['bg_img']['url'] ?>" alt="" class="position-absolute w-100 h-100 object-cover top-0 start-0">
        <div class="content px-x1 py-x5 position-relative z-index-1">
          <div class="mb-1 d-flex justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M16.2092 15.9999H7.78921C7.4568 16.0004 7.13105 15.9068 6.84966 15.7298C6.56827 15.5528 6.34276 15.2998 6.19921 14.9999C6.03118 14.6442 5.96646 14.2484 6.01243 13.8577C6.0584 13.4669 6.21321 13.097 6.45921 12.7899L10.6692 7.68995C10.8344 7.49932 11.0387 7.34643 11.2682 7.24165C11.4976 7.13687 11.747 7.08264 11.9992 7.08264C12.2515 7.08264 12.5008 7.13687 12.7303 7.24165C12.9597 7.34643 13.164 7.49932 13.3292 7.68995L17.5392 12.7899C17.7852 13.097 17.94 13.4669 17.986 13.8577C18.032 14.2484 17.9672 14.6442 17.7992 14.9999C17.6557 15.2998 17.4302 15.5528 17.1488 15.7298C16.8674 15.9068 16.5416 16.0004 16.2092 15.9999Z" fill="white"/>
            </svg>
          </div>
          <h3 class="text-light">
            <?php echo $item['title'] ?>
          </h3>
        </div>
        <div class="overlay text-light text-center">
          <div>
            <h3 class="mb-0">
              <?php echo $item['subtitle'] ?>
            </h3>
            <h3 class="mb-5">
              <?php echo $item['title'] ?>
            </h3>
            <p class="mb-5"><?php echo $item['address'] ?></p>
            <p class="mb-5"><?php echo $item['tel'] ?></p>
            <div class="d-flex justify-content-center">
              <a
                href="<?php echo $item['contact']['url'] ?>"
                class="btn btn-lg btn-outline-light"
                target="_blank">
                聯絡我們
              </a>
            </div>
          </div>
        </div>
      </li>
      <?php endforeach ?>
    </ul>
    <div class="container pt-6">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <img src="<?php echo $logo_footer ?>" alt="">
        </div>
        <ul class="d-flex list-unstyled column-gap-5">
          <?php foreach($sns_list as $sns) : ?>
            <li>
              <a href="<?php echo $sns['link']['url'] ?>" target="_blank">
                <img src="<?php echo $sns['icon']['url'] ?>" alt="">
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
    <div class="container py-6 text-gray5">
      Copyright © 2023 ｜ 交泰興有限公司代理 All rights reserved. ｜隱私權政策
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

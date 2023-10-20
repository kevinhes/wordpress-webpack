<div class="d-flex swiper-slide">
  <div class="w-50">
    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="w-100 slide-img">
  </div>
  <div class="w-50">
    <div class="ps-x5 py-5 slide-content mb-5">
      <h3 class="mb-10">
        <?php echo get_the_title() ?>
      </h3>
      <div class="mul-ellipsis-4">
        <?php //the_content() ?>
        <?php echo the_excerpt() ?>
      </div>
    </div>
    <div class="ps-x5 pb-10">
      <a href="<?php echo get_permalink() ?>" class="text-primary-dark">
        <span>
          訪問影片
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
          <path d="M4.00065 4.01025V5.34359H9.72732L3.33398 11.7369L4.27398 12.6769L10.6673 6.28359V12.0103H12.0007V4.01025H4.00065Z" fill="#36393C"/>
        </svg>
      </a>
    </div>
    <div class="ps-x5">
      <div class="border-bottom border-dark"></div>
    </div>
  </div>
</div>
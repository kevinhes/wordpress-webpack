<?php 
/* template name: home */
get_header();
require get_template_directory() . '/inc/post-arr.php';
$banner_group = get_field('banner_group');
$news_post = get_field('news_post');
$case_section = get_field('case_section');
$case_arr = output_post('type_case', 8);
$sharing_section = get_field('sharing_section');
$slogan = get_field('slogan');
?>

<!-- bnaaer -->
<div class="banner position-relative">
  <div class="position-absolute w-100 h-100 top-0 start-0">
    <img src="<?php echo $banner_group['banner']['url'] ?>" alt="home banner image" class="w-100 h-100 object-cover">
  </div>
</div>

<!-- news 跑馬燈 -->
<section class="py-2 d-flex justify-content-center">
  <a href="<?php echo get_permalink($news_post) ?>" class="d-flex text-dark align-items-center">
    <span class="me-6">
      <?php echo $news_post -> post_title ?>
    </span>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
      <g clip-path="url(#clip0_741_2982)">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7064 15.7174C12.5188 15.9048 12.2645 16.0101 11.9994 16.0101C11.7342 16.0101 11.4799 15.9048 11.2924 15.7174L5.63537 10.0604C5.53986 9.96811 5.46367 9.85776 5.41126 9.73576C5.35886 9.61375 5.33127 9.48253 5.33012 9.34975C5.32896 9.21697 5.35426 9.0853 5.40454 8.9624C5.45483 8.8395 5.52908 8.72785 5.62297 8.63396C5.71686 8.54006 5.82852 8.46581 5.95141 8.41553C6.07431 8.36525 6.20599 8.33995 6.33877 8.3411C6.47155 8.34226 6.60277 8.36984 6.72477 8.42225C6.84677 8.47466 6.95712 8.55084 7.04937 8.64635L11.9994 13.5964L16.9494 8.64635C17.138 8.46419 17.3906 8.3634 17.6528 8.36568C17.915 8.36796 18.1658 8.47313 18.3512 8.65853C18.5366 8.84394 18.6418 9.09475 18.644 9.35695C18.6463 9.61915 18.5455 9.87175 18.3634 10.0604L12.7064 15.7174Z" fill="#8A8A8A"/>
      </g>
      <defs>
        <clipPath id="clip0_741_2982">
          <rect width="24" height="24" fill="white" transform="translate(0 0.0102539)"/>
        </clipPath>
      </defs>
    </svg>
  </a>
</section>

<!-- case swiper -->
<section class="bg-primary-dark inner-y-l">
  <h2 class="h1 text-center text-light mb-5">
    <?php echo $case_section['title'] ?>
  </h2>
  <p class="text-center text-light mb-15">
    <?php echo $case_section['content'] ?>
  </p>
  <div class="container position-relative layout-bottom-s layout-sm-bottom-s">
    <div class="row swiper caseSwiper  justify-content-center">
      <div class="swiper-wrapper">
        <?php foreach( $case_arr as $case ) : ?>
        <?php
          $terms = wp_get_post_terms($case['id'], 'tax_case');
          $cat = '';
          foreach( $terms as $key => $item ) {
            if ( $item -> parent === 0 ) {
              unset($terms[$key]);
            } else {
              $cat = $item -> name;
            }
          }
        ?>
        <div class="swiper-slide caseSwiper-slide">
          <div class="slide-card">
            <div class="card-img mb-x1">
              <img src="<?php echo $case['thumbnail_url'] ?>" alt="" class="w-100 h-100 object-cover">
            </div>
            <p class="text-small cat">
              <?php echo $cat ?>
            </p>
            <p class="text-medium title">
              <?php echo $case['title'] ?>
            </p>
            <a href="<?php echo $case['link'] ?>" class="stretched-link"></a>
          </div>
        </div>
        <?php endforeach ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
    <div class="position-absolute top-50 start-0 end-0 translate-middle-y">
      <div class="swiper-button-next caseSwiper-btn-next">
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="101" viewBox="0 0 27 101" fill="none">
          <path d="M1 100.5L25 50.5L1.00001 0.499999" stroke="white" stroke-width="2"/>
        </svg>
      </div>
      <div class="swiper-button-prev caseSwiper-btn-prev">
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="101" viewBox="0 0 27 101" fill="none">
          <path d="M26 0.5L2 50.5L26 100.5" stroke="white" stroke-width="2"/>
        </svg>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <a href="<?php echo get_term_link($case_section['link'][0]) ?>" class="btn btn-lg btn-outline-light">更多案例</a>
  </div>
</section>

<!-- review -->
<section class="inner-top-s inner-sm-top-s pb-5 bg-gray2 position-relative">
  <div class="container position-relative z-index-1">
    <h2 class="text-center mb-5">
      <?php echo $sharing_section['title'] ?>
    </h2>
    <p class="mb-5 text-center">
      <?php echo $sharing_section['content'] ?>
    </p>
    <div class="d-flex justify-content-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M28.7684 23.2043C28.9381 23.408 29.0199 23.6707 28.9959 23.9348C28.9719 24.1988 28.844 24.4425 28.6404 24.6123L20.6404 31.2783C20.54 31.3661 20.4231 31.4329 20.2966 31.4749C20.17 31.5168 20.0363 31.533 19.9034 31.5225C19.7705 31.5121 19.641 31.4751 19.5225 31.4138C19.4041 31.3526 19.2991 31.2683 19.2137 31.1658C19.1284 31.0634 19.0644 30.9449 19.0255 30.8174C18.9866 30.6898 18.9736 30.5558 18.9872 30.4232C19.0009 30.2905 19.0409 30.1619 19.105 30.045C19.1691 29.9281 19.2559 29.8252 19.3604 29.7423L27.3604 23.0763C27.5641 22.9066 27.8269 22.8248 28.0909 22.8488C28.3549 22.8728 28.5986 23.0007 28.7684 23.2043Z" fill="#CFAE8E"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2331 23.2043C11.4029 23.0007 11.6466 22.8728 11.9106 22.8488C12.1746 22.8248 12.4374 22.9066 12.6411 23.0763L20.6411 29.7423C20.7455 29.8252 20.8324 29.9281 20.8965 30.045C20.9605 30.1619 21.0006 30.2905 21.0143 30.4232C21.0279 30.5558 21.0149 30.6898 20.976 30.8174C20.9371 30.9449 20.8731 31.0634 20.7878 31.1658C20.7024 31.2683 20.5974 31.3526 20.479 31.4138C20.3605 31.4751 20.231 31.5121 20.0981 31.5225C19.9652 31.533 19.8315 31.5168 19.7049 31.4749C19.5784 31.4329 19.4615 31.3661 19.3611 31.2783L11.3611 24.6123C11.1575 24.4425 11.0296 24.1988 11.0056 23.9348C10.9816 23.6707 11.0634 23.408 11.2331 23.2043Z" fill="#CFAE8E"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 30.5103C19.7348 30.5103 19.4804 30.4049 19.2929 30.2174C19.1054 30.0298 19 29.7755 19 29.5103L19 10.5103C19 10.245 19.1054 9.99068 19.2929 9.80315C19.4804 9.61561 19.7348 9.51025 20 9.51025C20.2652 9.51025 20.5196 9.61561 20.7071 9.80315C20.8946 9.99068 21 10.245 21 10.5103L21 29.5103C21 29.7755 20.8946 30.0298 20.7071 30.2174C20.5196 30.4049 20.2652 30.5103 20 30.5103Z" fill="#CFAE8E"/>
      </svg>
    </div>
  </div>
  <div class="position-absolute w-100 h-100 top-0 start-0">
    <img src="<?php echo $sharing_section['bg_img']['url'] ?>" alt="" class="w-100 h-100">
  </div>

</section>
<section class="bg-gray2 inner-y-s inner-sm-y-s">
  <div class="container">
    <div class="swiper shareSwiper">
      <div class="swiper-wrapper">
        <?php
          $args = array(
            'post_type' => 'type_video',
            'posts_per_page' => 5,
            'post_status' => 'publish',

          );
          $query = new WP_Query($args);
          if ($query -> have_posts()) {
            while($query -> have_posts()) {
              $query -> the_post();
              get_template_part('template-parts/content-slide');
            }
            wp_reset_postdata();
          } else {
            get_template_part('template-parts/content-none');
          }
        ?>
      </div>
      <div class="shareSwiper-navigation d-flex align-items-center">
        <div class="swiper-button-prev shareSwiper-btn-prev">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path d="M13.6008 7.21021L8.80078 12.0102L13.6008 16.8102" stroke="#36393C" stroke-linecap="square"/>
            <rect x="0.25" y="0.260254" width="23.5" height="23.5" stroke="#CACACA" stroke-width="0.5"/>
          </svg>
        </div>
        <div class="shareSwiper-pagination"></div>
        <div class="swiper-button-next shareSwiper-btn-next">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path d="M10.4004 16.8102L15.2004 12.0102L10.4004 7.21021" stroke="#36393C" stroke-linecap="square"/>
            <rect x="0.25" y="0.260254" width="23.5" height="23.5" stroke="#CACACA" stroke-width="0.5"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="inner-y-l inner-sm-y-l">
  <div class="container">
    <p class="text-center slogan mb-6"><?php echo $slogan ?></p>
    <div class="d-flex justify-content-center">
      <div class="mx-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="25" viewBox="0 0 23 25" fill="none">
          <path d="M22.1172 21.1129C15.1947 25.6625 7.23735 25.6268 0.350523 21.0178L11.3052 0.5L22.1172 21.1129Z" fill="#D62025"/>
        </svg>
      </div>
      <div class="mx-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="25" viewBox="0 0 23 25" fill="none">
          <path d="M22.1172 21.1129C15.1947 25.6625 7.23735 25.6268 0.350523 21.0178L11.3052 0.5L22.1172 21.1129Z" fill="#D62025"/>
        </svg>
      </div>
      <div class="mx-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="25" viewBox="0 0 23 25" fill="none">
          <path d="M22.1172 21.1129C15.1947 25.6625 7.23735 25.6268 0.350523 21.0178L11.3052 0.5L22.1172 21.1129Z" fill="#D62025"/>
        </svg>
      </div>
    </div>
  </div>
</div>

<?php 
get_footer();
?>
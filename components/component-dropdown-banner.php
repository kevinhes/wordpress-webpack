<?php
  require get_template_directory() . '/inc/post-arr.php';
  $banner_img = '';
  $page_info = '';
  $title = '';
  $excerpt = '';
  $post_type = get_post_type();
  $posts_arr = [];
  if( is_archive() ) {
    $page_info = get_queried_object();
    $about_page = get_page_by_path('about');
    $child_pages = get_pages(array('child_of' => $about_page -> ID));
    $posts_arr = $child_pages;
    $title = $page_info -> name;
    $content = $page_info -> description;
    
    $certification = get_term_by('slug', 'certification', 'tax_certification');
    $news = get_term_by('slug', 'last-news', 'tax_news');
    $posts_arr[] = $certification;
    $posts_arr[] = $news;
    wp_reset_query();
    if ( $page_info -> slug === 'certification' ) {
      $banner_img = wp_get_attachment_url(299);
    } elseif ($page_info -> slug === 'last-news') {
      $banner_img = wp_get_attachment_url(320);
    }
  }
  if (is_page('about') || is_page('keim-stories') || is_page('env-protect') || is_page('site-map')) {
    $about_page = get_page_by_path('about');
    $child_pages = get_pages(array('child_of' => $about_page -> ID));
    $certification = get_term_by('slug', 'certification', 'tax_certification');
    $news = get_term_by('slug', 'last-news', 'tax_news');
    $posts_arr[] = $child_pages[0];
    $posts_arr[] = $child_pages[1];
    $posts_arr[] = $certification;
    $posts_arr[] = $child_pages[2];
    $posts_arr[] = $news;
    $banner_img = get_field('cover');
    $title = get_the_title();

    // $certification = get_term( 48, 'type_certification' );

    wp_reset_query();
  } elseif ( is_single() ) {
    $posts_arr = output_post('type_products', -1);
    wp_reset_query();
    $banner_img = get_field('cover');
    $title = get_the_title();
    $excerpt = get_the_excerpt();
  }
?>


<div class="banner-m position-relative d-flex align-items-center">
  <div class="container position-relative z-index-1">
    <div class="row mb-10">
      <div class="offset-lg-2 col-lg-8">
        <h1 class="mb-10 text-center"><?php echo $title ?></h1>
        <h4 class="text-center mb-0">
          <?php
          if (is_single()) {
            echo $excerpt;
          } elseif (is_archive()) {
            echo $content;
          } else {
            the_content();
          }
          ?>
        </h4>
      </div>
    </div>
    <div class="row">
      <div class="offset-lg-4 col-lg-4">
        <select class="form-select">
          <?php foreach( $posts_arr as $post ) : ?>
            <?php if ( is_page() ) : ?>
              <?php if( $post -> post_type === 'page' ) : ?>
                <option value="<?php echo get_permalink($post) ?>"><?php echo $post->post_title ?></option>
              <?php else : ?>
                <option value="<?php echo get_term_link($post) ?>"><?php echo $post->name ?></option>
              <?php endif ?>
            <?php elseif(is_archive()) : ?>
              <?php if( $post -> post_type === 'page' ) : ?>
                <option value="<?php echo get_permalink($post) ?>"><?php echo $post->post_title ?></option>
              <?php else : ?>
                <option value="<?php echo get_term_link($post) ?>"><?php echo $post->name ?></option>
              <?php endif ?>
            <?php elseif(is_single()) : ?>
              <option value="<?php echo $post['link'] ?>"><?php echo $post['title'] ?></option>
            <?php endif ?>
          <?php endforeach ?>
          <?php wp_reset_postdata(); ?>
        </select>
      </div>
    </div>
  </div>
  <div class="position-absolute w-100 h-100 top-0 start-0 object-cover">
    <?php if( is_archive() ) : ?>
      <img src="<?php echo $banner_img ?>" alt="banner image" class="full-img-setting">
    <?php else: ?>
      <img src="<?php echo $banner_img['url'] ?>" alt="banner image" class="full-img-setting">
    <?php endif ?>
  </div>
  <div class="bg-overlay"></div>
</div>
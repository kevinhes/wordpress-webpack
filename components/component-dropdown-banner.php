<?php
  require get_template_directory() . '/inc/post-arr.php';
  $banner_img = '';
  $page_info = '';
  $title = '';
  $excerpt = '';
  $post_type = get_post_type();
  $posts_arr = '';
  if ( $post_type === 'type_products' ) {
    $posts_arr = output_post('type_products', -1);
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
        <h4 class="text-center mb-0"><?php echo $excerpt ?></h4>
      </div>
    </div>
    <div class="row">
      <div class="offset-lg-4 col-lg-4">
        <select class="form-select">
          <?php foreach( $posts_arr as $post ) : ?>
            <option value="<?php echo $post['link'] ?>"><?php echo $post['title'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>
  <div class="position-absolute w-100 h-100 top-0 start-0 object-cover">
    <img src="<?php echo $banner_img['url'] ?>" alt="banner image" class="full-img-setting">
  </div>
</div>
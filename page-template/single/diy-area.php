<?php
$banner_bg_img = get_field('banner_bg_img');
$post_type = get_post_type();
$main_content = get_field('main_content');
$taxonomies = get_object_taxonomies($post_type);
$cat_terms = get_terms(
  array(
    'taxonomy' => $taxonomies[0],
    'hide_empty' => false,
  )
);
$terms = get_the_terms($post->ID, $taxonomies[0]);
function cleanParent($data) {
  foreach( $data as $key => $term ) {
    if ($term -> parent === 0) {
      unset($data[$key]);
    }
  }
  return $data;
}
$terms = cleanParent($terms);
$cat_terms = cleanParent($cat_terms);
?>
<div class="banner-s">
  <img src="<?php echo $banner_bg_img['url'] ?>" alt="" class="w-100 h-100 object-cover">
</div>

<div class="container inner-bottom-l inner-sm-bottom-l">
  <?php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs layout-bottom-s layout-sm-bottom-s">','</div>' );
    }
  ?>
  <div class="row">
    <div class="col-lg-7">
      <div class="d-flex column-gap-5 align-items-center mb-5">
        <?php foreach($terms as $term) : ?>
          <h4 class="btn btn-outline-secondary">
            <?php echo $term -> name ?>
          </h4>
        <?php endforeach ?>
        <h4 class="text-gray5"><?php echo get_the_Date() ?></h4>
      </div>
      <h1 class="layout-bottom-s layout-sm-bottom-s"><?php echo get_the_title() ?></h1>
      <div class="row">
        <div class="layout-bottom-s layout-sm-bottom-s p-3 border col-7">
          <h3 class="mb-5">
            本文重點
          </h3>
          <ol class="post-list ps-6">
    
          </ol>
        </div>
      </div>
      <!-- main content -->
      <div class="editor-content editor-content-same-space">
        <?php the_content() ?>
      </div>
      <!-- <?php //foreach($main_content as $key => $content) : ?>
        <?php //$main_content_len = count($main_content) - 1 ?>
        <?php //$final_class = $key === $main_content_len ? '' : 'layout-bottom-s layout-sm-bottom-s'  ?>
        <div class="<?php //echo $final_class ?>">
          <h3 class="mb-5"><?php //echo $content['title'] ?></h3>
          <div class="editor-content">
            <?php //echo $content['content'] ?>
          </div>
        </div>
      <?php //endforeach ?> -->
    </div>
    <div class="col-lg-1">
      <div class="d-flex">
        <div class="w-50"></div>
        <div class="w-50">
          <div class="d-flex justify-content-end">
            <?php echo do_shortcode('[Sassy_Social_Share]') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="offset-lg-1 col-lg-3">
      <h3 class="mb-6">其他分類</h3>
      <ul class="list-unstyled pb-x1 mb-5 border-bottom border-gray3">
        <?php foreach( $cat_terms as $term ) : ?>
          <li class="mb-x1">
            <a href="<?php echo get_term_link($term) ?>" class="tab-link tab-link-single">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none" >
                <path d="M11.383 16.5871L14.9924 12.9777C15.1216 12.8487 15.2241 12.6956 15.2941 12.527C15.364 12.3584 15.4 12.1777 15.4 11.9952C15.4 11.8127 15.364 11.6319 15.2941 11.4634C15.2241 11.2948 15.1216 11.1416 14.9924 11.0127L11.383 7.4033C10.5051 6.53927 9 7.15245 9 8.39275V15.5976C9 16.8518 10.5051 17.465 11.383 16.5871Z" fill="#8A8A8A"/>
              </svg>
              <span class="h4">
                <?php echo $term -> name ?>
              </span>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
      <h3 class="mb-6">文章推薦</h3>
      <?php
        $args = array(
          'post_type' => get_post_type(),
          'posts_per_page' => 3,
          'post_status' => 'publish',
        );
        $query = new WP_Query($args);
        if ( $query -> have_posts() ) {
          while ( $query -> have_posts() ) {
            $query -> the_post();
            get_template_part( 'template-parts/content', 'cardsingle' );
          }
        } else {
          get_template_part( 'template-parts/content', 'none' );
        }
      ?>
    </div>
  </div>
</div>
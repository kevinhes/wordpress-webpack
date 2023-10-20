<?php
  $post_type = get_post_type();
  $taxonomies = get_object_taxonomies($post_type);
  $terms = get_the_terms($post->ID, $taxonomies[0]);
  // $page_info = get_queried_object();
  //$terms = get_the_terms($post->ID, $page_info -> taxonomy);
  foreach ( $terms as $key => $term ) {
    if ($term -> parent === 0) {
      unset($terms[$key]);
    }
  }
?>

<div class="card card-info single bg-light">
  <div class="card-content p-x1">
    <div class="d-flex align-items-center mb-x1">
      <ul class="list-unstyled d-flex">
        <?php foreach( $terms as $term ) : ?>
          <li class="me-2">
            <p class="btn btn-secondary20 text-small">
              <?php echo $term ->name ?>
            </p>
          </li>
        <?php endforeach ?>
      </ul>
      <p class="text-small text-end">
        <?php echo get_the_Date() ?>
      </p>
    </div>
    <h4><?php echo get_the_title() ?></h4>
    <p class="mul-ellipsis text-small">
      <?php 
        echo get_the_excerpt();
      ?>
    </p>
  </div>
  <a href="<?php echo get_permalink() ?>" class="stretched-link"></a>
</div>

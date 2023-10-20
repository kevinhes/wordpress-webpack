<?php
  $page_info = get_queried_object();
  $terms = get_terms(
    array(
      'taxonomy' => $page_info -> taxonomy,
      'hide_empty' => false,
    )
  );
  foreach( $terms as $key => $term ) {
    if ( $term -> parent === 0 ) {
      unset($terms[$key]);
    }
  }
?>

<div class="bg-light cat-tab">
  <div class="container">
    <ul class="cat-tab list-unstyled d-flex justify-content-between">
      <?php foreach( $terms as $term ) : ?>
        <?php $active = $term -> term_id === $page_info -> term_id ? 'active' : '' ?>
        <li class="tab-item tab-item-cat">
          <a href="<?php echo get_term_link($term) ?>" class="tab-link tab-link-cat <?php echo $active ?>">
            <?php echo $term -> name ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>
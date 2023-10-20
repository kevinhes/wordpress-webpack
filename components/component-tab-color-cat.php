<?php
  $page_info = get_queried_object();
  $terms = get_terms(
    array(
      'taxonomy' => $page_info -> taxonomy,
      'hide_empty' => false,
    )
  );
?>

<div class="bg-light mb-6">
  <ul class="cat-tab list-unstyled d-flex" data-currentcat="<?php echo $page_info -> slug ?>">
    <?php foreach( $terms as $key => $term ) : ?>
      <?php $title = $key === 0 ? '全部' : $term -> name ?>
      <?php $active = $term -> term_id === $page_info -> term_id ? 'active' : '' ?>
      <li class="tab-item tab-item-cat-color">
        <a href="#" class="tab-link tab-link-cat-color <?php echo $active ?>" data-cat="<?php echo $term -> slug ?>" >
          <?php echo $title ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</div>
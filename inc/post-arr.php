<?php 
function output_post($post_type, $post_num, $post_order = 'DESC') {
  $args = array(
    'post_type' => $post_type,
    'posts_per_page' => $post_num,
    'post_status' => 'publish',
    'order' => $post_order, // 降序排序
  );
  $post_arr = array();
  $query = new WP_Query($args);

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $title = get_the_title();
      $thumbnail_url = get_the_post_thumbnail_url();
      $link = get_permalink();
      $excerpt = get_the_excerpt();
      $fields = get_fields();

      // Create a new array to store the post data
      $current_post = array(
          'id' => get_the_ID(),
          'date' => get_the_date(),
          'content' => get_the_content(),
          'title' => $title,
          'thumbnail_url' => $thumbnail_url,
          'link' => $link,
          'excerpt' => $excerpt,
      );

        // If there are ACF fields, add them to the current post array
        if ($fields) {
            foreach ($fields as $field_name => $value) {
                $current_post[$field_name] = $value;
            }
        }

        // Add the current post array to the main post array
        $post_arr[] = $current_post;
    }

    // Make sure to reset post data after the while loop
    wp_reset_postdata();
    wp_reset_query();

    return $post_arr;
  }
}
?>

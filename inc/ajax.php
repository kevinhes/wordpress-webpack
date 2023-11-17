<?php
// wordpress api
function my_enqueue() {
	wp_localize_script( 'color-script', 'ajax_link', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
  wp_localize_script( 'case-script', 'ajax_link', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
  wp_localize_script( 'qa-script', 'ajax_link', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );

// ajax
add_action('wp_ajax_get_post_arr','get_post_arr'); 
add_action('wp_ajax_nopriv_get_post_arr','get_post_arr');

function get_post_arr(){

	// 接收前端傳來的資料
	$post_type = $_POST['post_type'];
  $posts_per_page = $_POST['post_num'];
  $order = $_POST['post_order'];
  $taxonomy = isset($_POST['taxonomy']) && !empty($_POST['taxonomy']) ? $_POST['taxonomy'] : 'default_taxonomy_value';
  $cat = isset($_POST['cat']) && !empty($_POST['cat']) ? $_POST['cat'] : 'default_cat_value';
  // $taxonomy = $_POST['taxonomy'];
  // $cat = $_POST['cat'];

  // 組文章陣列
  if (isset($_POST['taxonomy']) && !empty($_POST['taxonomy'])) {
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => $posts_per_page,
      'post_status' => 'publish',
      'order' => $post_order,
      'tax_query' => array(
        array(
          'taxonomy' => $taxonomy,
          'field' => 'slug',
          'terms' => $cat,
        ),
      ),
    );
  } else {
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => $post_num,
      'post_status' => 'publish',
      'order' => $post_order,
    );
  }

  // 資料初始化
  $post_arr = array();

	// 跟後台要資料
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
  }
  wp_reset_postdata();
	
	// 資料送出
	wp_send_json($post_arr);
	wp_die();
};

add_action('wp_ajax_get_post_arr_with_cat_and_page','get_post_arr_with_cat_and_page'); 
add_action('wp_ajax_nopriv_get_post_arr_with_cat_and_page','get_post_arr_with_cat_and_page');

function get_post_arr_with_cat_and_page(){

	// 接收前端傳來的資料
	$post_type = $_POST['post_type'];
  $posts_per_page = $_POST['post_num'];
  $order = $_POST['post_order'];
  $paged = (isset($_POST['paged']) && $_POST['paged']) ? $_POST['paged'] : 1; // default to page 1
  $taxonomy = $_POST['taxonomy'];
  $cat = $_POST['cat'];

  // 組文章陣列
  $args = array(
    'post_type' => $post_type,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => $post_order, // 降序排序
    // 'paged' => $paged,
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'slug',
        'terms' => $cat,
      ),
    ),
  );

  // 資料初始化
  $post_arr = array();
  $post_arr['post_data'] = array();


	// 跟後台要資料
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
        $post_arr['post_data'][] = $current_post;  // 加入到陣列中

            // 分頁資訊
        $pagination = array(
          'total_pages' => $query->max_num_pages,
          'current_page' => $paged,
          'next_page' => ($paged < $query->max_num_pages) ? $paged + 1 : null,
          'prev_page' => ($paged > 1) ? $paged - 1 : null
        );

        // 分類資訊
        // $taxonomy_info = array();
        // if(!empty($taxonomy_term) && !empty($taxonomy_name)){
        //     $term_obj = get_term_by('slug', $taxonomy_term, $taxonomy_name);
        //     $taxonomy_info = array(
        //         'taxonomy_name' => $taxonomy_name,
        //         'term_id' => $term_obj->term_id,
        //         'term_name' => $term_obj->name,
        //         'term_slug' => $term_obj->slug,
        //         'term_description' => $term_obj->description
        //     );
        // }

        // 加入分頁和分類資訊到主要陣列
        $post_arr['pagination'] = $pagination;
        // $post_arr['taxonomy_info'] = $taxonomy_info;
    }
  }
  wp_reset_postdata();
	
	// 資料送出
	wp_send_json($post_arr);
	wp_die();
};

add_action('wp_ajax_get_post_arr_with_id','get_post_arr_with_id'); 
add_action('wp_ajax_nopriv_get_post_arr_with_id','get_post_arr_with_id');

function get_post_arr_with_id(){
  
	// 接收前端傳來的資料
	$posts_id = $_POST['posts_id'];

  // 資料初始化
  $post_arr = array();
  // 資料整理
  foreach( $posts_id as $post_id ) {
    $post_arr[] = array(
      'id' => $post_id,
      'title' => get_the_title($post_id),
      'thumbnail_url' => get_the_post_thumbnail_url($post_id),
    );
  
  }

	// 跟後台要資料
  // $post_arr[] = $posts_id;
  wp_reset_postdata();
	
	// 資料送出
	wp_send_json($post_arr);
	wp_die();
};

function search_color_arr(){

	// 接收前端傳來的資料
  $keyword = isset($_POST['keyword']) && !empty($_POST['keyword']) ? $_POST['keyword'] : 'default_keyword_value';
  // $taxonomy = $_POST['taxonomy'];
  // $cat = $_POST['cat'];

  // 組文章陣列
  $args = array(
    'post_type' => 'type_mineral_color',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'tax_query' => array(
      array(
        'taxonomy' => 'tax_mineral_color',
        'field' => 'slug',
        'terms' => 'mineral-color',
      ),
    ),
  );

  // 資料初始化
  $post_arr = array();

	// 跟後台要資料
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
  }

  $filtered_post_arr = array_filter($post_arr, 
    function($post) use ($keyword) {
      return strpos($post['title'], $keyword) !== false;
    }
  );

  wp_reset_postdata();
	
	// 資料送出
	wp_send_json($filtered_post_arr);
	wp_die();
};

add_action('wp_ajax_search_color_arr','search_color_arr'); 
add_action('wp_ajax_nopriv_search_color_arr','search_color_arr');
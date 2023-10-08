<?php
// wordpress api
function my_enqueue() {
	wp_localize_script( 'monthly-script', 'ajax_link', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );

// ajax
add_action('wp_ajax_get_acf_data','get_acf_data'); 
add_action('wp_ajax_nopriv_get_acf_data','get_acf_data');

function get_acf_data(){

	// 接收前端傳來的資料
	$post_id = $_POST['post_id'];
  $acf_slug = $_POST['slug'];
  $title = $_POST['title'];

	// 跟後台要資料
  $postDatas = [];
  $post_id_num = intval($post_id);
  $acf_data = get_field( $acf_slug, $post_id_num );
	// 資料重組
	$array_result = [
    'acf_data' => $acf_data
  ];
	
	// 資料送出
	wp_send_json($array_result);
	wp_die();
};

// get product data
add_action('wp_ajax_get_product_data','get_product_data'); 
add_action('wp_ajax_nopriv_get_product_data','get_product_data');


<?php

/**
 * Nhúng tập tin /inc/init.php vào để load một số chức năng trong website
 */
require dirname(__FILE__) . '/inc/init.php';


/**
 * Các thiết lập liên quan đến theme
 */
function thachpham_theme_setup()
{
    add_image_size('sanpham_thum', 370, 300, false);
}
add_action('init', 'thachpham_theme_setup', 10);

/**
 * Xóa style.css của child-theme.
 */
function remove_default_styles()
{
    wp_dequeue_style('sparkling-style');
}
add_action('wp_print_styles', 'remove_default_styles', 10);

/**
 * Đăng ký handle cho style.css của theme mẹ
 * Và sử dụng như một thành phần phụ thuộc của style.css theme con
 */
function thachpham_load_theme_style()
{
    wp_enqueue_style('parent-styles', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-styles', get_stylesheet_directory_uri() . '/style.css', array('parent-styles'));
}
add_action('wp_enqueue_scripts', 'thachpham_load_theme_style', 15);

// Register Custom Post Type
// function products_post_type()
// {

//     $labels = array(
//         'name'                  => 'Sản phẩm', 'Post Type General Name',
//         'singular_name'         =>  'Sản phẩm', 'Post Type Singular Name',
//         'all_items'             => 'Tất cả sản phẩm',
//         'add_new_item'          =>  'Thêm sản phẩm mới',
//         'add_new'               => 'Thêm sản phẩm',
//         'edit_item'             => 'Sửa sản phẩm',
//         'update_item'           => 'Cập nhật sản phẩm',
//         'featured_image'        => 'Ảnh đại diện sản phẩm',
//         'filter_item_list'      => 'Lọc danh sách sản phẩm',
//         'item_list'             => 'Danh sách sản phẩm',
//         'set_featured_image'    => 'Hình ảnh sản phẩm',
//     );

//     $args = array(

//         'labels'                => $labels,
//         'title'                 => 'Nhập tên sản phẩm',
//         'public'                => true,
//         'supports'              => array('title', 'editor', 'thumbnail', 'comments', 'custom-fields'),
//         //'taxonomies'            => array('category', 'post_tag'),
//         'rewrite'               => array('slug' => 'sanpham'),
//         'hide_meta_box'         => array('author'),
//         'has_archive'           => true,
//     );
//     register_post_type('sanpham', $args);
// }
// add_action('init', 'products_post_type', 0);


// // Register Custom Taxonomy
// function music_genre_taxonomy() {

// 	$labels = array(
// 		'name'                   => 'Danh mục sản phẩm',
// 		'name_singular'          => 'Danh mục sản phẩm',
// 		'all_items'              => 'Tất cả danh mục sản phẩm',
// 		'edit_item'              => 'Sửa mục sản phẩm',
// 		'view_item'              => 'Xem mục sản phẩm',
// 		'add_new_item'           => 'Thêm mục sản phẩm',

// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
//         'rewrite' => array('slug'=>'sanpham')
// 	);
// 	register_taxonomy( 'sanpham', array( 'sanpham' ), $args );

// }
// add_action( 'init', 'music_genre_taxonomy', 0 );


/**
 * @param $classes
 * @return array
 * Thêm class even vào các sản phẩm số chẵn trong loop
 */
function thachpham_grid_classes($classes) {
    if( is_archive() ) {
        global $wp_query;
        $classes[] = ( $wp_query->current_post%2 === 0 ? 'odd' : 'even' );
    }
    return $classes;
}
add_filter('post_class', 'thachpham_grid_classes');

/**
 * @param $query
 * Thiết lập hiển thị post type `sanpham` ngoài trang chủ.
 */
function thachpham_product_home1($query) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'post_type', 'sanpham');
    }
}
add_filter('pre_get_posts', 'thachpham_product_home1');
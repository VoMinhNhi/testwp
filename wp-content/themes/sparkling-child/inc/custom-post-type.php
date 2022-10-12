<?php
// Register Custom Post Type
function products_post_type()
{

    $labels = array(
        'name'                  => 'Sản phẩm', 'Post Type General Name',
        'singular_name'         =>  'Sản phẩm', 'Post Type Singular Name',
        'all_items'             => 'Tất cả sản phẩm',
        'add_new_item'          =>  'Thêm sản phẩm mới',
        'add_new'               => 'Thêm sản phẩm',
        'edit_item'             => 'Sửa sản phẩm',
        'update_item'           => 'Cập nhật sản phẩm',
        'featured_image'        => 'Ảnh đại diện sản phẩm',
        'filter_item_list'      => 'Lọc danh sách sản phẩm',
        'item_list'             => 'Danh sách sản phẩm',
        'set_featured_image'    => 'Hình ảnh sản phẩm',
    );

    $args = array(

        'labels'                => $labels,
        'title'                 => 'Nhập tên sản phẩm',
        'public'                => true,
        'supports'              => array('title', 'editor', 'thumbnail', 'comments', 'custom-fields'),
        'rewrite'               => array('slug' => 'sanpham'),
        'hide_meta_box'         => array('author'),
        'has_archive'           => true,
    );
    register_post_type('sanpham', $args);
}
add_action('init', 'products_post_type', 0);

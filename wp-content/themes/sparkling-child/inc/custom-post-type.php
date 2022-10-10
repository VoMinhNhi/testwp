<?php
/**
 * Tạo custom post type
 */
function mn_register_post_types ($post_types)
{
    // Tạo post type tên 'sanpham'
    $post_types['sanpham'] = array(
        'labels' => array(
            'name' => 'Sản phẩm',
            'singular_name' => 'Sản phẩm',
            'add_new' => 'Thêm sản phẩm',
            'add_new_item' => 'Thêm sản phẩm mới',
            'all_item' => 'Tất cả sản phẩm',
            'edit_item' => 'Sửa sản phẩm',
            'featured_image' => 'Ảnh sản phẩm',
            'filter_item_list' => 'Lọc danh sách sản phẩm',
            'item_list' => 'Danh sách sản phẩm',
            'set_featured_image' => 'Thiết lập ảnh đại diện'
        ),
        'title' => 'Nhập tên sản phẩm',
        'public' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'comment'),
        'rewrite' => array('slug' => 'sanpham'),
        'hide_meta_box' => array('author'),
        'has_archive' => true
    );

    return $post_types;
}
add_filter('piklist_post_types', 'mn_register_post_types');
?>

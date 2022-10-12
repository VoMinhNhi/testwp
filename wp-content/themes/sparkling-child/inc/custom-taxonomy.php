<?php
/**
 * Tạo custom taxonomy
 */
// Register Custom Taxonomy
function music_genre_taxonomy() {

	$labels = array(
		'name'                   => 'Danh mục sản phẩm',
		'name_singular'          => 'Danh mục sản phẩm',
		'all_items'              => 'Tất cả danh mục sản phẩm',
		'edit_item'              => 'Sửa mục sản phẩm',
		'view_item'              => 'Xem mục sản phẩm',
		'add_new_item'           => 'Thêm mục sản phẩm',

	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
        'rewrite' => array('slug'=>'sanpham_cart')
	);
	register_taxonomy( 'sanpham', array( 'sanpham' ), $args );

}
add_action( 'init', 'music_genre_taxonomy', 0 );
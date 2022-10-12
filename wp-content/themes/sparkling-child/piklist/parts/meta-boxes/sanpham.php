<?php
/*
Title: Thông tin sản phẩm
Post Type: sanpham
*/

/**
 *Khai báo meta box
**/
function thachpham_meta_box()
{
 add_meta_box( 'thong-tin', 'Thông tin ứng dụng', 'thachpham_thongtin_output', 'sanpham' );
}
add_action( 'add_meta_boxes', 'thachpham_meta_box' );


/**
 Khai báo callback
 @param $post là đối tượng WP_Post để nhận thông tin của post
**/
function thachpham_thongtin_output( $post )
{
 $link_download = get_post_meta( $post->ID, '_link_download', true );
 // Tạo trường Link Download
 echo ( '<label for="link_download">Link Download: </label>' );
 echo ('<input type="text" id="link_download" name="link_download" value="'.esc_attr( $link_download ).'" />');
}


/**
 Lưu dữ liệu meta box khi nhập vào
 @param post_id là ID của post hiện tại
**/
function thachpham_thongtin_save( $post_id )
{
 $link_download = sanitize_text_field( $_POST['link_download'] );
 update_post_meta( $post_id, '_link_download', $link_download );
}
add_action( 'save_post', 'thachpham_thongtin_save' );
<?php
/*
Plugin Name: Plugin Meta Box
Author: Minh Nhi 
Description: Hướng dẫn tạo meta box
Author URI: https://thachpham.com
*/

function thachpham_meta_box()
{
    add_meta_box('thong-tin', 'Thông tin ứng dụng', 'thachpham_thongtin_output', 'sanpham');
}
add_action('add_meta_boxes', 'thachpham_meta_box');


/**
 *Khai báo callback
 *@param $post là đối tượng WP_Post để nhận thông tin của post
 **/
function thachpham_thongtin_output($post)
{
    // Tạo trường Link Download
    //echo ('<label for="giasanpham">Nhập giá sản phẩm: </label>');
    //echo ('<input type="text" id="giasanpham" name="giasanpham" value="' . esc_attr($link_download) . '"/>');
    $giasanpham = get_post_meta( $post->ID, '_giasanpham', true );
?>
    <label for="giasanpham">Nhập giá sản phẩm: </label>
    <input type="text" id="giasanpham" name="giasanpham" value="<?php echo $giasanpham ?>">

    <div>
        <label for="phamchat">Phẩm chất tướng: </label>
        <input type="text" id="phamchat" name="phamchat" value="<?php echo get_post_meta( $post->ID, '_phamchat', true ); ?>" placeholder="Đỏ, Xanh, Vàng,...">

        <label for="quocgia">Quốc gia: </label>
        <input type="text" id="quocgia" name="quocgia" value="<?php echo get_post_meta( $post->ID, '_quocgia', true ); ?>" placeholder="Thục, Ngụy, Ngô, Quần">
    </div>
<?php
}


/**
 *Lưu dữ liệu lên database meta box khi nhập vào
 *@param post_id là ID của post hiện tại
 **/
function thachpham_thongtin_save($post_id)
{
    $giasanpham = sanitize_text_field($_POST['giasanpham']);
    update_post_meta($post_id, '_giasanpham', $giasanpham);

    $phamchat = sanitize_text_field($_POST['phamchat']);
    update_post_meta($post_id, '_phamchat', $phamchat);

    $quocgia = sanitize_text_field($_POST['quocgia']);
    update_post_meta($post_id, '_quocgia', $quocgia);
}
add_action('save_post', 'thachpham_thongtin_save');

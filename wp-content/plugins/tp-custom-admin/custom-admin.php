<?php

/**
 * Plugin Name: TP Customize Admin Screen
 * Plugin URI: https://thachpham.com
 * Description: Thay đổi các thành phần của trang login
 * Version: 1.0
 * Author: Thach Pham
 * Author URI: https://thachpham.com
 */
function tp_custom_logo()
{ ?>
    <style type="text/css">
        body {
            background: #34566f !important;
        }

        .login #nav a,
        .login #backtoblog a,
        .login label {
            color: #f3f3f3 !important;
        }

        .wp-core-ui .button-primary {
            background: red !important;
            border: none !important;
            text-shadow: none !important;
            box-shadow: none !important;


        }

        .login form {
            box-shadow: none !important;
            background: transparent !important;
        }

        #login h1 a {
            background-image: url(<?php echo plugins_url('images/logo.png', __FILE__); ?>);
            background-size: 280px 80px;
            width: 280px;
            height: 80px;
        }
    </style>

<?php }
add_action('login_enqueue_scripts', 'tp_custom_logo');

// Thay đổi logo
function mn_admin_logo() {
    echo '<img src="'. plugins_url( 'images/logo.png', __FILE__) . '" />';
}
add_action('admin_notices', 'mn_admin_logo');

// Thay đổi text footer
function mn_admin_footer($text) {
    $text = '<p>Chào mừng bạn đến với website Minh Nhí</p>';
    return $text;
}
add_filter('admin_footer_text', 'mn_admin_footer');

// Xóa widget mặc định trang quản trị
function mn_remve_default_admin_widget() {
    remove_meta_box('dashboard_primary','dashboard','side');
    //remove_meta_box đê xõa widget https://developer.wordpress.org/apis/handbook/dashboard-widgets/ 
}
add_action('wp_dashboard_setup', 'mn_remve_default_admin_widget');

// Tạo một widget trong trang quản trị
function mn_create_admin_widget_notice_callback() {
    echo 'Ngày mai là thứ 3, ngày mốt là thứ 4, Chủ nhuật được nghỉ';
}
function mn_create_admin_widget_notice() {
    // Thực thi các chức năng
    wp_add_dashboard_widget('widget_1','Ghi chú', 'mn_create_admin_widget_notice_callback');
}
add_action('wp_dashboard_setup', 'mn_create_admin_widget_notice');
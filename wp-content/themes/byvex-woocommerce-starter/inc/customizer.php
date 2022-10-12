<?php

if (!defined('ABSPATH')) {
    exit;
}





if (!class_exists('Byvex_Woocommerce_Starter_Customizer')) {
    class Byvex_Woocommerce_Starter_Customizer
    {
        public function __construct()
        {
            add_action('customize_register', array($this, 'customize_register'));
            add_action('wp_head', array($this, 'customize_css'), 100);
        }

        function customize_register($wp_customize)
        {
            $wp_customize->add_panel('byvex_woocommerce_starter_customize_panel', array(
                'title' => __('Theme Settings', 'byvex-woocommerce-starter'),
            ));

            $wp_customize->add_section('byvex_woocommerce_starter_global_colors', array(
                'title' => __('Global Colors', 'byvex-woocommerce-starter'),
                'panel' => 'byvex_woocommerce_starter_customize_panel'
            ));

            /**
             * Primary Color
             */
            $wp_customize->add_setting('bws_primary_color', array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'default' => '#6f42c1',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            ));
            $wp_customize->add_control('bws_primary_color', array(
                'label' => __('Website Primary Color', 'byvex-woocommerce-starter'),
                'type' => 'color',
                'section' => 'byvex_woocommerce_starter_global_colors',
            ));

            /**
             * Primary Button Color
             */
            $wp_customize->add_setting('bws_btn_primary_color', array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'default' => '#6f42c1',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            ));
            $wp_customize->add_control('bws_btn_primary_color', array(
                'label' => __('Primary Button Color', 'byvex-woocommerce-starter'),
                'type' => 'color',
                'section' => 'byvex_woocommerce_starter_global_colors',
            ));

            /**
             * Secondary Button Color
             */
            $wp_customize->add_setting('bws_btn_secondary_color', array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'default' => '#212529',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            ));
            $wp_customize->add_control('bws_btn_secondary_color', array(
                'label' => __('Secondary Button Color', 'byvex-woocommerce-starter'),
                'type' => 'color',
                'section' => 'byvex_woocommerce_starter_global_colors',
            ));
        }

        function customize_css()
        {
            $primary_color = get_theme_mod('bws_primary_color', '#6f42c1');
            $btn_primary_color = get_theme_mod('bws_btn_primary_color', '#6f42c1');
            $btn_secondary_color = get_theme_mod('bws_btn_secondary_color', '#212529'); ?>
            <style>
                .form-control:focus {
                    border-color: <?php echo esc_html(hex2rgb($primary_color, 0.7)); ?>;
                    box-shadow: 0 0 0 0.25rem <?php echo esc_html(hex2rgb($primary_color, 0.25)); ?>;
                }

                .btn-primary {
                    background-color: <?php echo esc_html($btn_primary_color); ?>;
                    border-color: <?php echo esc_html($btn_primary_color); ?>;
                }

                .btn-primary:hover,
                .btn.btn-primary:active {
                    background-color: <?php echo esc_html(hex2rgb($btn_primary_color, 0.9)); ?>;
                    border-color: <?php echo esc_html($btn_primary_color); ?>;
                }

                .btn.btn-primary:active {
                    box-shadow: 0 0 0 0.25rem <?php echo esc_html(hex2rgb($btn_primary_color, 0.5)); ?>;
                }

                .btn.btn-primary:focus-visible {
                    background-color: <?php echo esc_html(hex2rgb($btn_primary_color, 0.9)); ?>;
                    border-color: <?php echo esc_html($btn_primary_color); ?>;
                    box-shadow: 0 0 0 0.25rem <?php echo esc_html(hex2rgb($btn_primary_color, 0.5)); ?>;
                }


                .btn-secondary {
                    background-color: <?php echo esc_html($btn_secondary_color); ?>;
                    border-color: <?php echo esc_html($btn_secondary_color); ?>;
                }

                .btn-secondary:hover,
                .btn.btn-secondary:active {
                    background-color: <?php echo esc_html(hex2rgb($btn_secondary_color, 0.9)); ?>;
                    border-color: <?php echo esc_html($btn_secondary_color); ?>;
                }

                .btn.btn-secondary:active {
                    box-shadow: 0 0 0 0.25rem <?php echo esc_html(hex2rgb($btn_secondary_color, 0.5)); ?>;
                }

                .btn.btn-secondary:focus-visible {
                    background-color: <?php echo esc_html(hex2rgb($btn_secondary_color, 0.9)); ?>;
                    border-color: <?php echo esc_html($btn_secondary_color); ?>;
                    box-shadow: 0 0 0 0.25rem <?php echo esc_html(hex2rgb($btn_secondary_color, 0.5)); ?>;
                }
            </style>
<?php
        }
    }

    new Byvex_Woocommerce_Starter_Customizer();
}

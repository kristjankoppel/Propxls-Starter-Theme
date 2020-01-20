<?php

namespace Propxls\App;

class EnqueueAssets {
    function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'theme_enqueue_assets'] );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_assets'] );
        add_action( 'login_enqueue_scripts', [$this, 'login_enqueue_assets'] );
    }

    /**
     * En-queue required assets
     *
     * @param  string  $filter   The name of the filter to hook into
     * @param  integer $priority The priority to attach the filter with
     */
    public static function theme_enqueue_assets() {

        // Load jQuery from CDN and positon it in footer
        if ( !is_admin() ) {
            wp_deregister_script( 'jquery' );
            wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, NULL, true );
            wp_enqueue_script( 'jquery' );
        }

        // Custom version codes (cache busting)
        $csstime = date( 'ymd-Gis', filemtime( get_template_directory().'/assets/dist/css/pp-app-theme.css') );
        $jstime  = date( 'ymd-Gis', filemtime( get_template_directory().'/assets/dist/js/pp-app.js') );
        
        // Styles
        wp_enqueue_style( 'pp-google-fonts', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=latin-ext', false, $csstime, 'all');
        wp_enqueue_style( 'pp-screen', get_template_directory_uri() . '/assets/dist/css/pp-app-theme.css', false, $csstime, 'all');
            
        // Scripts
        wp_enqueue_script( 'pp-app', get_template_directory_uri() . '/assets/dist/js/pp-app.js', array('jquery'), $jstime);
        wp_localize_script( 'pp-app', 'pp_vars',
            array(
                'ajax_url'   => admin_url('admin-ajax.php'),
                'lang'       => ( defined('ICL_LANGUAGE_CODE') ) ? ICL_LANGUAGE_CODE : get_bloginfo('language'),
                'nonce'      => wp_create_nonce('pp_main_nonce'),
                'theme_uri'  => get_template_directory_uri()
            )
        );

    }

    // Enqueue scripts for all admin pages.
    public static function admin_enqueue_assets() {
        // Register the filter
        wp_enqueue_style( 'pp-admin-style', get_template_directory_uri().'/assets/dist/css/pp-app-admin.min.css' );
    }

    // Enqueue scripts and styles for the login page.
    public static function login_enqueue_assets() {
        wp_enqueue_style( 'pp-login-style', get_template_directory_uri().'/assets/dist/css/pp-app-login.min.css' );
    }

}

<?php 
namespace Propxls\Setup;

class Menus {  
    
    function __construct() {
        if ( function_exists('register_nav_menus') ) {
            register_nav_menus(
                array(
                    'nav-main'   => __('Header navigation', 'propxls'),
                    'nav-footer' => __('Footer navigation', 'propxls'),
                    'nav-social' => __('Social navigation', 'propxls')
                )
            );
        }
    }

}
<?php 
namespace Propxls\Setup;

class Taxonomies {   
    
    function __construct() {
        register_taxonomy( 'employee_department', 'pp_products', array(
            'labels' => array(
                'name' => esc_attr_x( 'Osakonnad', 'employee_department', 'propxls' ),
                'singular_name' => esc_attr_x( 'Osakond', 'employee_department', 'propxls' ),
                'add_new' => esc_attr_x( 'Lisa osakond', 'employee_department', 'propxls' ),
                'edit_item' => esc_attr_x( 'Muuda osakonda', 'employee_department', 'propxls' ),
                'add_new_item' => esc_attr_x( 'Lisa uus osakond', 'employee_department', 'propxls' )
            ),
            'hierarchical' => true,
            'show_in_nav_menus' => false,
            'show_admin_column' => true
        ));
    }

}
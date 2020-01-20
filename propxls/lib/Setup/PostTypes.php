<?php 
namespace Propxls\Setup;

class PostTypes {

    function __construct() {
        register_post_type( 'pp_products', array(
            'labels' => array(
                'name'          => esc_attr_x( 'Tootegrupid', 'pp_products', 'propxls' ),
                'singular_name' => esc_attr_x( 'Tootegrupp', 'pp_products', 'propxls' ),
                'add_new'       => esc_attr_x( 'Lisa uus', 'pp_products', 'propxls' ),
                'edit_item'     => esc_attr_x( 'Muuda', 'pp_products', 'propxls' ),
                'add_new_item'  => esc_attr_x( 'Lisa uus', 'pp_products', 'propxls' ),
                'not_found'     => esc_attr_x( 'Ei leitud midagi', 'pp_products', 'propxls' ),
                'search_items'  => esc_attr_x( 'Otsi', 'pp_products', 'propxls' ),
            ),
            'public' => true, 
            'rewrite' => array(
                'slug'       => esc_attr_x( 'tootegrupp', 'URL slug', 'propxls' ),
                'with_front' => true,
            ),
            'supports'            => array( 'title', 'thumbnail', 'editor' ),
            'menu_icon'           => 'dashicons-admin-post',
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'exclude_from_search' => true,
            'show_in_nav_menus'   => true,
            'has_archive'         => true,
            'hierarchical'        => true,
        ));  
    }

}
<?php 
namespace Propxls\App;

class Acf {  
    
    function __construct() {
        // Set Google Maps API key for ACF 
        add_filter('acf/fields/google_map/api', [$this, 'acfGoogleMapApiKey']);

        // Add theme options page for ACF
        add_action('init',[$this,'acfOptionsPage']);
    }

    public function acfOptionsPage() {
        if( function_exists('acf_add_options_page') ) {
	
            acf_add_options_page(array(
                'page_title' 	=> 'Theme General Settings',
                'menu_title'	=> 'Theme Settings',
                'menu_slug' 	=> 'theme-general-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));
            
            acf_add_options_sub_page(array(
                'page_title' 	=> 'Analytics tracking codes for website',
                'menu_title'	=> 'Tracking Codes',
                'parent_slug'	=> 'theme-general-settings',
            ));
            
        }
    }

    public function acfGoogleMapApiKey( $api ) {
        $api['key'] = 'xxx';
        return $api;
    }

}
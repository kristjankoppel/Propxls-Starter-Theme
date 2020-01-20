<?php 
namespace Propxls\Setup;

use function \Sober\Intervention\intervention;

class CleanUp { 
    
    function __construct() {
        if ( function_exists('\Sober\Intervention\intervention') ) {
            /**
             * Use Intervention to clean up Wordpress admin
             * 
             * @link https://github.com/soberwp/intervention Documentation of Intervention.
             */
            intervention( 'add-svg-support', ['admin', 'editor'] );
            intervention( 'remove-dashboard-items', ['welcome', 'activity', 'recent-comments', 'incoming-links', 'plugins', 'quick-draft', 'drafts', 'news'] );
            intervention( 'remove-help-tabs' );
            intervention( 'remove-howdy' );
            intervention( 'remove-menu-items', ['comments'], 'all' );
            intervention( 'remove-menu-items', ['theme-widgets', 'theme-editor', 'acf'], 'all-not-admin' );
            intervention( 'remove-post-components', 'trackbacks' );
            intervention( 'remove-toolbar-items', ['comments', 'updates', 'customize'] );
            intervention( 'remove-update-notices', 'author', 'contributor', 'subscriber' );
            intervention( 'remove-widgets', 'all' );
            intervention( 'update-label-footer', 'Crafted by ProPXLS' );
            intervention( 'update-pagination', 100 );
        }
    }

}
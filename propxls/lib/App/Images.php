<?php

namespace Propxls\App;

class Images {
    
    public function __construct() {
        $this->registerImageSizes(); 
        $this->imagesDefaultLinkType(); 
        $this->imageQuality(); 
    }

    // Register image sizes
    public function registerImageSizes() {
        add_image_size( 'corp-slider', 200, 300, true );
    }

    // Change Default Image Links
    public function imagesDefaultLinkType() {
        add_action(
            'after_setup_theme',
            function() {
                update_option( 'image_default_link_type', 'file' );
            }
        );
    }

    // Image quality level
    public function imageQuality() {
        add_filter(
            'jpeg_quality', 
            function() {
                return 100;
            }
        );
    }

}

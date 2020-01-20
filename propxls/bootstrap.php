<?php

namespace Propxls;

/**
 * Autoloader
 * 
 * Handled by composer. After adding the autoload field, you have to re-run dump-autoload to re-generate the vendor/autoload.php file.
 */

/**
 * Import classes
 */
use TimberSite;
use TimberHelper;

use Propxls\Setup\CleanUp;
use Propxls\Setup\Menus;
use Propxls\Setup\PostTypes;
use Propxls\Setup\Taxonomies;
use Propxls\Setup\ThemeSupport;
use Propxls\App\EnqueueAssets;

use Propxls\App\Ajax;
use Propxls\App\Acf;
use Propxls\App\Images;

/**
 * Main Application class
 * 
 * Bootstrap application library. Set up the default Timber context & extend Twig for the site.
 * 
 * @link https://timber.github.io/docs/ Documentation of Timber.
 */
class Theme extends TimberSite {
    public function __construct() {
        // Timber
        add_filter( 'get_twig', [$this, 'addToTwig'] );
        add_filter( 'timber_context', [$this, 'addToContext'] );
        
        // Theme
        $this->appCleanUp(); 
        add_action( 'after_setup_theme', [$this, 'appRegisterMenus'] );
        $this->appImages();
        add_action( 'after_setup_theme', [$this, 'appLoadThemeTextdomain'], 100 );

        add_action( 'init', [$this, 'appRegisterCustomPostTypes'] ); 
        add_action( 'init', [$this, 'appRegisterCustomTaxonomies'] );
        $this->appThemeSupport();
        $this->appEnqueueScriptsStyles();
        $this->appAjax();
        $this->appAcf();

        parent::__construct();
    }

    public function appCleanUp() {
        new CleanUp; 
    }

    public function appRegisterMenus() {
        new Menus;
    }

    public function appRegisterCustomPostTypes() {
        new PostTypes; 
    }

    public function appRegisterCustomTaxonomies() {
        new Taxonomies; 
    }

    public function appThemeSupport() {
        new ThemeSupport;
    }

    public function appEnqueueScriptsStyles() {
        new EnqueueAssets; 
    }

    public function appAjax() {
        new Ajax; 
    }

    public function appAcf() {
        new Acf; 
    }

    public function appLoadThemeTextdomain() {
        load_theme_textdomain( '<%site-textdomain%>', get_template_directory() . '/languages' );
    }

    public function appImages() {
        new Images; 
    }

    // Add data to context and make it globally available for Timber
    public function addToContext($data) {
        $data['is_home']       = is_home();
        $data['is_front_page'] = is_front_page();
        $data['is_logged_in']  = is_user_logged_in();
        
        // Add menu to context
        $data['menu'] = new \Timber\Menu('nav-main');

        return $data;
    }

    // Custom functions for Twig
    public function addToTwig($twig) {
        // this is where you can add your own functions to twig
        // $twig->addExtension(new Twig_Extension_StringLoader());
        // $twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));

        return $twig;
    }
}

new Theme;
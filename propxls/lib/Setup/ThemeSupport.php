<?php

namespace Propxls\Setup;

class ThemeSupport {
    function __construct() {

        // Enabling Support for Post Thumbnails
        add_theme_support('post-thumbnails');
        
        // Theme supports custom menus
        add_theme_support('menus');

        // Theme let's WordPress manage the document title.
        add_theme_support('title-tag');

        // Support HTML5 syntax
        add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

        // Support Gutenberg block styles
        add_theme_support( 'wp-block-styles' );

        // Support wide alignment for editor blocks.
        add_theme_support( 'align-wide' );

        // Support custom editor block color palette.
        add_theme_support(
            'editor-color-palette',
            [
                [
                    'name'  => __( 'Primary', 'propxls' ),
                    'slug'  => 'material-red',
                    'color' => '#000000',
                    //'color' => Theme\Config::get( 'variables.color.material-red', '#000000' ),
                ],
                [
                    'name'  => __( 'Secondary', 'propxls' ),
                    'slug'  => 'material-pink',
                    'color' => '#000000',
                    //'color' => Theme\Config::get( 'variables.color.material-pink', '#000000' ),
                ]
            ]
        );

        // Support custom editor block font sizes.
        add_theme_support(
            'editor-font-sizes',
            [
                [
                    'name'      => __( 'small', 'propxls' ),
                    'shortName' => __( 'S', 'propxls' ),
                    'size'      => 16,
                    //'size'      => (int) Theme\Config::get( 'variables.font-size.s', 16 ),
                    'slug'      => 'small',
                ],
                [
                    'name'      => __( 'regular', 'propxls' ),
                    'shortName' => __( 'M', 'propxls' ),
                    'size'      => 20,
                    //'size'      => (int) Theme\Config::get( 'variables.font-size.m', 20 ),
                    'slug'      => 'regular',
                ],
                [
                    'name'      => __( 'large', 'propxls' ),
                    'shortName' => __( 'L', 'propxls' ),
                    'size'      => 28,
                    //'size'      => (int) Theme\Config::get( 'variables.font-size.l', 28 ),
                    'slug'      => 'large',
                ]
            ]
        );

    }
}
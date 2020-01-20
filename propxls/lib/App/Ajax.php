<?php

namespace Propxls\App;

class Ajax {

    private $ajaxEvents = array(
        'filter-products' => array( 'callback' => 'filterProducts')
    );

    public function __construct() {
        foreach ( $this->ajaxEvents as $key => $vars ) {
            add_action( 'wp_ajax_' . $key, [ $this, $vars['callback'] ] );
            add_action( 'wp_ajax_nopriv_' . $key, [ $this, $vars['callback'] ] );
        }
    }

    public function filterProducts() {
        $result = [
            'success'   => 1,
            'something'  => 'somevalue',
            'something_else' => 'another value'
        ];
        wp_send_json( $result );
    }
}
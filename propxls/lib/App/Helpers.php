<?php

namespace Propxls\App;

class Helpers {
    
    // Disable search
    function fb_filter_query( $query, $error = true ) {
 
        if ( is_search() ) {
            $query->is_search = false;
            $query->query_vars[s] = false;
            $query->query[s] = false;
        }
         
        // to error
        if ( $error == true )
            $query->is_404 = true;
        }
    }
         
    add_action( 'parse_query', 'fb_filter_query' );
    add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

    //Change Excerpt Length
    function new_excerpt_length($length) {
        return 100;
    }
    add_filter('excerpt_length', 'new_excerpt_length');
}

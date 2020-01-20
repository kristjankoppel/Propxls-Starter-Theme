/**
 * jQuery
 */
/*
import $ from 'jquery';
window.$ = $;
window.jQuery = $;*/

/**
 * Bootstrap Javascript
 * 
 * You can import all of Bootstrap js here or select only needed parts to get even smaller bundle size
 */
//import 'bootstrap'; // All bootstrap javascript in one bundle

//import 'bootstrap/js/src/alert';
//import 'bootstrap/js/src/button';
//import 'bootstrap/js/src/carousel';
//import 'bootstrap/js/src/collapse';
//import 'bootstrap/js/src/dropdown';
import 'bootstrap/js/src/modal';
//import 'bootstrap/js/src/popover';
//import 'bootstrap/js/src/scrollspy';
//import 'bootstrap/js/src/tab';
//import 'bootstrap/js/src/toast';
//import 'bootstrap/js/src/tooltip';
import 'bootstrap/js/src/util';

/**
 * App code
 */
$(document).ready(() => {

    console.log('Look ma, no ef CDNs!'); 
    console.log('test 35'); 
    
    $( document ).on( "click", ".js-ajax", function(e) {
        console.log( $( this ).text() );

        $.ajax({
            url     : pp_vars.ajax_url,
            dataType: 'json',
            data    : {
                nonce   : pp_vars.nonce,
                action  : 'filter-products'
            },
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
    
});
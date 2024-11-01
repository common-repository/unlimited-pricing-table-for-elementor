<?php 

namespace UPTE_Table;

if( !defined( 'ABSPATH' ) )  exit; // Exit if accessed directly.

class Assets_loader{
     /**
    *
    * Load css/js for public users
    *
    * @since  1.0.0
    */
    public static function load_public_scripts() {
        wp_enqueue_style( UPTE_init()::PREFIX . 'base', UPTE_ASSETS . 'css/upte-base.css', [] , time() );
        wp_enqueue_style( UPTE_init()::PREFIX . 'public', UPTE_ASSETS . 'css/upte-public.css', [] , time() );
        wp_enqueue_script( UPTE_init()::PREFIX . 'elementor', UPTE_ASSETS . 'js/upte-elementor.js', ['jquery'], time(), true );
    }
}
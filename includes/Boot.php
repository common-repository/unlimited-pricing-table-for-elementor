<?php 

namespace UPTE_Table;

if( !defined( 'ABSPATH' ) )  exit; // Exit if accessed directly.

class Boot{

    /**
    *
    * $instance property for instance
    */
    private static $instance = null;

    /**
    *
    * Registerd widgets in cofig
    */
    protected $registered_widgets;

    /**
    *
    * @return \Instance
    * @since  1.0.0
    */
    public static function getInstance(){
        if( !isset( self::$instance )){
           self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * Constructor of plugin class
     *
     * @since 3.0.0
     */
    private function __construct(){
        $this->registered_widgets = $GLOBALS['upte_config']['widgets'];
        $this->register_hooks();
    }

    /**
    *
    * Registering Hooks for UPTE
    *
    * @since  1.0.0
    */
    public function register_hooks(){
        if ( defined( 'ELEMENTOR_VERSION' ) ) {
		    if ( version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
			    add_action('elementor/widgets/register', array($this, 'register_widgets'));
		    } else {
			    add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));
		    }
	    }

        add_action( 'wp_enqueue_scripts', ['\UPTE_Table\Assets_loader', 'load_public_scripts'] );
    }

    /**
    *
    * Registering cusotm a widget
    *
    * @since  1.0.0
    */
    public function register_widgets( $widgets_manager ){
        foreach( $this->registered_widgets as $key => $widget ){
            $widgets_manager->register( new $widget['class'] );
        }
    }

}
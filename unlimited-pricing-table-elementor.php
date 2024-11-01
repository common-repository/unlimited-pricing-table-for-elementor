<?php
/**
 * Plugin Name: Unlimited pricing table
 * Description: Unlimited pricing table is a Elementor Addons Plugin. That offer three advanced pricing table demo for now. More Demo is on the way.
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: WPRealizer
 * Author URI: https://wprealizer.com
 * Plugin URI: https://wprealizer.com/plugin/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: unlimited-pricing-table-for-elementor
 *
 * Elementor tested up to: 3.21.1
 * Elementor Pro tested up to: 3.21.0
 *
 *
 * Unlimited Pricing table Addons is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Unlimited Pricing table Addons is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Quantum Addons. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Define
*/
define('UPTE_ADDONS_URL', plugins_url('/', __FILE__));
define('UPTE_ADDONS_DIR', dirname(__FILE__));
define('UPTE_ADDONS_PATH', plugin_dir_path(__FILE__));
define('UPTE_ASSETS', UPTE_ADDONS_URL . 'assets/');
define('UPTE_INCLUDE_PATH', UPTE_ADDONS_DIR . '/includes/');

/**
 * Load Requried fiels
*/
require UPTE_ADDONS_PATH . '/autoload.php';
$GLOBALS['upte_config'] = require_once UPTE_ADDONS_PATH . '/config.php';


/**
 * Add custom widget categories
 */
function add_custom_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'unlimited-pricing-tables',
        [
            'title' => __( 'Unlimited Pricing Tables', 'unlimited-pricing-table-for-elementor' ),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'add_custom_widget_categories' );

/**
 * Reorder widget categories to ensure custom category is on top
 */
function reorder_elementor_widget_categories( $elements_manager ) {
    // Ensure categories are properly loaded
    $categories = $elements_manager->get_categories();
    
    // Check if the custom category exists
    if (isset($categories['unlimited-pricing-tables'])) {
        $custom_category = $categories['unlimited-pricing-tables'];
        unset($categories['unlimited-pricing-tables']);
        
        // Merge custom category to the beginning of the array
        $ordered_categories = array_merge(['unlimited-pricing-tables' => $custom_category], $categories);
        
        // Reassign the reordered categories to the elements manager
        $reflection = new ReflectionClass($elements_manager);
        $property = $reflection->getProperty('categories');
        $property->setAccessible(true);
        $property->setValue($elements_manager, $ordered_categories);
    }
}
add_action( 'elementor/elements/categories_registered', 'reorder_elementor_widget_categories', 999 );



/**
 * Main UPTE Class
 *
 * The init class that runs the Hello World plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 * @since 1.0.0
 */

final class UPTE_Final {
    
    /**
    *
    * $instance property for instance
    */
    private static $instance = null;

    /**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

    /**
	 * Plugin prefix
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const PREFIX = 'upte_';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.5.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}

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

    public function plugins_loaded(){
        // load_plugin_textdomain( 'tpebl', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [$this, 'upte_elementor_load_notice'] );
            return;
        }
        \UPTE_Table\Boot::getInstance();
    }

    public function  upte_elementor_load_notice() {
        $plugin = 'elementor/elementor.php';	
        if ( $this->is_elementor_activated() ) {
            if ( ! current_user_can( 'activate_plugins' ) ) { return; }
            $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
            $admin_notice = '<p>' . esc_html__( 'Elementor is missing. You need to activate your installed Elementor to use Unlimited pricing table.', 'tpebl' ) . '</p>';
            $admin_notice .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__( 'Activate Elementor Now', 'tpebl' ) ) . '</p>';
        } else {
            if ( ! current_user_can( 'install_plugins' ) ) { return; }
            $install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
            $admin_notice = '<p>' . esc_html__( 'Elementor Required. You need to install & activate Elementor to use Unlimited pricing table.', 'tpebl' ) . '</p>';
            $admin_notice .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__( 'Install Elementor Now', 'tpebl' ) ) . '</p>';
        }
        echo '<div class="notice notice-error is-dismissible">'.wp_kses($admin_notice, true).'</div>';
    }
    /**
    * Elementor activated or not
    */
	public function is_elementor_activated() {
		$file_path = 'elementor/elementor.php';
		$installed_plugins = get_plugins();
		
		return isset( $installed_plugins[ $file_path ] );
	}

    /**
     * 
     *  Return Allowd HTML function.
     */
    static function UPTE_allowed_tags (){

        $allowed_tags = array(
            'a'                         => array(
                'class'   => array(),
                'href'    => array(),
                'rel'  => array(),
                'title'   => array(),
                'target' => array(),
            ),
            'abbr'                      => array(
                'title' => array(),
            ),
            'b'                         => array(),
            'blockquote'                => array(
                'cite' => array(),
            ),
            'cite'                      => array(
                'title' => array(),
            ),
            'code'                      => array(),
            'del'                    => array(
                'datetime'   => array(),
                'title'      => array(),
            ),
            'dd'                     => array(),
            'div'                    => array(
                'class'   => array(),
                'title'   => array(),
                'style'   => array(),
            ),
            'dl'                     => array(),
            'dt'                     => array(),
            'em'                     => array(),
            'h1'                     => array(),
            'h2'                     => array(),
            'h3'                     => array(),
            'h4'                     => array(),
            'h5'                     => array(),
            'h6'                     => array(),
            'sub'                     => array(),
            'i'                         => array(
                'class' => array(),
            ),
            'img'                    => array(
                'alt'  => array(),
                'class'   => array(),
                'height' => array(),
                'src'  => array(),
                'width'   => array(),
            ),
            'li'                     => array(
                'class' => array(),
            ),
            'ol'                     => array(
                'class' => array(),
            ),
            'p'                         => array(
                'class' => array(),
            ),
            'q'                         => array(
                'cite'    => array(),
                'title'   => array(),
            ),
            'span'                      => array(
                'class'   => array(),
                'title'   => array(),
                'style'   => array(),
            ),
            'iframe'                 => array(
                'width'         => array(),
                'height'     => array(),
                'scrolling'     => array(),
                'frameborder'   => array(),
                'allow'         => array(),
                'src'        => array(),
            ),
            'strike'                 => array(),
            'br'                     => array(),
            'strong'                 => array(),
            'data-wow-duration'            => array(),
            'data-wow-delay'            => array(),
            'data-wallpaper-options'       => array(),
            'data-stellar-background-ratio'   => array(),
            'ul'                     => array(
                'class' => array(),
                ),
        );

    
        return $allowed_tags;
    }
}

if( ! function_exists('UPTE_Init') ){
    function UPTE_init(){
        return UPTE_Final::getInstance();
    } UPTE_Init();
}
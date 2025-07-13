<?php
/**
 * Plugin Name: Site Creator with Demo Selector
 * Description: Tworzy nową podstronę multisite z demo i kontem administratora.
 * Version: 1.1
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'MSC_SC_DIR', plugin_dir_path( __FILE__ ) );
define( 'MSC_SC_URL', plugin_dir_url( __FILE__ ) );

require_once MSC_SC_DIR . 'inc/helper-functions.php';
require_once MSC_SC_DIR . 'inc/form-handler.php';
require_once MSC_SC_DIR . 'inc/site-creator.php';

add_shortcode( 'msc_site_creator', 'msc_render_form_shortcode' );

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'msc-style', MSC_SC_URL . 'assets/style.css' );
});
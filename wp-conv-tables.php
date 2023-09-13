<?php
// /wp-content/plugins/wp-conv-tables/wp-conv-tables.php
/**
 * Plugin Name:       Conv tables manager
 * Description:       Create custom wp-admin forms
 * Version:           1.0.0
 * Text Domain:       ct-admin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
define( 'CONV-TABLES_VERSION', '1.0.0' );
define( 'CONV_TABLES_DIR', 'wp-conv-tables' );
/**
 * Helpers
 */
require plugin_dir_path( __FILE__ ) . 'includes/helpers.php';
/**
 * The core plugin class
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-conv-tables.php';
function run_conv_tables() {
    $plugin = new Conv_Tables();
    $plugin->init();
}
run_conv_tables();
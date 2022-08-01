<?php
/**
 * Plugin Name:       ACF Demo
 * Plugin URI:        https://example.com/plugins/
 * Description:       This is practise plugin.
 * Version:           1.0
 * Author:            Sohan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       acf-demo
 * Domain Path:       /languages
 */
require_once ( plugin_dir_path( __FILE__ )."/libs/class-tgm-plugin-activation.php" );
function acfd_boostrap(){
    load_plugin_textdomain( 'acf-demo', false, dirname(__FILE__) . "/languages" );
}
add_action( 'plugins_loaded', 'acfc_bootstrap' );
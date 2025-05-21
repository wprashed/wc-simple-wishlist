<?php
/**
 * Plugin Name:       WC Simple Wishlist
 * Description:       A lightweight WooCommerce wishlist plugin with a shareable wishlist page.
 * Version:           1.0.0
 * Author:            Rashed Hossain
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wc-simple-wishlist
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;

// Constants
define('WCSW_VERSION', '1.0.0');
define('WCSW_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WCSW_PLUGIN_URL', plugin_dir_url(__FILE__));

// Load text domain
add_action('plugins_loaded', function () {
    load_plugin_textdomain('wc-simple-wishlist', false, dirname(plugin_basename(__FILE__)) . '/languages');
});

// Includes
require_once WCSW_PLUGIN_DIR . 'includes/class-wc-simple-wishlist.php';

// Init
add_action('plugins_loaded', ['WC_Simple_Wishlist', 'init']);
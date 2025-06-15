<?php
/**
 * Plugin Name:       Wisharo Wishlist
 * Description:       A lightweight WooCommerce wishlist plugin with a shareable wishlist page.
 * Version:           1.0.0
 * Author:            Rashed Hossain
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wisharo-wishlist
 */

defined('ABSPATH') || exit;

define('WISHARO_VERSION', '1.0.0');
define('WISHARO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WISHARO_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once WISHARO_PLUGIN_DIR . 'includes/class-wisharo-wishlist.php';

add_action('plugins_loaded', ['Wisharo_Wishlist', 'init']);
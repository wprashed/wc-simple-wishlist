<?php
defined('ABSPATH') || exit;

class Wisharo_Wishlist {
    public static function init() {
        add_action('init', [__CLASS__, 'add_endpoint']);
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_scripts']);
        add_action('template_redirect', [__CLASS__, 'wishlist_page']);
        add_action('wp_ajax_wisharo_toggle_wishlist', [__CLASS__, 'ajax_toggle']);
        add_action('woocommerce_after_shop_loop_item', [__CLASS__, 'wishlist_button']);
        add_action('woocommerce_single_product_summary', [__CLASS__, 'wishlist_button'], 35);
    }

    public static function add_endpoint() {
        add_rewrite_endpoint('wishlist', EP_ROOT | EP_PAGES);
    }

    public static function enqueue_scripts() {
        if (is_user_logged_in()) {
            wp_enqueue_script('wisharo-script', WISHARO_PLUGIN_URL . 'assets/js/wishlist.js', ['jquery'], WISHARO_VERSION, true);
            wp_localize_script('wisharo-script', 'wisharo_ajax', [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('wisharo_nonce'),
            ]);
        }
    }

    public static function wishlist_button() {
        if (!is_user_logged_in()) return;
        global $product;
        $product_id = $product->get_id();
        $user_id = get_current_user_id();
        $wishlist = get_user_meta($user_id, '_wisharo_wishlist', true);
        $in_wishlist = is_array($wishlist) && in_array($product_id, $wishlist);

        $btn_text = $in_wishlist ? __('Remove from Wishlist', 'wisharo-wishlist') : __('Add to Wishlist', 'wisharo-wishlist');
        printf(
            '<button class="wisharo-toggle-button" data-product-id="%d">%s</button>',
            esc_attr($product_id),
            esc_html($btn_text)
        );
    }

    public static function ajax_toggle() {
        check_ajax_referer('wisharo_nonce', 'nonce');

        $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
        $user_id = get_current_user_id();
        if (!$user_id || !$product_id) wp_send_json_error(__('Invalid request', 'wisharo-wishlist'));

        $wishlist = get_user_meta($user_id, '_wisharo_wishlist', true);
        if (!is_array($wishlist)) $wishlist = [];

        if (in_array($product_id, $wishlist)) {
            $wishlist = array_diff($wishlist, [$product_id]);
            $action = 'removed';
        } else {
            $wishlist[] = $product_id;
            $action = 'added';
        }

        update_user_meta($user_id, '_wisharo_wishlist', $wishlist);
        wp_send_json_success(['action' => $action]);
    }

    public static function wishlist_page() {
        global $wp_query;
        if (!isset($wp_query->query_vars['wishlist'])) return;

        $user_id = isset($_GET['user_id']) ? absint($_GET['user_id']) : get_current_user_id();
        if (!$user_id) {
            wp_die(__('You must be logged in to view your wishlist.', 'wisharo-wishlist'));
        }

        include WISHARO_PLUGIN_DIR . 'includes/wishlist-template.php';
        exit;
    }

    public static function get_share_url($user_id) {
        return add_query_arg('user_id', $user_id, home_url('/wishlist/'));
    }
}
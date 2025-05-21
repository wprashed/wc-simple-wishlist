<?php
defined('ABSPATH') || exit;

get_header();

$wishlist = get_user_meta($user_id, '_wcsw_wishlist', true);
$wishlist = is_array($wishlist) ? $wishlist : [];

echo '<div class="wcsw-wishlist"><h2>' . esc_html__('Wishlist', 'wc-simple-wishlist') . '</h2>';

if (empty($wishlist)) {
    echo '<p>' . esc_html__('Your wishlist is empty.', 'wc-simple-wishlist') . '</p>';
} else {
    echo '<ul>';
    foreach ($wishlist as $product_id) {
        $product = wc_get_product($product_id);
        if ($product) {
            echo '<li><a href="' . esc_url(get_permalink($product_id)) . '">' . esc_html($product->get_name()) . '</a></li>';
        }
    }
    echo '</ul>';
}

if ($user_id === get_current_user_id()) {
    echo '<p>' . esc_html__('Share this link:', 'wc-simple-wishlist') . '</p>';
    echo '<input type="text" readonly value="' . esc_url(WC_Simple_Wishlist::get_share_url($user_id)) . '" style="width:100%;" />';
}

echo '</div>';

get_footer();
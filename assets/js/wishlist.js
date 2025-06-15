jQuery(function ($) {
    $('.wisharo-toggle-button').on('click', function () {
        let $btn = $(this);
        let product_id = $btn.data('product-id');

        $.post(wisharo_ajax.ajax_url, {
            action: 'wisharo_toggle_wishlist',
            nonce: wisharo_ajax.nonce,
            product_id: product_id
        }, function (response) {
            if (response.success) {
                if (response.data.action === 'added') {
                    $btn.text('Remove from Wishlist');
                } else {
                    $btn.text('Add to Wishlist');
                }
            }
        });
    });
});
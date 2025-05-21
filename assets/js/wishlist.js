jQuery(function ($) {
    $('.wcsw-toggle-button').on('click', function () {
        let $btn = $(this);
        let product_id = $btn.data('product-id');

        $.post(wcsw_ajax.ajax_url, {
            action: 'wcsw_toggle_wishlist',
            nonce: wcsw_ajax.nonce,
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
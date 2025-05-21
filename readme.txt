=== WC Simple Wishlist ===
Contributors: wprashed  
Donate link: https://example.com/donate  
Tags: wishlist, woocommerce, ecommerce, share wishlist, wishlist page  
Requires at least: 5.4  
Tested up to: 6.5  
Requires PHP: 7.2  
Stable tag: 1.0.0  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

A simple WooCommerce wishlist plugin that lets users create, manage, and share their favorite products.

== Description ==

**WC Simple Wishlist** is a lightweight WooCommerce plugin that allows your customers to add products to their wishlist and share it with others using a unique public link.

Key features:
* Wishlist button on product and shop pages
* Logged-in users can add/remove items from their wishlist
* Dedicated wishlist page (`/wishlist/`)
* Share wishlist with others via URL
* Clean, minimal code — no bloat

This plugin is perfect for eCommerce stores that want to improve user experience and increase conversions with product wishlists.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wc-simple-wishlist` directory, or install the plugin via the WordPress plugins screen directly.
2. Activate the plugin through the ‘Plugins’ screen in WordPress.
3. Go to **Settings → Permalinks** and click **Save Changes** to register the new `wishlist` endpoint.
4. You're ready! Logged-in users can start adding products to their wishlist.

== Frequently Asked Questions ==

= Can users see their wishlist without logging in? =  
No. Users must be logged in to create and manage their wishlist. However, wishlists can be shared publicly via a special link.

= How can I display the wishlist page? =  
The wishlist page is available at `/wishlist/` for each user. When a user shares their wishlist, others can view it using a link like:  
`https://yoursite.com/wishlist/?user_id=123`

= Can guest users use the wishlist? =  
Not yet. Currently, only logged-in users can use this feature. Guest wishlist functionality will be considered in future updates.

= Does it work with any WooCommerce theme? =  
Yes, the plugin is designed to work with all WooCommerce-compatible themes.

== Screenshots ==

1. Wishlist button on the product page.
2. Wishlist button on the shop loop.
3. Shared wishlist page preview.
4. Wishlist with copy/share URL input field.

== Changelog ==

= 1.0.0 =  
* Initial release of the plugin.  
* Wishlist functionality for logged-in users.  
* Wishlist sharing via URL.  
* Basic styling and JavaScript toggle support.

== Roadmap ==

* Guest wishlist support  
* Wishlist management from My Account page  
* Ajax-based loading  
* Multiple wishlists per user  
* Email sharing option

== License ==

This plugin is licensed under the GPLv2 or later. See [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html) for more information.
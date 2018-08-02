<?php

WC_Order::get_checkout_payment_url( $on_checkout )


# order associated with customer
$customer_orders = get_posts( array(
    'numberposts' => -1,
    'meta_key'    => '_customer_user',
    'meta_value'  => get_current_user_id(),
    'post_type'   => wc_get_order_types(),
    'post_status' => array_keys( wc_get_order_statuses() ),
) )

# Status 
Array
(
    [wc-pending] => Pending payment
    [wc-processing] => Processing
    [wc-on-hold] => On hold
    [wc-completed] => Completed
    [wc-cancelled] => Cancelled
    [wc-refunded] => Refunded
    [wc-failed] => Failed
)

# update wc status 
$order = wc_get_order( $order_details->ID );
$result = $order->set_status("pending", "cancelled");
$order->save();


/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {
 //remove generator meta tag
 remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

 //first check that woo exists to prevent fatal errors
 if ( function_exists( 'is_woocommerce' ) ) {
 //dequeue scripts and styles
 if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
 wp_dequeue_style( 'woocommerce_frontend_styles' );
 wp_dequeue_style( 'woocommerce_fancybox_styles' );
 wp_dequeue_style( 'woocommerce_chosen_styles' );
 wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
 wp_dequeue_script( 'wc_price_slider' );
 wp_dequeue_script( 'wc-single-product' );
 wp_dequeue_script( 'wc-add-to-cart' );
 wp_dequeue_script( 'wc-cart-fragments' );
 wp_dequeue_script( 'wc-checkout' );
 wp_dequeue_script( 'wc-add-to-cart-variation' );
 wp_dequeue_script( 'wc-single-product' );
 wp_dequeue_script( 'wc-cart' );
 wp_dequeue_script( 'wc-chosen' );
 wp_dequeue_script( 'woocommerce' );
 wp_dequeue_script( 'prettyPhoto' );
 wp_dequeue_script( 'prettyPhoto-init' );
 wp_dequeue_script( 'jquery-blockui' );
 wp_dequeue_script( 'jquery-placeholder' );
 wp_dequeue_script( 'fancybox' );
 wp_dequeue_script( 'jqueryui' );
 }
 }

}

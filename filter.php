<?php 
function replace_customer_area_title( $wp_admin_bar ) {
    //$subdomain = explode('.', $_SERVER['HTTP_HOST'])[0];
   $wp_admin_bar->add_node( array( 'id' => 'site-name', 'title' => __('test', 'domain) ) );
}
add_filter( 'admin_bar_menu', 'replace_customer_area_title' , 33 );

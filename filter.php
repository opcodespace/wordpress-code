<?php 
function replace_customer_area_title( $wp_admin_bar ) {
    //$subdomain = explode('.', $_SERVER['HTTP_HOST'])[0];
   $wp_admin_bar->add_node( array( 'id' => 'site-name', 'title' => __('test', 'domain) ) );
}
add_filter( 'admin_bar_menu', 'replace_customer_area_title' , 33 );


/**
 * Meta title changing on landing page
 * @param type $title 
 * @return type
 */
function custom_wp_title($title) {

    global $post; 
    global $wp_query;
    # If url having homeloans
    if(trim($post->post_title) == 'homeloans'){
    	$lender = ucwords(str_replace("-", " ", $wp_query->query['lender']));
    	return $lender;
    }
    return $title;
}
add_filter( 'wp_title', 'custom_wp_title', 99 );
